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
      <form action="add_question.php" method="post">
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