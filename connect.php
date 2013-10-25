<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM member where userID = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
$sp = $row[5];
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
{
         if($sp != 1)
           {
             //將帳號寫入session，方便驗證使用者身份
			 //普通會員
              $_SESSION['userID'] = $id;
			  $_SESSION['super'] = $sp;
              echo '登入成功!';
              echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		   }
	     else
		   {
		     //管理員進入後台
              $_SESSION['userID'] = $id;
			  $_SESSION['super'] = $sp;
              echo '登入成功!　管理員模式';
              echo '<meta http-equiv=REFRESH CONTENT=2;url=member_sp.php>';
		   }
}
else
{
        echo '帳號密碼錯誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=home.php>';
}
?>