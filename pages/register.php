<?php
require __DIR__ . '/../config/db.sample.php';
include __DIR__ . '/../includes/header.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare('INSERT INTO usuarios (nombre, correo, password_hash) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $_POST['name'], $email, $pass);
    $stmt->execute();
    $_SESSION['user'] = $email;
    header('Location: /game-zone-z/index.php');
    exit;
}
?>
<h2>Registrarse</h2>
<form method="post">
  <div class="mb-3"><label class="form-label">Nombre</label><input class="form-control" name="name" required></div>
  <div class="mb-3"><label class="form-label">Correo</label><input class="form-control" type="email" name="email" required></div>
  <div class="mb-3"><label class="form-label">Contraseña</label><input class="form-control" type="password" name="password" required></div>
  <button class="btn btn-success">Crear cuenta</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
