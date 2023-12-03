<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投票結果</title>
  <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>
  <header class="p-5">
    <h1 class="text-center">投票結果</h1>
  </header>

  <main class="container">
    <?php
    $subject = $Que->find($_GET['id']);

    ?>
  </main>
  <h2 class="text-center"><?= $subject['text'] ?></h2>
  <ul class="list-group col-6 mx-auto">
    <?php
    $opts = $Que->all(['subject_id' => $_GET['id']]);
    // echo "<pre>";
    // print_r($opts);
    // echo "</pre>";
    foreach ($opts as $idx => $opt) {
      $div = ($subject['count'] > 0) ? $subject['count'] : 1;
      $rate = round($opt['count']  / $div, 3);
    ?>
      <li class="list-group-item list-group-item-action d-flex">
        <div class="col-6">
          <?= $idx + 1 ?>
          <?= $opt['text'] ?>
        </div>
        <div class="col-6 d-flex">

          <!-- 這裡 style 的 width 後面那串看不懂 ( 還沒補上 ) -->
          <div class="col-8 bg-success"></div>
          <div class="col-4">&nbsp;&nbsp;<?= $opt['count'] ?>票(<?= $rate * 100 ?>%)</div>
        </div>
      </li>
    <?php
    }
    ?>
  </ul>
  <button class="btn btn-primary d-block mx-auto my-5" onclick="location.href=index.php">返回</button>
  <script src=" ../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>

</body>

</html>