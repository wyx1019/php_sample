<?php
require_once('data.php');
require_once('menu.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Café Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
  <script src="script.js"></script>
</head>

<body>
  <div class="menu-wrapper container">
    <h1 class="logo">Café YUKI</h1>
    <h3>メニュー<?php echo Menu::getCount() ?>品</h3>
    <form method="post" action="confirm.php">
      <div class="menu-items">
        <?php foreach ($menus as $menu) : ?>
          <div class="menu-item">
            <a class="" href="show.php?name=<?php echo $menu->getName() ?>">
              <div class="hoverArea">
                <div class="hover">
                  <p>
                    詳細を見る >>
                  </p>
                </div>
                <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
                <h3 class="menu-item-name">
                  <?php echo $menu->getName() ?>
            </a>
          </div>
          </h3>
          <?php if ($menu instanceof Drink) : ?>
            <p class="menu-item-type"><?php echo $menu->getType() ?></p>
          <?php else : ?>
            <?php for ($i = 0; $i < $menu->getSpiciness(); $i++) : ?>
              <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
            <?php endfor ?>
          <?php endif ?>
          <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?>（税込）</p>
          <input type="number" value="0" min="0" name="<?php echo $menu->getName() ?>" id="<?php echo $menu->getName() ?>">
          <label for="<?php echo $menu->getName() ?>"><span>個</span></label>
      </div>
    <?php endforeach ?>
  </div>
  <input type="submit" class="countConfirm" value="注文確認へ">
  </form>
  </div>

  <!-- <script>
    $(function() {
      $(".countConfirm").click(function() {
        if()
        console.log("個数が入力されていません");
      })
    })
  </script> -->
</body>

</html>