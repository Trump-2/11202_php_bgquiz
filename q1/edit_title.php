<?php
include_once "db.php";

/*
foreach ($_POST['id'] as $key => $id) {
  $row = $Title->find($id);
  // dd($row);
  $row['text'] = $_POST['text'][$key];
  // dd($row);
  $Title->save($row);
}

foreach ($_POST['id'] as $id) {
  $row = $Title->find($id);
  // if ($id == $_POST['sh']) {
  //   $row['sh'] = 1;
  // } else {
  //   $row['sh'] = 0;
  // }

  // 用三元運算子簡化上面的程式片段
  $row['sh'] = ($id == $_POST['sh']) ? 1 : 0;
  $Title->save($row);
}
*/

// foreach ($_POST['id'] as $id) {
//   $Title->del($id);
// }


// 用這段程式碼來簡化上面三個 foreach
foreach ($_POST['id'] as $key => $id) {
  if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
    $Title->del($id);
  } else {
    $row = $Title->find($id);
    $row['text'] = $_POST['text'][$key];
    $row['sh'] = ($id == $_POST['sh']) ? 1 : 0;
    $Title->save($row);
  }
}







// 這裡把 0 作為預設值
// $_POST['sh'] = 0;

// $Title->save($_POST);

// header("location:index.php");