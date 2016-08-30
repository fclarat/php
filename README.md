
# setup:
1) Importar olx.sql (la base de datos se va a llamar olx)
2) Configurar los datos de la base en Config.php
3) Correr el comando composer install
4) Correr un server en le directorio  php -S localhost:8000


- All users: http://localhost:8000/users
- Specific user: http://localhost:8000/user?id=1
- Update user: http://localhost:8000/user/update?id=1&value=facu&field=name
- Delete user: http://localhost:8000/user/delete?id=1
- Update image (e.g postman): http://localhost:8000/user/upload?id=1  filename = photo

- Extra: phpunit --bootstrap vendor/autoload.php test/UserTest.php


