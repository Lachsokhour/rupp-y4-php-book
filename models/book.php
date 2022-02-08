<?php
require_once('./db/connection.php');

class Book
{

  public $id;
  public $code;
  public $title;
  public $year;
  public $author;

  public function __construct($code, $title, $year, $author)
  {
    $this->code = $code;
    $this->title = $title;
    $this->year = $year;
    $this->author = $author;
  }

  public function create()
  {
    $db = new Connection();
    $con = $db->connect();
    try {
      $sql = "Insert into rupp_book (author, year, title, code) values (:author, :year, :title, :code)";
      $stmt = $con->prepare($sql);
      $stmt->execute([
        'author' => $this->author,
        'year' => $this->year,
        'title' => $this->title,
        'code' => $this->code
      ]);
      return true;
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }
}
