<!doctype html>
<html>
<head>
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
  <meta charset="utf-8">
  <!-- src="http://code.jquery.com/jquery-1.10.2.js"></script-->
  <!-- jQeury -->
  <script src="jQuery.js"></script>
  <!-- Prefixfree.js of Lea Verou -->
  <script src="js/prefixfree.min.js"></script>
<script>
function saveToDatabase(editableObj) {
	alert('name='+editableObj.name.value+'&email='+editableObj.email.value+'&comment='+editableObj.comment.value+'&image='+editableObj.image.value);
	$.ajax({
		url: "writeDatabase.php",
		type: "POST",
		data:'name='+editableObj.name.value+'&email='+editableObj.email.value+'&comment='+editableObj.comment.value+'&image='+editableObj.image.value,
		success: function(data){
		}        
   });
}


(function( $ ){
    $('#form0').hide();
    $('h2').click(function(){
        var link = $(this);
        $('#form0').slideToggle(300, function() {
            if ($(this).is(':visible')) {
                 link.text('> schliessen!');
            } else {
                 link.text('> Feedback geben!');
            }
        });
    });
    $('#kommentare0').hide();
    $('h3').click(function(){
        var link = $(this);
        $('#kommentare0').slideToggle(300, function() {
            if ($(this).is(':visible')) {
                 link.text('> schliessen!');
            } else {
                 link.text('> Kommentare lesen!');
            }
        });
    });
})( jQuery );

    function ajaxCall() {
        $.ajax({
            url: "readDatabase.php",
            success: (function (result) {
                $("#kommentare0").html(result);
            })
        })
    };
    ajaxCall();
    setInterval(ajaxCall, (3000));
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
if ($file==".") continue;
if ($file=="..") continue;
if ($file=="temp") continue;
echo $file;
?>

<?php
  echo "<img src=\"img-small/$file\">";
?>

<form class="form" id="<?php echo $file;?>" onsubmit="saveToDatabase(this)">
  <input class="image" type="text" name="image" value="<?php echo $file;?>" placeholder="Image:">
  <br>
  <input class="name" type="text" name="name" placeholder="Name:">
  <br>
  <input class="email" type="text" name="email" placeholder="E-Mail:">
  <br>
  <textarea class="comment" name="comment" rows="5" cols="40" placeholder="Dein Feedback:"></textarea>
  <br>
  <input class="submit" type="submit" name="submit" value="send" >
</form>
<h3>> Alle Kommentare lesen!</h3>

<h2>> Feedback geben!</h2>



<?php
}
?>

</body>
</html>
