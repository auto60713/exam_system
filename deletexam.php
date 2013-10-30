<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<body>
<?php
include("mysql_connect.inc.php");



        //抓取考卷資料
        $id = $_GET['select'];

		
		$sql = "SELECT name FROM exam where id = '$id'";
		$result = mysql_query($sql);
        $name = mysql_fetch_row($result);
		//抓取要刪除的分數名字
		
        $sql = "DELETE FROM exam where id = '$id'";
        mysql_query($sql);
        $sql = "DELETE FROM score where name = '$name[0]'";
        mysql_query($sql);
		

		
        echo '已經刪除　'.$name[0].'　(含成績)';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member_sp.php>';
	   
?>

</body>
</html>