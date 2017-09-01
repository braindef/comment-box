<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pasquale Olivito | Kunst</title>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <!-- Viewport - für Responsives Design -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
  <!-- Stylesheet -->
  <link href="css/styles.css" rel="stylesheet">
  <!-- HTML5Shiv -->
  <!--[if lt IE 9]>
	<script src="bower_components/html5shiv/dist/html5shiv.js"></script>
  <![endif]-->
  <!-- jQeury -->
  <script src="jQuery.js"></script>
  <!-- Prefixfree.js of Lea Verou -->
  <script src="js/prefixfree.min.js"></script>



<script>

function saveToDatabase(editableObj) {
	var x='saveToDatabase';
	alert(editableObject.name.value);
	alert(x);
	console.log(x);
}

</script>



</head>
<body>

    <header>
        <div class="container padding-20 height">
            <div class="photo"></div>
            <div class="text">
                <h1>Hoi zäme!</h1>
                <p>Ich wönsche Euch vel Spass a minere neue Website. Lueged Euch mini Belder mol a! Es chömed emmer meh dezue. Ich freue mech of guets Feedback!<br><br>Peace<br>Pasquale</p>
            </div>
        </div>
    </header>

<?php
$index=0;
$files = scandir('img-small/');
foreach($files as $file) {
?>

<?php
  echo "<img src=\"img-small/$file\">";
?>
<div class="kommentare container padding-10 flex">
</div>

<h3>> Alle Kommentare lesen!</h3>

<form class="form" onsubmit="saveToDatabase(this)">
  <input class="name" type="text" name="name" placeholder="Name:">
  <br>
  <input class="email" type="text" name="email" placeholder="E-Mail:">
  <br>
  <textarea class="comment" name="comment" rows="5" cols="40" placeholder="Dein Feedback:"></textarea>
  <br>
  <input class="submit" type="submit" name="submit" value="send">
</form>

<h2>> Feedback geben!</h2>

<?php
}
?>


</body>
</html>
