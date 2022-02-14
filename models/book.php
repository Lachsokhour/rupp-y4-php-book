<?php
require_once('./db/connection.php');

class Book
{

  public $id;
  public $code;
  public $title;
  public $year;
  public $author;

  private $tableName = "rupp_book";

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
    $sql = "Insert into " . $this->tableName . " (author, year, title, code) values (:author, :year, :title, :code)";
    $stmt = $con->prepare($sql);
    $res = $stmt->execute([
      'author' => $this->author,
      'year' => $this->year,
      'title' => $this->title,
      'code' => $this->code
    ]);
    if (!$res) {
      return false;
    }
    return true;
  }

  public function update($id)
  {
    $this->id = $id;
    $db = new Connection();
    $con = $db->connect();

    $sql = "update " . $this->tableName . " set author = :author, year = :year,code = :code, title = :title where id = :id";
    $stmt = $con->prepare($sql);
    $res = $stmt->execute([
      'author' => $this->author,
      'year' => $this->year,
      'title' => $this->title,
      'code' => $this->code,
      'id' => $this->id
    ]);
    if (!$res) {
      return false;
    }
    return true;
  }

  public static function select()
  {
    $db = new Connection();
    $con = $db->connect();

    $sql = "select * from rupp_book";
    $stmt = $con->query($sql);
    return $stmt;
  }

  public static function getById($id)
  {
    $db = new Connection();
    $con = $db->connect();

    $sql = "select * from rupp_book where id = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute(array($id));

    return $stmt;
  }
}
