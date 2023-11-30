<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>題組一</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/css.css">

</head>

<body>
  <div id="cover" style="display:none; ">
    <div id="coverr">
      <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
      <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
  </div>

  <header class="container">
    <?php
    $img = $Title->find(['sh' => 1]);
    dd($img);
    ?>
    <img src="./img/<?= $img['img'] ?>" alt="">
  </header>
  <main class="container m-auto">
    <h3 class="text-center">網站標題管理</h3>
    <hr>
    <form action="./edit_title.php" method="post">
      <table class="table table-bordered text-center">
        <tr>
          <td>網站標題</td>
          <td>替代文字</td>
          <td>顯示</td>
          <td>刪除</td>
          <td></td>
        </tr>

        <?php
        $rows = $Title->all();
        foreach ($rows as $row) {
          # code...

        ?>

        <tr>
          <td><img src=" ./img/<?= $row['img'] ?>" alt="" style="width:300px; height:30px;"></td>
          <td><input type="text" name="text[]" id="" value="<?= $row['text'] ?>" style="width:90%"></td>
          <td><input type="radio" name="sh" id="" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
          </td>
          <td><input type="checkbox" name="del[]" id="" value="<?= $row['id'] ?>"></td>
          <td><input class="btn btn-info" type="button" value="更新圖片"></td>
          <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
        </tr>

        <?php
        }

        ?>
      </table>
      <!-- 這裡因為要快，所以用 div -->
      <div class="d-flex justify-content-between">
        <div><input type="button" onclick="op('#cover','#cvr','title.php')" value="新增網站標題圖片"></div>
        <div>
          <input type="submit" value="修改確定">
          <input type="reset" value="重置">
        </div>
        <div></div>
      </div>
    </form>
  </main>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/js.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>