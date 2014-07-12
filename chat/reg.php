<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="bootstrap.css" rel="stylesheet">
    <title>Simple Chat</title>
	</head>
	<body>
	<div class="container" style="width:20%;margin-top:100px;">
	<form name="myForm" action="insert.php" method="post">
	<fieldset>
	<legend><img src="icon.png" style="margin-top:-10px;"/>&nbsp;<i>Appy Chat</i>&nbsp;</legend>
	<div class="row">
	<input type="text" name="username" class="form-control" placeholder="Choose your User Name"></div><br/>
	<div class="row">
	<input type="password" name="password" class="form-control" placeholder="Pick a secure Password"></div>
	<br/>
	<div class="row">
	<input type="submit" class="btn btn-warning col-md-6" value="Register">
	<a href="login.php" class="btn btn-danger col-md-4 pull-right">Cancel</a>
	</div>
	</fieldset>
	</form>
	</div>
	</body>
	</html>
