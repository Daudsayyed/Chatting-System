<?php 
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}

if(isset($_POST['submit']))
{
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("chat", $con);
		$message=$_POST['message'];
		$sender=$_SESSION['username'];
		//mysql_query("INSERT INTO message(message, sender)VALUES('$message', '$sender')");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Chat</title>
<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "refresh.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
		
	
			j('#post_button').click(function() {
				$text = j('#textb').val();
				j.ajax({
					type: "POST",
					cache: false,
					url: "save.php",
					data: "text="+$text,
					success: function(data) {
						//alert($text);
					}
				});
				j('#textb').val('');
				return false;
			});
			
			j( "#textb" ).keypress(function( event ) {
			  if ( event.which == 13 ) {
				 event.preventDefault();
				 $text = j('#textb').val();
				j.ajax({
					type: "POST",
					cache: false,
					url: "save.php",
					data: "text="+$text,
					success: function(data) {
						//alert($text);
					}
				});
				j('#textb').val('');
				return false;
			  }
			  //alert(event.which);
			  
			});
			
			
   j('.refresh').css({color:"green"});
});
</script>
<style type="text/css">
body{margin:0px 0px 0px 0px;}
.refresh {
    border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
    color: green;
    font-family: tahoma;
    font-size: 12px;
    height: 225px;
    overflow: auto;
    width: 415px;
	padding:10px;
	background-color:#FFFFFF;
}
#post_button{
	border: 1px solid #3366FF;
	background-color:#3366FF;
	width: 100px;
	color:#FFFFFF;
	font-weight: bold;
	margin-left: -105px; padding-top: 4px; padding-bottom: 4px;
	cursor:pointer;
}
#textb{
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
	width: 320px;
	margin-top: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; width: 415px;
}
#texta{
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
	width: 410px;
	margin-bottom: 10px;
	padding:5px;
}
p{
border-top: 1px solid #EEEEEE;
margin-top: 0px; margin-bottom: 5px; padding-top: 5px;
}
span{
	font-weight: bold;
	color: #3B5998;
}
#wrap{margin:12em 32em;}
</style>
<link href="bootstrap.css" rel="stylesheet">
</head>
<body>
<div id="wrap">

<span class="input-xlarge uneditable-input">&nbsp;&nbsp;<?php echo $_SESSION['username'];?>
<a href="logout.php" style="margin-left:22em;" >Logout</a>
</span>
<div class="refresh">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("chat", $con);

$result = mysql_query("SELECT * FROM message ORDER BY id DESC");


while($row = mysql_fetch_array($result))
  {
  echo '<p>'.'<span>'.$row['sender'].'</span>'. '&nbsp;&nbsp;' . $row['message'].'</p>';
  }

mysql_close($con);
?>

</div>
<input name="message" type="text" id="textb"/>
<button name="submit"  id="post_button" >Chat</button>

</div>
</body>
</html>
