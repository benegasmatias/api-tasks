
Pasos
1- La carpeta de la api debera estar si tiene xmap en  la carpte htdocs. por defecto esta ubicada en C:\xampp\htdocs
2- abrir una consola en la raiz del proyecto y colocar el comando
    Composer install
3- debera crear una base de datos con el nombre task.sql e importar la tabla task.sql que esta en la raiz del proyecto

4- por simplicidad no se ignoro el archivo .env
    pero ahi debera configurar 

    DB_DATABASE=task
    DB_USERNAME=root
    DB_PASSWORD=

5- luego probar si funciona la api tendo a la direccion http://localhost/api-tasks/public

6- para ver el swagger http://localhost/api-tasks/public/api/documentation 



