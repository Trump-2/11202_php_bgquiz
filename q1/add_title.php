<?php
include_once "db.php";

if (!empty($_FILES['img']['tmp_name'])) {
  move_uploaded_file($_FILES['img']['tmp_name'], "./img/" . $_FILES['img']['tmp_name']);
  $_POST['img'] = $FILES['img']['name'];
}
$_POST['sh'] = 0;

$Title->save($_POST);

header("location:index.php");