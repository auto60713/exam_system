<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$choice = array();

        for($i=1;$i<=3;$i++){
            $choice[$i] = $_POST['answer'.$i];

        }
$error = 0;
        for($j=1;$j<=3;$j++){
		   echo"第 ".$j." 題--";
           echo" 你得答案 ".$choice[$j];
           echo" 正確答案 ".$_SESSION[ans][$j]."<br>";
         if ($choice[$j] != $_SESSION[ans][$j]){
		 $error = $error+1;
		 }
        }

    echo"<br>你答錯了 ".$error." 題<br><br>";
	echo"<a href='member.php'><input type='button' value='確定'></a>";
	
	
	
	$id = $_SESSION['userID'];
	$date = date("Y-m-d H:i:s");
	$sql = "insert into score (userID, date, about, error, score) values ('$id', '$date', '測試考試', '$error', '100')";
        if(mysql_query($sql))
?>