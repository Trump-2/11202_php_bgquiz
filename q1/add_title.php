<?php
include_once "db.php";

if (!empty($_FILES['img']['tmp_name'])) {
  move_uploaded_file($_FILES['img']['tmp_name'], "./img/" . $_FILES['img']['name']);
  $_POST['img'] = $_FILES['img']['name'];
}
// 這裡把 0 作為預設值
$_POST['sh'] = 0;

$Title->save($_POST);

header("location:index.php");