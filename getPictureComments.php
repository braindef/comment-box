<?php

setlocale(LC_TIME, "de_DE.UTF-8"); //für deutsche Wochentage und Monate
setlocale(LC_TIME, "de_CH.utf8"); //für deutsche Wochentage und Monate

require_once "db_controller.php";
$db = new DBController();

$date = $name = $email = $comment = "";
$query = "SELECT * FROM comments where image=\"".$file."\"";
//$query = "SELECT * FROM comments where image=\"".$_GET["image"]."\"";
//$query = "SELECT * FROM comments where image=;"; pic1-small.jpg
$resultset = $db->runQuery($query);

if ($resultset == NULL)
{
  echo "Noch kein Feedback vorhanden!";
} 
else
{
  foreach($resultset as $key=>$value)
  {
    $date = $resultset[$key]['date'];
    $name = $resultset[$key]['name'];
    $email = $resultset[$key]['email'];
    $comment = $resultset[$key]['comment'];

    echo "<div class='kommentar'>";
    echo date("d. M. Y H:i", strtotime($date));
    echo "<br>";
    echo "<strong>$name</strong>";
    echo "<br>";
    echo $comment;
    echo "</div>";
  }
}

?>
