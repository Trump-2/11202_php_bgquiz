<?php
include_once "../db.php";

// dd($_POST);
$data = [];
$data['text'] = $_POST['subject'];
$data['subject_id'] = 0;
$data['count'] = 0;
// 這裡用 0 或 1 都可以
$data['sh'] = 1;

$Que->save($data);

foreach ($_POST['option'] as $option) {
  $data = [];
  $subject_id = $Que->find(['text' => $_POST['subject']])['id'];
  $data['text'] = $option;
  $data['subject_id'] = $subject_id;
  $data['count'] = 0;
  $data['sh'] = 1;
  $Que->save($data);
}

header("location:../admin.php");
