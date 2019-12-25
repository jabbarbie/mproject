@echo off

cd C:/xampp
C:
echo Mulai mengaktifkan mysql
mysql_start.bat
php spark serve
