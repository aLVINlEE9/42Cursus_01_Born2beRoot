Born2beRoot
===========

## <목표>

>VirtualBox을 이용해 나만의 규칙을 적용한 operating system 을 만드는것

## <개념 정리>

### Virtual Box 란?

### Debian 이란?

### CentOs 와 Debian 차이점

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
