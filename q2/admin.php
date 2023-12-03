<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問卷管理後台</title>
  <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>
  <header class="container p-5">
    <h1 class="text-center">問卷管理</h1>
  </header>
  <main class="container p-3">
    <fieldset>
      <legend>新增問卷</legend>
      <form action="./api/add_question.php" method="post">
        <div class="d-flex">
          <div class="col-3 bg-light p-2">問卷名稱</div>
          <div class="col-6 p-2">
            <input type="text" name="subject" id="">
          </div>
        </div>
        <div class="bg-light">
          <div class="p-2" id="option">
            <label for="">選項</label>
            <input type="text" name="option[]" id="">
            <input type="button" value="更多" onclick="more()">
          </div>
        </div>
        <div>
          <input type="submit" value="新增">
          <input type="reset" value="清空">
        </div>
      </form>
    </fieldset>

    <fieldset>
      <legend>問卷列表</legend>
      <!-- 這裡在 table 外包一層 div 是因為原本要對 table 添加 col-xxx class，但 table 不吃所以才有這層 -->
      <div class="col-9 mx-auto">
        <table class="table">
          <tr>
            <td>編號</td>
            <td>主題內容</td>
            <td>操作</td>
          </tr>
          <?php
          $ques = $Que->all(['subject_id' => 0]);

          foreach ($ques as $idx => $que) {
          ?>
            <tr>
              <td><?= $idx + 1 ?> </td> <!-- +1 讓編號從 1 開始 -->
              <td><?= $que['text'] ?></td>
              <td>
                <a href="./api/show.php?id=<?= $que['id'] ?>" class="btn btn-primary"><?= ($que['sh'] == 1) ? '顯示' : '隱藏' ?></a>
                <button class="btn btn-secondary">編輯</button>
                <!-- 在 button 外包一層 a tag 把 id 傳給 del.php  -->
                <a href="./api/del.php?id=<?= $que['id'] ?>">
                  <button class="btn btn-warning">刪除</button>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </fieldset>
  </main>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  <!-- 自己寫的 js -->
  <script>
    function more() {
      let option =
        `<div class="p-2">
            <label for="">選項</label>
            <input type="text" name="option[]" id="">
         </div>`;
      // jquery 的語法
      $("#option").before(option);
    }
  </script>
</body>

</html>
<