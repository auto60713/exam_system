<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<html>

<style>
 
  div.show{
  background-color:#CDE5FF; 
  width:90%; 
  height:75%; 
  opacity: 1;
  padding:15px;
  position:relative; 
  box-shadow: 10px 10px 10px #888888;
  left:2%;

 }
 
 h4{word-break:keep-all;white-space:nowrap;}
</style> 

<body>
<?php
include("mysql_connect.inc.php");
$id = $_SESSION['userID'];
$sql = "SELECT name FROM member where userID = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);


echo '<h4>考試首頁</h4>';




//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['userID'] != null)
{
       

		echo '<form action="exam.php" method="post" name="form1">'; 
	    echo '　　<a href="member.php">上一頁</a>　　　'; 
        echo '<input name="startexam" type="submit" value="開始考試"><br><br>';
		echo '</form>'; 

		
		echo '<div class="show">';
        echo '你好!　'.$row[0].'<br>';
      
		
		
	    echo  "<h3>請選擇考試項目：<br></h3>";
				
    
        //將資料庫裡的考試資料顯示在畫面上
        $sql = "SELECT * FROM exam";
        $result = mysql_query($sql);
		
		   echo "<table border='1'>";	
            echo "<tr>";
		    echo "<th>日期</th><th>名稱</th><th>總類</th><th>題數</th>";
			echo "</tr>";		

        $i = 0;
      		
        while($row = mysql_fetch_row($result))
        {
            echo "<tr>";
		    echo "<td>$row[1]　</td><td><a href ='?select=$row[2]'>$row[2]</a>　</td><td>$row[3]　</td><td>$row[4]　</td>";
			echo "</tr>";
		
			//只顯示20筆資料
			$i = $i+1;
			if($i>20)
            exit;
  
        }
	       echo "</table><br>";
		   echo "你選擇了　<h4>".$_GET['select']."</h4>";
		   $_SESSION['exam_name'] = $_GET['select'];
		   echo '</div>';
}








else
{
        echo '請先登入帳號密碼 ^_^';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=home.php>';
}
?>

</body>
</html>