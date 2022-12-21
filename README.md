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
- Execute: 
`make install`

## Functionality description
* console auth script
  + ...
* creation script
  + ...
* Read, Update, Delete script
  + ...

## Tests
You can run tests by executing: 
`make tests`
