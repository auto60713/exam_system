<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php


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

    echo"<br>你答錯了 ".$error." 題";
?>