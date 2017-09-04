<?php

  echo "Start...";

  require_once "db_controller.php";
  $db = new DBController();

  echo "<br>Datenbank geöffnet";


  $query = "Select * from comments;";
  $resultset = $db->runQuery($query);


if ($resultset == NULL)
{
  echo "<br>Noch keine Daten in der Tabelle";
} 
else
{
  echo "<br>inhalt der Tabelle:";
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
