Born2beRoot
===========

## <목표>

>VirtualBox을 이용해 나만의 규칙을 적용한 operating system 을 만드는것

## <개념 정리>

### Virtual Machine
* Virtual Machine 이란?
> 컴퓨터 안에 또 다른 컴퓨터를 동작 시키는 것이다.

> 하드웨어를 소프트웨어적으로 구현해서 그 위에서 운영체제가 작동하도록하는 기술

* Virtual Machine 이 작동하는 원리
> VM(Virtual Machine)은 물리적 하드웨어 시스템에 구축되어 자체 CPU, 메모리, 네트워크 인터페이스 및 스토리지를 갖추고 가상 컴퓨터 시스템으로 작동하는 가상 환경입니다.

> 여기서 하이퍼바이저라 불리는 소프트웨어는 하드웨어에서 가상 머신의 리소스를 분리하고 적절하게 프로비저닝하여 VM에서 사용할 수 있도록 합니다.

* 사용하는 이유
> 다른 운영체제를 사용해야 하는 경우(맥OS에서 윈도우, 윈도우에서 리눅스)

> 독립된 작업공간이 필요한 경우 (바이러스 회피, 백업)

> 하나의 머신에서 여러명에게 운영체제 환경을 제공

### Debian 이란?
> 무료 오픈소스로 구성된 리눅스 배포판이며, 커뮤니티에 의해 관리됩니다. Debian은 리눅스 커널을 기반으로 한 가장 오래된 os중 하나 입니다. 데비안(Debian)은 데비안 프로젝트에서 만들어 배포하는 공개 운영체제이다. 데비안의 특징은 패키지 설치 및 업그레이드의 단순함에 있다. 일단 인스톨을 한 후 패키지 매니저인 apt 등을 이용하면 소프트웨어의 설치나 업데이트에서 다른 패키지와의 의존성 확인, 보안관련 업데이트 등을 자동으로 해준다. 데비안은 네트워크 결합 스토리지 부터 전화기, 노트북, 데스크탑 및 서버까지 다양한 하드웨어에서 사용할 수 있다. 데비안은 안정성과 보안에 중점을 두며 다른 많은 리눅스 배포판의 기반으로 쓰이고 있다.

### CentOs 와 Debian 차이점
||Debian|CentOS|
|:---|:---:|:---:|
|소개|데비안은 가장 큰 온라인 커뮤니티 중 하나에서 사용할 수 있는 가장 오래되고 웅장한 배포판 중 하나이며 세계에서 가장 많이 갈라진 배포판입니다!|CentOS는 RHEL의 커뮤니티 버전으로 시작했으며 나중에 Fedora와 유사한 RedHat에서 직접 지원을 받기 시작했습니다.|
|전문성|중금|중급/고급|
|배포|원래 배포판임|RHEL|
|사용층|워크스테이션, ARM 기반 시스템, 구형 하드웨어에서 사용|엔터프라이즈 및 서버 사용|
|소프트웨어 지원|[10/10] <br> 기본 소프트웨어: [5/5] <br> 소프트웨어 저장소: [5/5] <br> 공식 리포지토리에 59000개 이상의 패키지가 포함된 가장 큰 소프트웨어 컬렉션이 있습니다!|[8/10] <br>기본 소프트웨어: [3.5/5] <br> 소프트웨어 저장소: [4.5/5]|

### virtual machine의 목적

### aptitude와 apt의 차이는? 

### APPArmor는 무엇인가?  

## <Check List>

### 1)Setup

* Ensure that the machine does not have a graphical environment at launch
* Connect the user not root
* Password should be ruled as subject it saids
* Check that the UFW service is working
  * - sudo ufw status verbose
* Check that the SSH service is working
  * - systemctl status ssh
* Check the OS
  * - hostnamectl


### 2)User

* Check current user group status
  * - id 사용자명
* Password policy
  * - sudo vi /etc/pam.d/common-password
  * retry=3 : 암호 입력 3회까지
  * minlen=10 : 암호 최소 길이는 10
  * difok=7 : 기존 패스워드와 달라야하는 문자 수는 7
  * ucredit=-1 : 대문자 한 개 이상
  * lcredit=-1 : 소문자 한 개 이상
  * dcredit=-1 : 숫자 한 개 이상
  * reject_username : username이 그대로 또는 뒤집혀서 새 패스워드에 들어있는지 검사하고, 들어있으면 거부
  * enforce_for_root : root 사용자가 패스워드를 바꾸려고 하는 경우에도 위의 조건들 적용
* Add User
  * - adduser 사용자명
* Create group 'evaluating'
  * - groupadd evaluating
* Advantage and Disadvantage of Password policy


### 3)Hostname and Partitiions

* Check Hostname
  * - hostnamectl
* Change Hostname
  * - sudo hostnamectl set-hostname 바꾸려는호스트명
* Check partioning status
  * - lsblk


### 4)Sudo

* Check sudo installed
  * - dpkg -l sudo
* Add new user in sudo group
  * - sudo usermod -aG sudo 새로운사용자명
* "/var/log/sudo" Check


### 5)UFW

* Check UFW installed and woring
 * - sudo ufw status verbose
* UFW rules
 * - sudo ufw status numbered
* Add UFW rules
 * - sudo vim /etc/ssh/sshd_config -> Port 8080
 * - sudo ufw allow 8080
* Delete
 * - sudo ufw status numbered
 * - sudo ufw delete 규칙번호


### 6)SSH

* Check SSH installed and woring
 * - apt search openssh-server
 * - systemctl status ssh
* Access as new user at terminal


### 7)Script monitering

https://velog.io/@taeskim/cron


### 8)Bonus
