<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<html>
<body>
<?php
include("mysql_connect.inc.php");
$id = $_SESSION['userID'];
$sql = "SELECT name FROM member where userID = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);


echo '<h4>會員首頁</h4>';




//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['userID'] != null)
{
       
       
		echo '<form action="exam.php" method="post" name="form1">'; 
		 echo '<a href="logout.php">登出</a>　　　'; 
        echo '<input name="startexam" type="submit" value="開始考試"><br><br>';
		echo '</form>'; 
        echo '你好!　'.$row[0].'<br>';
      
		
		
	    echo  "<h3>歷屆考試成績：<br></h3>";
				
    
        //將資料庫裡的所有會員資料顯示在畫面上
        $sql = "SELECT * FROM score where userID = '$id'";
        $result = mysql_query($sql);
		
		   echo "<table border='1'>";	
            echo "<tr>";
		    echo "<th>考試代號</th><th>日期</th><th>名稱</th><th>答錯題數</th><th>分數</th>";
			echo "</tr>";		   
        while($row = mysql_fetch_row($result))
        {
            echo "<tr>";
		    echo "<td>$row[0]　</td><td>$row[2]　</td><td>$row[3]　</td><td>$row[4]　</td><td>$row[5]　</td>";
			echo "</tr>";
        }
	       echo "</table>";
}
else
{
        echo '請先登入帳號密碼 ^_^';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=home.php>';
}
?>

</body>
</html>