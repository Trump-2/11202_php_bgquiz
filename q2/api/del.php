<?php
include_once "../db.php";

if (isset($_GET['id'])) {
  // 刪除主題
  $Que->del($_GET['id']);

  // 刪除和主題相關的選項
  $Que->del(['subject_id' => $_GET['id']]);
}

header("location:../admin.php");
