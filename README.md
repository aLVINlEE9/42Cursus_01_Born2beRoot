Born2beRoot
===========

## <목표>

>VirtualBox을 이용해 나만의 규칙을 적용한 operating system 을 만드는것

<br> <br> <br> <br>

## <개념 정리>

### Virtual Machine
* Virtual Machine 이란?
> 컴퓨터 안에 또 다른 컴퓨터를 동작 시키는 것이다.

> 하드웨어를 소프트웨어적으로 구현해서 그 위에서 운영체제가 작동하도록하는 기술

* Virtual Machine 이 작동하는 원리
> VM(Virtual Machine)은 물리적 하드웨어 시스템에 구축되어 자체 CPU, 메모리, 네트워크 인터페이스 및 스토리지를 갖추고 가상 컴퓨터 시스템으로 작동하는 가상 환경입니다.

> 여기서 하이퍼바이저라 불리는 소프트웨어는 하드웨어에서 가상 머신의 리소스를 분리하고 적절하게 프로비저닝하여 VM에서 사용할 수 있도록 합니다.

<br>

### Debian 이란?
> 무료 오픈소스로 구성된 리눅스 배포판이며, 커뮤니티에 의해 관리됩니다. Debian은 리눅스 커널을 기반으로 한 가장 오래된 os중 하나 입니다. <br>데비안(Debian)은 데비안 프로젝트에서 만들어 배포하는 공개 운영체제이다. <br>데비안의 특징은 패키지 설치 및 업그레이드의 단순함에 있다. <br>일단 인스톨을 한 후 패키지 매니저인 apt 등을 이용하면 소프트웨어의 설치나 업데이트에서 다른 패키지와의 의존성 확인, 보안관련 업데이트 등을 자동으로 해준다. <br>데비안은 네트워크 결합 스토리지 부터 전화기, 노트북, 데스크탑 및 서버까지 다양한 하드웨어에서 사용할 수 있다. <br>데비안은 안정성과 보안에 중점을 두며 다른 많은 리눅스 배포판의 기반으로 쓰이고 있다.

<br>

### CentOs 와 Debian 차이점
<img width="575" alt="스크린샷 2021-06-22 오후 3 05 27" src="https://user-images.githubusercontent.com/74805318/128816116-47ffee76-5302-4d52-befe-7418c4a6a700.png">

<br>

### virtual machine의 목적
> 다른 운영체제를 사용해야 하는 경우(맥OS에서 윈도우, 윈도우에서 리눅스)

> 독립된 작업공간이 필요한 경우 (바이러스 회피, 백업)

> 하나의 머신에서 여러명에게 운영체제 환경을 제공

<br>

### aptitude와 apt의 차이는?
<img width="493" alt="스크린샷 2021-06-22 오후 3 16 52" src="https://user-images.githubusercontent.com/74805318/128816413-a6dc4bc6-be40-42b9-acdf-d2ca2e12dca9.png">

<br>

### APPArmor는 무엇인가?  

>시스템 관리자가 프로그램 프로필 별로 프로그램의 역량을 제한할 수 있게 해주는 리눅스 커널 보안 모듈이다. <br> 프로필들은 네트워크 액세스, raw 소켓 액세스 그리고 파일의 읽기, 쓰기, 실행 같은 능력을 허용할 수 있다. <br>AppArmor는 강제적 접근 통제(MAC)를 제공함으로써 전통적인 유닉스 임의적 접근 통제(DAC) 모델을 지원한다. <br>이것은 리눅스 버전 2.6.36부터 포함되었으며, 개발은 2009년부터 캐노니컬 사에 의해 지원된다.

<br> <br> <br> <br>

## <체크리스트>
 
### 1)Setup
> https://velog.io/@appti/born2beroot-Virtualbox-Debian-설치

* 그래픽환경에서 동작하지 않는 것을 확인 (Ensure that the machine does not have a graphical environment at launch)
* root가 아닌 사용자로 login (Connect the user not root)
* password를 활용해서 machine에 로그인. (Password should be ruled as subject it saids) (->2)User)
* UFW가 동작해야함 (Check that the UFW service is working) (->5)UFW)
```{.bash}
sudo ufw status verbose 
```
<br>

* SSH service가 동작해야함 (Check that the SSH service is working) (->6)SSH)
```{.bash}
sudo systemctl status ssh
```
<br>


* 선택한 OS가 무엇인지 확인해야함. (Check the OS)
```{.bash}
sudo hostnamectl
```

<br>

### 2)User

* 현재 사용자의 group status를 확인하기 (Check current user group status)
  * - id 사용자명


