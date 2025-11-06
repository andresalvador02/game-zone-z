<?php
require __DIR__ . '/../config/db.sample.php';
include __DIR__ . '/../includes/header.php';

$stmt = $mysqli->prepare("SELECT id, titulo, descripcion, precio, imagen FROM videojuegos ORDER BY id DESC LIMIT 50");
$stmt->execute();
$res = $stmt->get_result();
?>
<h2>Catálogo</h2>
<div class="row">
<?php while($row = $res->fetch_assoc()): ?>
  <div class="col-md-4 mb-4">
    <div class="card">
      <?php if($row['imagen']): ?>
        <img src="/game-zone-z/assets/img/<?php echo htmlspecialchars($row['imagen']); ?>" class="card-img-top" alt="">
      <?php endif; ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($row['titulo']); ?></h5>
        <p class="card-text"><?php echo htmlspecialchars($row['descripcion']); ?></p>
        <p class="fw-bold"><?php echo number_format($row['precio'],2); ?> PEN</p>
        <form action="/game-zone-z/pages/carrito.php" method="post">
          <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
          <input type="number" name="qty" value="1" min="1" class="form-control mb-2" style="width:100px">
          <button class="btn btn-success">Agregar al carrito</button>
        </form>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
