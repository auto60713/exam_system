<?php session_start(); ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
form {
         position:relative;
         top:40%;
		 text-align:center;
}
#ball{
	border-radius: 50%;
	width: 500px;
	height: 500px;
	background: #AFD6FF;
    opacity: 0.5;
	position: absolute; 
	top:7%;
	left:15%;
	z-index: -1; 
	
	
	/* webkit chrome, safari, mobile */
			  -webkit-animation-name: spin; 
			  -webkit-animation-duration: 5s; /* 3 seconds */
			  -webkit-animation-iteration-count: infinite; 
			  -webkit-animation-timing-function: ease;
}	

h1 {
position: absolute; 
    font-size:40px;
	top:20%;
	left:20%;
}

@-webkit-keyframes spin {
		  0% { top:7%; }
          
		  50% { top:17%; }
          100% {top:7%;}
		}
		


</style> 
 
<body>


<?php

if($_SESSION['userID'] != null)
{
  echo '<meta http-equiv=REFRESH CONTENT=0;url=member.php>';
}
?>

<div id="ball"></div>
<h1>南都汽車 - 線上考試系統</h1>
<form name="form" method="post" action="connect.php">
帳號：<input type="text" name="id"/> <br>
密碼：<input type="password" name="pw"/> <br><br>
<input type="submit" name="button" value="　登入　"/>

</form>



</body>
</html>