<?php require_once('data.php') ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
  <div class="order-wrapper">
    <h2>注文内容確認</h2>
    <?php $totalPayment = 0 ?>

    <?php foreach ($menus as $menu) : ?>
      <?php
      $orderCount = $_POST[$menu->getName()];
      $menu->setOrderCount($orderCount);
      $totalPayment += $menu->getTotalPrice();
      ?>
      <?php if ($menu->getOrderCount() > 0) : ?>
        <p class="order-amount">
          <?php echo $menu->getName() ?>
          x
          <?php echo $menu->getOrderCount() ?>
          個
        </p>
        <p class="order-price"><?php echo $menu->getTotalPrice() ?>円</p>
      <?php endif ?>
    <?php endforeach ?>
    <?php if ($totalPayment == 0) : ?>
      <span>ご注文が見つかりません<br>メニュー一覧にて注文個数を入力してく ださい</ｓ>
        <a href="index.php">← メニュー一覧へ</a>
      <?php else : ?>
        <h3>合計金額: <?php echo $totalPayment ?>円</h3>
  </div>
  <div class="btn-group">
    <a href="index.php">← メニュー一覧へ</a>
    <input type="submit" value="注文する">
  </div>
<?php endif ?>
</body>

</html>