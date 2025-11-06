Instrucciones rápidas:

1. Copia la carpeta game-zone-z a C:\xampp\htdocs\ (si no está ya allí)
2. Inicia Apache y MySQL en XAMPP Control Panel
3. Crear la base de datos:
   - Abre XAMPP Shell y ejecuta:
     mysql -u root < "C:\xampp\htdocs\game-zone-z\database\gamezone.sql"
4. Crear config/db.php:
   - Copia config/db.sample.php -> config/db.php
   - Ajusta si usas contraseña
5. Abrir en navegador:
   http://localhost/game-zone-z/index.php
