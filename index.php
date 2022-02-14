<?php
require_once './models/book.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Books</title>
  <link rel="stylesheet" href="./public/css/styles.css">
</head>

<body>
  <div class="container">
    <div>
      <span>
        <h1 class="text-center fs">បញ្ជីសៀវភៅ</h1>
      </span>
      <span class="text-right">
        <a href="./form-book.php" class="btn btn-blue">បញ្ចូលសៀវភៅថ្មី</a>
      </span>
    </div>

    <table id="table">
      <tr>
        <th>លេខកូដ</th>
        <th>ចំណងជើង</th>
        <th>អ្នកនិពន្ធ</th>
        <th>ឆ្នាំបោះពុម្ព</th>
        <th></th>
      </tr>
      <?php

      $res = Book::select();
      while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td><a href=\"./form-book.php?id=" . $row['id'] . "\">Edit</a></td>";
        echo "</tr>";
      }

      ?>
    </table>
  </div>
</body>

</html>