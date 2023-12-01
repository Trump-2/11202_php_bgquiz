<h3 class="text-center mt-3">更新標題區圖片
  <!--<?= $_GET['id'] ?>-->
</h3>
<hr>
<form action="update_title.php" method="post" enctype="multipart/form-data">
  <table class="col-8 m-auto">
    <tr>
      <td>標題區圖片：</td>
      <td><input type="file" name="img" id=""></td>
      <input type="hidden" name="id" value=<?= $_GET['id'] ?>>
    </tr>
  </table>
  <div class="text-center">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
  </div>
</form>