<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<html>
<body>
<?php
include("mysql_connect.inc.php");

	 echo  "<h3>隨機題目：<br></h3>";
				
 
        $NO = 1;
	    $_SESSION[ans] = array();
        //尾端數字是題目數量
        $sql = "select * from exam order by RAND() limit 0,3";
        $result = mysql_query($sql);
		
		echo "<form action='exam2.php' method='POST'>";

        while($row = mysql_fetch_row($result))
        {
                 echo 
				   "
				 題號".$NO."　序號 $row[0]　　$row[1]<br>
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

		
?>
	<input type='submit' value='提交答案'>
			 </form>


</body>
</html>