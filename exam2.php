<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>

<style>
 
  div.show{
  background-color:#AFD6FF; 
  width:90%; 
  height:75%; 
  opacity: 0.8;
  padding:15px;
  position:relative; 
  box-shadow: 10px 10px 10px #888888;
  left:2%;

 }
</style> 
 
<body>

<?php

if ($_POST["answer1"]!=null) {
//判斷到底有沒有考試

echo  "<br><h2>　　測驗結果：</h2><br>";
				
echo '<div class="show">';
include("mysql_connect.inc.php");

$choice = array();

        for($i=1;$i<=5;$i++){
            $choice[$i] = $_POST['answer'.$i];

        }
$error = 0;
$score = 100;
        for($j=1;$j<=5;$j++){
		   echo"第 ".$j." 題--";
           echo" 你得答案 ".$choice[$j];
           echo" 正確答案 ".$_SESSION[ans][$j]."<br>";
         if ($choice[$j] != $_SESSION[ans][$j]){
		 $error = $error+1;
		 $score = $score-20;
		 }
        }

    echo"<br>你答錯了 ".$error." 題";
	echo"　　分數 ".$score." 分<br><br>";
	echo"<a href='member.php'><input type='button' value='確定'></a>";
	
	
	
	$id = $_SESSION['userID'];
	$date = date("Y-m-d H:i:s");
	$sql = "insert into score (userID, date, about, error, score) values ('$id', '$date', '測試考試', '$error', '$score')";
	mysql_query($sql);

echo '</div>';
}
else
{
        echo '這不是正確的考試步驟喔 ^_^';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=home.php>';
}
?>


</body>