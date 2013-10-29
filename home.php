<?php session_start(); ?>

<?php

if($_SESSION['userID'] != null)
{
  echo '<meta http-equiv=REFRESH CONTENT=0;url=member.php>';
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="connect.php">
帳號：<input type="text" name="id" /> <br>
密碼：<input type="password" name="pw" /> <br>
<input type="submit" name="button" value="登入" />&nbsp;&nbsp;

</form>