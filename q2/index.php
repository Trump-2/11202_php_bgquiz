<?php include_once "db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問卷調查</title>
  <link rel="stylesheet" href="../css/bootstrap.css">

  <style>
  </style>
</head>

<body>
  <header class="p-5">
    <h1 class="text-center">問卷調查</h1>
  </header>
  <main class="container">
    <fieldset>
      <legend>目前位置：首頁 > 問卷調查</legend>
      <table class="table">
        <tr>
          <th>編號</th>
          <th>問卷題目</th>
          <th>投票總數</th>
          <th>結果</th>
          <th>狀態</th>
        </tr>

        <?php
        // 因為要顯示主題到 index.php 頁面，所以要再另外加上 sh = 1 的條件去撈資料
        $ques = $Que->all(['subject_id' => 0, 'sh' => 1]);
        foreach ($ques as $idx => $que) {
        ?>
          <tr>
            <td><?= $idx + 1 ?></td>
            <td><?= $que['text'] ?></td>
            <td><?= $que['count'] ?></td>
            <td><a class="btn btn-secondary" href="result.php?id=<?= $que['id'] ?>">投票結果</a></td>
            <td>
              <a class="btn btn-warning" href="vote.php?id=<?= $que['id'] ?>">我要投票</a>
            </td>

          </tr>
        <?php
        }

        ?>
      </table>
    </fieldset>
  </main>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>