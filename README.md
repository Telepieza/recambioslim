# RECAMBIOSLIM
 [![license](https://img.shields.io/badge/License%20__-%20Apache%202.0-blue.svg)](http://www.apache.org/licenses/LICENSE-2.0)  [![BackEnd](https://img.shields.io/badge/BackEnd-API%20REST-blue)](https://en.wikipedia.org/wiki/Representational_state_transfer) [![BackEnd](https://img.shields.io/badge/BackEnd-PHP%207-blue)](https://www.php.net/releases/7_4_0.php) [![BackEnd](https://img.shields.io/badge/BackEnd-Slim%204-blue)](https://www.slimframework.com/) [![BackEnd](https://img.shields.io/badge/BackEnd-MySql%205.7-blue)](https://dev.mysql.com/doc/refman/5.7/en/) [![BackEnd](https://img.shields.io/badge/BackEnd-PDO-blue)](https://www.php.net/manual/es/class.pdo.php)  [![BackEnd](https://img.shields.io/badge/BackEnd-Swagger-blue)](https://swagger.io/)
 [![FrontEnd](https://img.shields.io/badge/FrontEnd-Bootstrap%205-blue)](https://getbootstrap.com/docs/5.0/getting-started/introduction/)  [![FrontEnd](https://img.shields.io/badge/FrontEnd-API%20REST-blue)](https://en.wikipedia.org/wiki/Representational_state_transfer) [![FrontEnd](https://img.shields.io/badge/FrontEnd-PHP%207-blue)](https://dev.mysql.com/doc/refman/5.7/en/) [![FrontEnd](https://img.shields.io/badge/FrontEnd-dataTables-blue)](https://datatables.net/examples/styling/bootstrap5.html) 


# Project Title

BackEnd  : API REST with MVC Technology in Slim 4.
FrontEnd : API REST PHP 7 Templates with Bootstrap 5 and dataTables, with their methods (GET and POST).
## Technologies
Language - [PHP 7.4](http://php.net) </br>
Database - [MySQL 5.4](https://www.mysql.com/)</br>
Web framework - [Slim 4](https://www.slimframework.com/)</br>
JSON Web Tokens (JWT)</br>
Swagger  - [Swagger](https://swagger.io/)</br>
Bootstrap  - [Bootstrap 5](https://getbootstrap.com/)</br>

## Demonstration 

The REST API in the hosting of Telepieza: [RecambioSlim API REST](https://www.telepieza.com/recambios/frontend/)

## Getting Started

Download the [proyect RecambioSlim](https://github.com/Telepieza/recambioslim) to server JSON using REST API, unzip, move recambioslim folder to your localhost computer o hosting.
Manual   the [proyect RecambioSlim](https://www.telepieza.com/wordpress/2023/08/15/manual-recambioslim) installation and configuration of the BackEnd and FrontEnd.

### Prerequisites

  If you have a hosting with APACHE + PHP 7 + Mysql 5.7, and the DDBB with Opencart eCommerce, starting is very easy, you have to configure the route and  setting to running the BackEnd.

  If you want to install the BackEnd on a local computer, there are two different environments:

####  (First environment)
##### Install the Visual Studio code and extensions:

| Extensions                | Description                                                                       |
| ------------------------- | ----------------------------------------------------------------------------------|
| 01.- Live Server               | Launch a development local Server with live reload feature for static & dynamic.  |
| 02.- Prettier                  | Code formatter.                                                                   |
| 03.- Code ESlin                | Integrates ESLint JavaScript                                                      |
| 04.- HTML CSS Support          | CSS Intellisense for HTML                                                         |
| 05.- Auto Rename Tag  HTML/XML | Automatically rename paired HTML/XML tag                                          |
| 06.- JavaScript (ES6) code     | This extension contains code snippets for JavaScript in ES6 syntax                |
| 07.- Path Intellinse           | Plugin that autocompletes filenames.                                              |
| 08.- Tag Close HTML/XML        | Automatically add HTML/XML close tag                                              |
| 09.- PHP Debug                 | PHP debug                                                                         |
| 10.- PHP Intelephense          | PHP code intelligence                                                             |
| 11.- Thunder Client            | Thunder Client is a lightweight Rest API Client                                   | 
| 12.- npm Intellisense          | Plugin that autocompletes npm modules in import                                   | 
| 13.- Mysql Manager             | Supports manager MySQL/MariaDB, PostgreSQL, SQLite, Redis, MongoDB ...            |

       
#### (Second environment)
##### Download and install the following programs:

| Programs                  | Description                                                                       |
| ------------------------- | ----------------------------------------------------------------------------------|
| Xampp v. 7.4.30           | [XAMPP PHP development environment (Apache + Mysql + PHP + Perl)](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/) |
| Mysql v. 5.7.43           | [MySql Server](https://dev.mysql.com/downloads/windows/installer/5.7.html)                                                       |
| WinSCP                    | [SFTP, SCP, S3 and FTP client for Windows](https://winscp.net/eng/download.php)                                                  |
| PostMan (Last version)    | [Is an API platform for building and using APIs](https://www.postman.com/downloads/)                                             |
| OpenCart v.3.0.3          | [eCommerce platform PHP and Mysql](https://github.com/opencart/opencart-3)                                                       |
| HeidiSQL                  | [Lets you see and edit data and structures DDBB MariaDB, MySQL, Microsoft SQL, PostgreSQL](https://www.heidisql.com/download.php)|
| Visual Studio Code        | [Is a code editor redefined and optimized for building modern web and cloud applications](https://code.visualstudio.com/) |
|  .. Extensions VS Code    | Automatically add HTML/XML close tag                                              |
|  ... 01) Prettier                  | Code formatter.                                                          |
|  ... 02) Code ESlin                | Integrates ESLint JavaScript                                             |
|  ... 03) HTML CSS Support          | CSS Intellisense for HTML                                                |
|  ... 04) Auto Rename Tag  HTML/XML | Automatically rename paired HTML/XML tag                                 |
|  ... 05) JavaScript (ES6) code     | This extension contains code snippets for JavaScript in ES6 syntax       |
|  ... 06) Path Intellinse           | Plugin that autocompletes filenames.                                     |
|  ... 07) Tag Close HTML/XML        | Automatically add HTML/XML close tag                                     |
|  ... 08) PHP Debug                 | PHP debug                                                                |
|  ... 09) PHP Intelephense          | PHP code intelligence                                                    |
|  ... 10) npm Intellisense          | Plugin that autocompletes npm modules in import                          | 

##### Install the FrontEnd you need a browser and php 7.

## Installing

### Configure BackEnd

copy .env.example to .env and enter the values of your DDBB.

The SECRET_KEY is the private key to generate the token with the JWT module, an example is: 'AnxP26IxTEL73PIE08EqkZA491A'
```
DB_CONN     = 'Mysql'
DB_HOST     = 'localhost'
DB_NAME     = 'recambiosv4'
DB_USER     = 'root'
DB_PASS     = ''
DB_PORT     = '3306'
DB_CHAR     = 'utf8'
APP_NAME    = 'recambioslim'
APP_DOMAIN  = 'your APP_DOMAIN'
SECRET_KEY  = 'your SECRET_KEY'
```

If you do not have the Opencart database installed, there is a DDBB in the project path /resources/database/mysql/Opencart.sql

The call to the BackEnd api with the route "http://yourdomain/opencard/"   , example : "http://recambioslim.com/opencard/"

The .htaccess file is correct call index.php.

```
  RewriteEngine On
  RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^ index.php [QSA,L]
```
The app folder contains the Routes.php program, it manages the routes and their methods, if it doesn't work when performing the tests, please check Routes.php program.

You have to change the path of the Routers.php.

```
$app->group('/opencard/api',function(Group $group) 
```

If the BackEnd does not start, see the log file in the path var/logs/*.log

### Configure FrontEnd

It can be installed on a local computer or on the same computer for testing its correct operation.

Before starting the FrondEnd, you have to check the program setting file: /public/frontend/inc/setting.php, and modify
the information of the connection with the url of the BackEnd (route) and the url of the FrontEnd (urlWebClient and pathWebClient)
In the example it is the same url for the BackEnd as for the FrontEnd.

Program setting route file /inc/setting.php

```
(string)  route        = 'http://recambioslim.com/opencard/';
(string)  company      = 'Company";
(string)  urlWebClient = 'http://recambioslim.com/';
(string)  pathWebClient = 'FrontEnd/';
```

On your local computer you can include the domain in the file hosts folder: /windows/System32/drivers/etc/hosts.
```
example : 127.0.0.1 recambioslim.com
```
Include the virtual host in the apache configuration route : /apache/conf/extra/http-vhosts.conf
```
example domain : recambioslim.com
 
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/recambioslim/public"
    ServerName  recambioslim.com
	  ServerAlias recambioslim
    ErrorLog   "logs/localhost-recambioslim-error.log"
    CustomLog  "logs/localhost-recambioslim-access.log" 
</VirtualHost>

```

In the example , to  start  the FrontEnd  the  call  in  the  browser  is : _http://recambioslim.com/frontend/

If the FrontEnd does not start, see the log file in the path var/logs/*.log

## Running the tests

In the Url [RecambioSlim API REST](https://www.telepieza.com/recambios/frontend/), with the user "demo" you have a token for testing.

 Example token:
``` 
Status : login is Ok. Token: 
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpbmZvIjoie1widXNlcl9pZFwiOjQsXCJ1c2VybmFtZVwiOlwiZGVtb1wiLFwiZW1haWxcIjpcImRlbW9AdGVsZXBpZXphLmNvbVwifSIsImlhdCI6MTY5MTcwNTMzMCwiZXhwIjoxNjkyMzEwMTMwfQ.llZBFh-iRgdEL0gZAnw5UpexxLlSQeGFcylzvQLgjAE
```

Look up the token, you can read data using postman or the VS code Thunder Client extension:
```
Authorization : Bearer Token (input token user demo)
Metodo GEST  https://www.telepieza.com/recambios/opencard/api/category/read 
{ "status": 200, "pagination": { "currentPage": 1, "limit": 20, "offset": 0, "countRows": 25, "totalLimit": 2 },
    "category": [{
            "category_id": 5, "image": "catalog/telepieza/categories/Direccion_03_175x175.jpg",
            "parent_id": 0, "top": 0, "column": 1, "sort_order": 20, "status": 1,
            "date_added": "2015-09-12 12:35:08", "date_modified": "2023-01-18 21:50:48" } ] }
```
```
[Metodo get](https://www.telepieza.com/recambios/opencard/api/category/read/5)
{ "status": 200, "category": [{
    "category_id": 5, "image": "catalog/telepieza/categories/Direccion_03_175x175.jpg",
    "parent_id": 0, "top": 0, "column": 1,
    "sort_order": 20, "status": 1,"date_added": "2015-09-12 12:35:08", "date_modified": "2023-01-18 21:50:48" } ] }
```
##### For segurity the methods PUT y DELETE do not work in https://www.telepieza.com

More information in the url : [RecambioSlim API REST](https://www.telepieza.com/recambios/frontend/)

## Authors

* **Mariano Vallespín Morales** - *Initial work* - [Telepieza](https://github.com/Telepieza)

## License

This project is licensed under the APACHE 2.0 License - see the [LICENSE](https://github.com/Telepieza/recambioslim/blob/main/LICENSE) file for details

## Release History

- 2023-08-14 - 1.0.0 Stable release.
