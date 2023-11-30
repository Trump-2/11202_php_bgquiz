<?php

if (!empty($_FILES['img']['tmp_name'])) {
  move_uploaded_file($_FILES['img']['tmp_name'], "./img/" . $_FILES['img']['tmp_name']);
}