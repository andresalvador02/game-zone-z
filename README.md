Game Zone - Setup local (XAMPP)

1. Copiar carpeta a C:\xampp\htdocs\GameZone
2. Iniciar Apache y MySQL desde XAMPP Control Panel
3. Ejecutar script SQL:
   - Abrir XAMPP Shell y ejecutar:
     mysql -u root < "C:\xampp\htdocs\GameZone\database\gamezone.sql"
4. Crear archivo de configuración:
   - Copiar config/db.sample.php -> config/db.php y ajustar credenciales.
5. Abrir en navegador:
   http://localhost/GameZone/index.php
