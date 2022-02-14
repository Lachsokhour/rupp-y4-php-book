<?php
require_once './models/book.php';
$res = null;
if (isset($_GET["id"])) {
  $query = Book::getById($_GET['id']);
  $res = $query->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new Book</title>
  <link rel="stylesheet" href="./public/css/styles.css">
</head>

<body>
  <div class="container">
    <div>
      <span>
        <h1 class="text-center fs"><?php echo $res ? 'កែប្រែសៀវភៅ' : 'បញ្ចូលសៀវភៅថ្មី'; ?></h1>
      </span>
    </div>
    <div class="form">

      <form method="post" action="./request-book.php">
        <input type="hidden" name="id" value="<?php echo $res ? $res['id'] : 0 ?>"/>

        <label for="code">លេខកូដ</label>
        <input required type="text" id="code" value="<?php echo $res ? $res['code'] : '' ?>" name="code" placeholder="លេខកូដ">

        <label for="title">ចំណងជើង</label>
        <input required type="text" id="title" name="title" value="<?php echo $res ? $res['title'] : '' ?>" placeholder="ចំណងជើង">

        <label for="author">អ្នកនិពន្ធ</label>
        <input required type="text" id="author" name="author" value="<?php echo $res ? $res['author'] : '' ?>" placeholder="អ្នកនិពន្ធ">

        <label for="year">ឆ្នាំបោះពុម្ព</label>
        <input required type="text" id="year" name="year" value="<?php echo $res ? $res['year'] : '' ?>" placeholder="ឆ្នាំបោះពុម្ព">
        <input class="btn" type="submit" value="Submit">
      </form>
    </div>
    <div>
      <a href="./index.php" class="btn btn-red" type="button">បោះបង់</a>
    </div>
  </div>
</body>

</html>