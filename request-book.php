<?php
require_once './models/book.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $code = $_POST['code'];
  $author = $_POST['author'];
  $title = $_POST['title'];
  $year = $_POST['year'];

  $book = new Book($code, $title, $year, $author);

  if ($id == 0) {
    if ($book->create()) {
      header('location: index.php');
    }
  } else {
    if ($book->update($id)) {
      header('location: index.php');
    }
  }
}else {
  header('HTTP/1.0 405 Method Not Allowed');
}
