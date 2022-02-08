<?php
require_once './config/config.php';

class Connection
{
  protected $dbConnection;

  public function __construct()
  {
    try {
      $this->dbConnection = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS);
      $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->dbConnection->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8
    } catch (PDOException $err) {
      echo "harmless error message if the connection fails";
      $err->getMessage() . "<br/>";
      file_put_contents('PDOErrors.txt', $err, FILE_APPEND);  // write some details to an error-log outside public_html  
      die();  //  terminate connection
    }
  }

  public function connect()
  {
    return $this->dbConnection;
  }
}