#### 비밀번호 정책 (password policy)
> - (1)비밀번호는 30 일마다 만료되어야합니다.

> - (2)비밀번호 수정 전까지 허용되는 최소 일수는 2로 설정됩니다.

> - (3)사용자는 암호가 만료되기 7 일 전에 경고 메시지를 받아야합니다.

> - (4)비밀번호는 10 자 이상이어야합니다. 대문자와 숫자를 포함해야합니다. 또한 3 개 이상의 연속 된 동일한 문자를 포함 할 수 없습니다.

> - (5)암호에는 사용자 이름이 포함되지 않아야합니다.

> - (6)다음 규칙은 루트 비밀번호에 적용되지 않습니다. : 비밀번호는 이전 비밀번호의 일부가 아닌 최소 7 자.

#### password policy 변경법
* set password complexity (1 ~ 3)
 ```{.bash}
 sudo vi /etc/login.defs
 ```
 > (변경) "PASS_MAX_DAYS 30", "PASS_MIN_DAYS 2", "PASS_WARN_AGE 7", "PASS_MIN_LEN 10"

 > https://www.linuxtechi.com/enforce-password-policies-linux-ubuntu-centos/

<br>

* (비밀번호 정책 변경) set password complexity (4 ~ 6)
```{.bash}
sudo apt install libpam-pwquality
 ```
 > PAM module to check password strength
<br>

```{.bash}
sudo vi /etc/pam.d/common-password
 ```
 
 > (변경) retry=3 : 암호 입력 3회까지

 > minlen=10 : 암호 최소 길이는 10

 > difok=7 : 기존 패스워드와 달라야하는 문자 수는 7

 > ucredit=-1 : 대문자 한 개 이상

 > lcredit=-1 : 소문자 한 개 이상

 > dcredit=-1 : 숫자 한 개 이상

 > reject_username : username이 그대로 또는 뒤집혀서 새 패스워드에 들어있는지 검사하고, 들어있으면 거부

 > enforce_for_root : root 사용자가 패스워드를 바꾸려고 하는 경우에도 위의 조건들 적용
<br>

```{.bash}
sudo passwd -e 사용자명
 ```
 > root계정과 현존하는 사용자 계정의 암호 변경을 강제한다. 다음 번 로그인시에 암호를 변경하라고 뜨게 된다.


* 새로운 사용자 추가하기 (Add User)
```{.bash}
sudo adduser 사용자명
```
<br>

* evaluating이라는 그룹 만들기 (Create group 'evaluating')
```{.bash}
sudo groupadd evaluating
```
* password 정책의 장단점 (Advantage and Disadvantage of Password policy)

<br>

### 3)Hostname and Partitiions

* hostname 확인하기 (Check Hostname)
```{.bash}
sudo hostnamectl
```
<br>

* hostanem 변경하기 (Change Hostname)
```{.bash}
sudo hostnamectl set-hostname 바꾸려는호스트명
```
<br>

* 파티셔닝 상태 확인하기 (Check partioning status)
```{.bash}
lsblk
```
* LVM이 무엇인가?
> Logical(논리적인) Volume(공간을) Manager(만들게 해주는{관리 해주는} 프로그램)입니다.

> https://wiseworld.tistory.com/32

<br>

### 4)Sudo

* Check sudo installed
```{.bash}
dpkg -l sudo
```
<br>

* Install sudo
```{.bash}
apt-get install sudo
```

#### Group
* Add new user in primary group
```{.bash}
usermod (user) -g (group)
```
<br>

* Add new user in secondary group
```{.bash}
usermod -aG (group1),(group2) (user)"
```
<br>

* Check groups
```{.bash}
cat /etc/group
```
> 사용자명:사용자비밀번호:사용자번호:PrimaryGroup번호::Home디렉토리: <br>
> https://m.blog.naver.com/wideeyed/221512008307


* Delete user from group
```{.bash}
sudo deluser 사용자명 그룹명
```
<br>

* Delete user
```{.bash}
sudo userdel -r 사용자명
```

#### Sudoer file setting
* 로그 파일을 저장할 경로 생성
```{.bash}
sudo mkdir /var/log/sudo/
```
<br>

*  '/etc/sudoers'파일을 수정
```{.bash}
sudo visudo
```
> (변경)  Defaults secure_path=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/snap/bin <br> sudo 만의 환경변수 설정


> Defaults    authfail_message="Authentication attempt failed." <br> 권한 획득 실패시 띄울 커스텀 메세지

> Defaults    badpass_message="Wrong password!" <br> 암호 실패시 띄울 메세지

