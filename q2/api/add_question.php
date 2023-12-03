<?php
include_once "../db.php";

// dd($_POST);
// 處理問卷主題
$data = [];
$data['text'] = $_POST['subject'];
$data['subject_id'] = 0;
$data['count'] = 0;
// 這裡用 0 或 1 都可以
$data['sh'] = 1;

$Que->save($data);

// 處理問卷選項
foreach ($_POST['option'] as $option) {
  $data = [];
  // 這行是要找出表單輸入且存入資料庫的問卷主題名稱的 id，因為這是該主題對應的選項的 subject id
  $subject_id = $Que->find(['text' => $_POST['subject']])['id'];
  $data['text'] = $option;
  $data['subject_id'] = $subject_id;
  $data['count'] = 0;
  $data['sh'] = 1;
  $Que->save($data);
}

header("location:../admin.php");
