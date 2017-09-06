<?php

setlocale(LC_TIME, "de_DE.UTF-8");
setlocale(LC_TIME, "de_CH.utf8");

require_once "db_controller.php";
$db = new DBController();

$date = $name = $email = $comment = "";
$query = "SELECT * FROM comments where image=\"".$_GET["image"]."\"";
$resultset=$db->runQuery($query);

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
