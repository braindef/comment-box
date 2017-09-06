<?php
require_once "db_controller.php";
$db = new DBController();

$name = $email = $comments = "";
$date = date("Y-m-d H:i");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $comments = test_input($_POST["comment"]);
  $image = test_input($_POST["image"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$query = "INSERT INTO comments (name, email, comment, date, image) VALUES ('$name', '$email', '$comments', '$date', '$image');";

$db->executeInsert($query);

?>
