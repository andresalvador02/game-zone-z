<?php
require __DIR__ . '/../config/db.sample.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $pid = (int)$_POST['product_id'];
    $qty = max(1, (int)$_POST['qty']);
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if (isset($_SESSION['cart'][$pid])) {
        $_SESSION['cart'][$pid] += $qty;
    } else {
        $_SESSION['cart'][$pid] = $qty;
    }
    header("Location: /game-zone-z/pages/carrito.php");
    exit;
}
include __DIR__ . '/../includes/header.php';
$cart = $_SESSION['cart'] ?? [];
$items = [];
$total = 0;
if ($cart) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $query = "SELECT id, titulo, precio FROM videojuegos WHERE id IN ($ids)";
    $res = $mysqli->query($query);
    while($r = $res->fetch_assoc()){
        $r['qty'] = $cart[$r['id']];
        $r['subtotal'] = $r['qty'] * $r['precio'];
        $total += $r['subtotal'];
        $items[] = $r;
    }
}
?>
<h2>Carrito</h2>
<?php if(empty($items)): ?>
  <p>El carrito está vacío.</p>
<?php else: ?>
  <table class="table">
    <thead><tr><th>Juego</th><th>Cantidad</th><th>Subtotal</th></tr></thead>
    <tbody>
      <?php foreach($items as $it): ?>
      <tr>
        <td><?php echo htmlspecialchars($it['titulo']); ?></td>
        <td><?php echo (int)$it['qty']; ?></td>
        <td><?php echo number_format($it['subtotal'],2); ?> PEN</td>
      </tr>
      <?php endforeach; ?>
      <tr><td></td><td class="fw-bold">Total</td><td class="fw-bold"><?php echo number_format($total,2); ?> PEN</td></tr>
    </tbody>
  </table>
  <a class="btn btn-primary" href="/game-zone-z/pages/pago_exitoso.php">Simular pago</a>
<?php endif; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
