
# Test task for IP Vorozhcov Roman
## Task
Task text is [here] (https://docs.google.com/document/d/1pFhLhqXE5_fQFxc4pgOsp8UCh0C_zc2KT_K9bxjsMyI/view)

## Plan / Report
Plan/report is [here] (https://docs.google.com/document/d/1XYcaGZKjbicPRw3z2NiuFecQjLx7E7cPGgG0xbSoYH4/edit?usp=sharing)
 
## Install
- You should have lamp/lnmp (linux, web-server, database server, php) installed
- Create config in web-server for domain (virtual host), named like voroz.lo
- Create DNS record, or record in /etc/hosts file to associate domain name of site with your server ip-address
- Pull this repo and checkout master branch
- Create user and database in your database server for project named like 'voroz'
- Set database credentials to ./config/database.php
- In ./Makefile change PHP_CONTAINER value to your php8 container name
- Execute: 
`make install`

## Functionality description
* console auth script
  + ...
* creation script
  + ...
* Read, Update, Delete script
  + authenticate
    - open site and login
    - enter credentials for test user - login: test_user@mail.ru, password: password
    - open menu item  

## Tests
You can run tests by executing: 
`make tests`

# Test task "Time Kata"
## Task
https://www.codewars.com/kata/5857e8bb9948644aa1000246/train/php
Инструкции к задаче находятся на странице выше, там же можно проверить правильность написанного кода

## Использование
точка входа находится в команде TimeKataCommand 
запуск из консоли: php artisan timekata 
