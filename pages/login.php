<?php
require __DIR__ . '/../config/db.sample.php';
include __DIR__ . '/../includes/header.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
    $_SESSION['user'] = $_POST['email'];
    header('Location: /game-zone-z/index.php');
    exit;
}
?>
<h2>Iniciar sesión</h2>
<form method="post">
  <div class="mb-3">
    <label class="form-label">Correo</label>
    <input class="form-control" type="email" name="email" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Contraseña</label>
    <input class="form-control" type="password" name="password" required>
  </div>
  <button class="btn btn-primary">Entrar</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