> Defaults    log_input <br> sudo를 통해 입력된 input은 로그에 기록된다.

> Defaults    log_output <br> sudo를 통해 입력된 output은 로그에 기록된다.
 
> Defaults    requiretty <br> tty에 연결되지 않은 채로 sudo를 실행하는 것을 금지? ex. 쉘 스크립트 상에서 sudo 커맨드 수행 금지.

> Defaults    iolog_dir="/var/log/sudo/" <br> 로그를 저장할 경로.

* "/var/log/sudo" Check


### 5)UFW

* Install UFW
```{.bash}
sudo apt install ufw
```
<br>

* Check UFW installed
```{.bash}
sudo ufw status verbose
```
<br>

* 부팅 시 ufw 활성화되게 설정
```{.bash}
sudo ufw enable
```
<br>

* 기본 incoming deny로 설정
```{.bash}
sudo ufw default deny
```
<br>

* UFW 란?

> UFW(Uncomplicated Firewall,언컴플리케이티드 방화벽)는 데비안 계열 및 다양한 리눅스 환경에서 작동되는 사용하기 쉬운 방화벽 관리 프로그램이다.

> https://ko.wikipedia.org/wiki/UFW


* ssh연결 허용(4242라는 커스텀 포트 사용하는 경우)
```{.bash}
sudo ufw allow 4242
```
<br>

* UFW rules list
```{.bash}
sudo ufw status numbered
``` 
<br>

* Delete UFW rule
```{.bash}
sudo ufw delete 규칙번호
```


### 6)SSH

#### SSH 설정
* Check SSH installed
```{.bash}
apt search openssh-server
```
<br>

* Install SSH
```{.bash}
apt install openssh-server
```
<br>

* openssh 실행 여부와 사용 포트
```{.bash}
systemctl status ssh
```
<br>

* SSH 란?

> Secure Shell (SSH)

> 원격지 호스트 컴퓨터에 접속하기 위해 사용되는 인터넷 프로토콜. 보통 축약해서 SSH라고 부른다. 뜻 그대로 보안 셸이다. 기존의 유닉스 시스템 셸에 원격 접속하기 위해 사용하던 텔넷은 암호화가 이루어지지 않아 계정 정보가 탈취될 위험이 높으므로, 여기에 암호화 기능을 추가하여 1995년에 나온 프로토콜이다. 

> https://ko.wikipedia.org/wiki/시큐어_셸

* SSH Port 설정 보기
```{.bash}
ss -tunlp
```
<br>

* 4242port 허용
```{.bash}
sudo ufw allow 4242
```
<br>


#### VM에서 포트포워딩 설정(Access as new user at terminal)

* 설정 > 네트워크 > 고급 > 포트포워딩

<img width="682" alt="스크린샷 2021-08-11 오후 12 55 03" src="https://user-images.githubusercontent.com/74805318/128967692-047b71f9-467d-4877-99c7-1f25ffada5fd.png">

* 호스트 IP : 접속 컴퓨터 ip, host port 2424, 게스트 IP : 10.0.2.15, guest port: 4242

