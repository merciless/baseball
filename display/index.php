<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>.::Display::.</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<style>
body{
	
	background-image: url(../images/background.jpg);
	background-repeat: repeat-x;
	background-color:#75001e;
	
}

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #000000;
    margin: 1em 0;
    padding: 0; 
														}

#form {
	margin-top: 0px;
	max-width: 500px;
	padding: 30px;
	background-color: #D7D7D7;
	border: solid 0px #000000;
	-moz-border-radius-topleft: 25px;
	-moz-border-radius-topright: 25px;
	-moz-border-radius-bottomleft: 25px;
	-moz-border-radius-bottomright: 25px;
	-webkit-border-top-left-radius: 25px;
	-webkit-border-top-right-radius: 25px;
	-webkit-border-bottom-left-radius: 25px;
	-webkit-border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	-moz-box-shadow: 0px 10px 25px #000000;
	-webkit-box-shadow: 0px 10px 25px #000000;
	box-shadow: 0px 10px 25px #000000;
}
</style>
</head>

<body>
<div class="container"  style="padding-top:50px;">
<div align="center">
<img src="../images/zforms.png" class="img-responsive"/>
</div>
</div>

<div class="container" id="form">
  <form method="post" action="login_process.php" >
    <input type="hidden" name="hdLogin" value="1" />
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="text" class="form-control" name="email" placeholder="Your Email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Your Password">
    </div>
    <div>
      <?php $ErrMsg = '';  print $ErrMsg; ?>
    </div>
    <input name="Submit" type="submit" class="btn btn-primary pull-right" value="LOG IN">
  </form>
</div>
<div class="container" style="padding-top:50px;">
<p align="center" style="color:#fff; font-size:12px; margin-top:"><img src="../images/internet.png" width="37" height="38" alt=""/>Powered by: Internet y Multimedios VPMAE</p>
</div>
</body>
</html>