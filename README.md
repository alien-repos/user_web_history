# user_web_history
User management and user web history management

installation

git clone https://github.com/jtkboss/user_web_history.git

composer install 

configure database name and credentials

php artisan migrate

Usage - test API

php artisan employee:manage

then enter the following commands

SET empdata 1 Petter 192.168.10.10
GET empdata 192.168.10.10
UNSET empdata 192.168.10.10


SET empwebhistory 1 192.168.10.10 http://google.com
GET empwebhistory 192.168.10.10
UNSET empwebhistory 192.168.10.10