![D174C4BD-193C-47A2-9A61-AFC348C71A26 2](https://user-images.githubusercontent.com/74805318/128968029-c1f1641a-5025-45b3-ae00-f3ffb11992b8.jpg)

* 연결

```{.bash}
ssh seungsle@192.000.000.000 -p 2424
```
> ssh <계정 이름>@<서버 주소> -p 포트번호

#### ssh 접속 root 계정 제한 방법
* ssh 설정 파일
```{.bash}
vi /etc/ssh/sshd_config
```
<br>

* no로 변경
```{.bash}
PermitRootLogin no
```
<br>

* 저장후 ssh 다시시작
```{.bash}
service ssh restart
```
<br>


### 7)Script monitering


* 이를 /monitoring.sh로 작성하고 "chmod +x /monitoring.sh"을 통해 실행 권한 부여.

* 그 후 /monitoring.sh | wall하면 모든 사용자에게 스크립트 출력 내용이 띄워지게 된다.


```{.bash}
#!/bin/bash

printf "#Architecture: "
uname -a

printf "#CPU physical : "
nproc --all

printf "#vCPU : "
cat /proc/cpuinfo | grep processor | wc -l

printf "#Memory Usage: "
free -m | grep Mem | awk '{printf"%d/%dMB (%.2f%%)\n", $3, $2, $3/$2 * 100}'

printf "#Disk Usage: "
df -BM -a | grep /dev/mapper/ | awk '{sum+=$3}END{print sum}' | tr -d '\n'
printf "/"
df -BG -a | grep /dev/mapper/ | awk '{sum+=$2}END{print sum}' | tr -d '\n'
printf "GB ("
df -BM -a | grep /dev/mapper/ | awk '{sum1+=$3 ; sum2+=$2 }END{printf "%d", sum1 / sum2 * 100}' | tr -d '\n'
printf "%%)\n"

printf "#CPU load: "
mpstat | grep all | awk '{printf "%.1f%%\n", 100-$13}'

printf "#Last boot: "
who -b | sed 's/ system boot //g'
#(주석) 'system boot'앞 뒤로 적절한 갯수의 스페이스 집어넣었음

printf "#LVM use: "
if [ "$(sudo lvscan | grep -i ACTIVE | wc -l)" -gt 0 ] ; then printf "yes\n" ; else printf "no\n" ; fi

printf "#Connections TCP : "
ss -t | grep -i ESTAB | wc -l | tr -d '\n'
printf " ESTABLISHED\n"

printf "#User log: "
who | wc -l

printf "#Network: IP "
/sbin/ifconfig | grep broadcast | sed 's/inet//g' | sed 's/netmask.*//g' | sed 's/ //g' | tr -d '\n'
printf " ("
/sbin/ifconfig | grep 'ether ' | sed 's/.*ether //g' | sed 's/ .*//g' | tr -d '\n'
printf ")\n"

printf "#Sudo : "
grep 'sudo:' /var/log/auth.log | grep 'COMMAND=' | wc -l | tr -d '\n'
printf " cmd\n"
```

> os의 아키텍쳐와 커널 버전 : "uname -a"를 통해 출력

> the number of physical processors : "nproc --all"을 통해 설치된 프로세서의 갯수를 출력

> the number of virtual processors : "cat /proc/cpuinfo | grep processor | wc -l"을 통해 가상 프로세서(vCPU)의 갯수를 출력

> the available RAM on your server and its utilization rate as a percentage : "free -m | grep Mem | awk '{printf "%d/%dMB (%.2f%%)", ＄3, ＄2, ＄3/＄2 * 100}'"

> the available memory on your server and its utilitzation rate as a percentage : "df -BM -a | grep /dev/mapper"

> the utilization rate of your processors as a percentage : "sudo apt-get install sysstat" && "mpstat | grep all | awk '{printf "%.2f%%", 100-$13}'"

> the date and time of the last reboot : "who -b | sed 's/ system boot //g'"

> Whether LVM is active or not : if [ "＄(lvscan | grep -i ACTIVE | wc -l)" -gt 0 ] ; then echo "yes" ; else echo "no" ; fi

> The number of active connections. : "ss -t | grep -i ESTAB | wc -l"하면 현재 established tcp 연결 수 출력

> The number of users using the server. : "who | wc -l"

> The IPv4 address of your server and its MAC (Media Access Control) address. : IPv4는 "/sbin/ifconfig | grep broadcast | sed 's/inet//g' | sed 's/netmask.*//g' | sed 's/ /g' "를 통해 추출 가능. MAC은 "/sbin/ifconfig | grep 'ether ' | sed 's/.*ether //g' | sed 's/ .*//g' "을 통해 추출 가능

> The number of commands executed with the sudo program. : "grep 'sudo:' /var/log/auth.log | grep 'COMMAND=' | wc -l"을 통해 출력 가능

* Cron이란?

> 유닉스 계열 컴퓨터 운영체제의 시간 기반 잡 스케줄러이다. 소프트웨어 환경을 설정하고 관리하는 사람들은 작업을 고정된 시간, 날짜 간격에 주기적으로 실행할 수 있도록 스케줄링하기 위해 cron을 사용한다.

> "sudo crontab -e"를 통해 root 계정의 crontab 스케쥴러를 열고 난 후 "*/10 * * * *    /monitoring.sh | wall"을 입력하여 매 10분마다 root권한에서 "/monitoring.sh | wall"이 실행되도록 한다. 

> https://jdm.kr/blog/2

> https://velog.io/@taeskim/cron

### 8)Bonus

* lighttpd, MariaDB 및 PHP 서비스를 사용하여 기능적인 WordPress 웹 사이트를 설정합니다.

워드프레스를 설치하려면 PHP를 사용할 수 있는 웹서버와 데이터베이스 서버가 필요하다.
- web server : lighttpd
- database : MariaDB
* 웹 서버, CGI, FastCGI - PHP를 사용하는 이유?
> https://nostressdev.tistory.com/10

> https://nostressdev.tistory.com/11
