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
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <!-- jQeury -->
  <!--<script src="jQuery.js"></script>-->
  <!-- Prefixfree.js of Lea Verou -->
  <script src="js/prefixfree.min.js"></script>

<script>


//========================================================================================================================================================================

$(function() {
  $("form").submit(function(){
    return false;
  })
  getAllComments();
})

function saveToDatabase(editableObj) {
        alert('name='+editableObj.name.value+'&email='+editableObj.email.value+'&comment='+editableObj.comment.value+'&image='+editableObj.image.value);
	$.ajax({
		url: "writeDatabase.php",
		type: "POST",
		data:'name='+editableObj.name.value+'&email='+editableObj.email.value+'&comment='+editableObj.comment.value+'&image='+editableObj.image.value,
		success: function(data){
                  alert("Data was succesfully captured");
                  $('.name, .email, .comment').val('');
                  getAllComments();
		}
   });
}

//========================================================================================================================================================================

  function getAllComments() {
    var nodelist = document.querySelectorAll("div.comments");
    for (i=0; i < nodelist.length; i++) {
      nodelist[i].innerHTML="TEST";
      nodelist[i].innerHTML=loadXMLDoc(nodelist[i].id);
    }
  }

function loadXMLDoc(value) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(value).innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "readDatabase.php?image="+value, true);
  xhttp.send();
}
//========================================================================================================================================================================

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

    <main>
      <div class="container padding-10 flex">



<?php
$index=0;
$files = scandir('works/');
foreach($files as $file) {
if ($file==".") continue;
if ($file=="..") continue;
//  echo $file;
?>

<?php
echo "<img src=\"works/$file\">";
?>
<h1 >Kommentare</h1>

<div id="<?php echo $file;?>" class="comments"></div>



<form class="form" id="<?php echo $file;?>" method="post" onsubmit="saveToDatabase(this)">
  <input class="image" type="hidden" name="image" value="<?php echo $file;?>" placeholder="Image:">
  <br>
  <input class="name" type="text" name="name" placeholder="Name:">
  <br>
  <input class="email" type="text" name="email" placeholder="E-Mail:">
  <br>
  <textarea class="comment" name="comment" rows="5" cols="40" placeholder="Dein Feedback:"></textarea>
  <br>
  <input class="submit" type="submit">
</form>







<?php
}
?>

      </div>
    </main>

    <footer>
        <div class="container padding-20">
            <p>2017 &copy; All Rights Reserved<br>Pasquale Olivito</p>
        </div>
    </footer>




  </body>
</html>
