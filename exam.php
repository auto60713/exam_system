<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<html>

<style>

  div.show{
  background-color:#AFD6FF; 
  width:80%; 
   
  opacity: 0.8;
  padding:15px;
  position:relative; 
  box-shadow: 8px 8px 10px #888888;
  left:5%;
 }
</style> 

<body>
<?php
if ($_POST["startexam"]=="開始考試") {
//考試授權


include("mysql_connect.inc.php");

	 echo  "<br><h2>　　隨機題目：</h2><br>";
				
     echo '<div class="show">';
        $NO = 1;
	    $_SESSION[ans] = array();
        //尾端數字是題目數量
        $sql = "select * from question order by RAND() limit 0,5";
        $result = mysql_query($sql);
		
		echo "<form action='exam2.php' method='POST'>";

        while($row = mysql_fetch_row($result))
        {
                 echo 
				   "
				 <h4>第".$NO."題　$row[1]</h4>
				<input type='radio' name='answer$NO'  value='1' />　$row[2]<br>
			    <input type='radio' name='answer$NO'  value='2' />　$row[3]<br>
			    <input type='radio' name='answer$NO'  value='3' />　$row[4]<br>
			    <input type='radio' name='answer$NO'  value='4' />　$row[5]<br><br>
				
		           "
				;
				$_SESSION[ans][$NO] = $row[6];
				//紀錄正確答案
				$NO = $NO + 1;
        }

		

     echo "<input type='submit' value='提交答案'>";
     echo "</form>";
	 echo '</div><br><br>';
}
else
{
        echo '這不是正確的考試步驟喔 ^_^';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=home.php>';
}
?>
</body>
</html>