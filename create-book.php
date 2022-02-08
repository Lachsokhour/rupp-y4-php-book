<?php
require_once './models/book.php';

$code = $_POST['code'];
$author = $_POST['author'];
$title = $_POST['title'];
$year = $_POST['year'];

$book = new Book($code, $title, $year, $author);

if ($book->create()) {
  header('location: index.php');
}
