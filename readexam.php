<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<html>

<style>
 
  div.show{
  background-color:#F5EBFF; 
  width:90%; 
  height:75%; 
  opacity: 1;
  padding:15px;
  position:relative; 
  box-shadow: 10px 10px 10px #888888;
  left:2%;

 }
</style> 

<body>
<?php
include("mysql_connect.inc.php");


echo '<h4>查看考卷</h4>';


//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['userID'] != null)
{
        //抓取考卷資料
        $id = $_GET['select'];

        $sql = "SELECT * FROM exam where id = '$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
		
		$name = $row[2];
		
        echo '　　<a href="member_sp.php">上一頁</a>　　'; 
	    echo '　　<a href="#" onclick="delet()">刪除</a>　　　<br><br>'; 

		
		echo '<div class="show">';
	    echo "<h3>".$name."　成績整理：</h3><br>";
				
    
        //將資料庫裡的分數資料顯示在畫面上
        $sql = "SELECT * FROM score where name = '$name' ORDER BY NO DESC;";
        $result = mysql_query($sql);
		
	   	    echo "<table border='1'>";	
            echo "<tr>";
		    echo "<th>人數</th><th>考生</th><th>答錯題數</th><th>分數</th>";
			echo "</tr>";		

   		$i = 1;
        while($row = mysql_fetch_row($result))
        {
            echo "<tr>";
			$sup = "onclick='deletscore(b3)'";
		    echo "<td>".$i."　</td><td>$row[1]　</td><td>$row[4]　</td><td>$row[5]　</td><td><a $sup>重考</a></td>";
			echo "</tr>";
            $i = $i+1;
        }
	       echo "</table>";
		   echo '</div>';
}

else
{
        echo '請先登入帳號密碼 ^_^';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=home.php>';
}
?>

<script>
function delet()
{
   if(confirm("你確定要刪除　<?php echo $name; ?>　考卷?\n這會連成績一起刪除")) {
   document.location.href="<?php echo 'deletexam.php?select='.$id; ?>";
   }
   else  {  }
}



var strFun = "delectscore";
var strParam = "<?php ?>";
 
//Create the function call from function name and parameter.
var funcCall = strFun + "('" + strParam + "');";
 
//Call the function
var ret = eval(funcCall);
//How to turn a String into a javascript function


function deletscore(a)
{
   if(confirm("你確定要刪除　"+a+"　的分數嗎?")) {

  
	
   }
   else  {  }
}
</script>



</body>
</html>