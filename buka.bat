@echo off
color 6
echo Tunggu hingga proses selesai
color 2
php spark db:seed HapusSeeder
php spark migrate:rollback
color 3
php spark migrate -all
php spark db:seed IndexSeeder
color 7

pause 
start firefox http://localhost:8080
php spark serve