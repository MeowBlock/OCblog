
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/d6b135ed2bfc481c96f493a2daf539d1)](https://app.codacy.com/gh/MeowBlock/OCblog/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)

# My OpenClassrooms blog

This project is a personal blog with a portfolio homepage and articles



## Installation

### Pre-requisites

in order to install my project you first need

- A webserver
- PHP version 8.1+
- Mysql version 8.0+
- Composer

#### What webserver do i use ?
I use Wampserver (Windows), which you may install the latest version here : [Wampserver](https://wampserver.aviatechno.net/index.php?affiche=install&lang=en)

#### How to install Composer
You may download and install the latest version of Composer here : [Composer](https://getcomposer.org/download/)

### Installation process

#### Download the files
download the files directly from github or clone the repository using 
```git clone https://github.com/MeowBlock/OCblog.git```

#### Install the dependencies
Install the required librairies using Composer with the command ```composer install```

#### Import the database
The database schema is contained in a file named ```OCblog.sql```, you may import it

- using command line Mysql ```mysql -u username -p database_name < file.sql```

- using phpmyadmin by clicking ```Import``` in the header menu and submitting the file in the form

#### Link the code to the database
In the file ```/control/orm/Db.php``` Change the following attributes to match your database configuration :
```
private static $user = 'username';
private static $pass = 'password';
private static $host = 'localhost';
private static $dbname = 'ocblog';
```