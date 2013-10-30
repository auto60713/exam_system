<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$name = $_POST['name'];
$kind = $_POST['kind'];
$much = $_POST['much'];
$date = date("Y-m-d H:i:s");

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($name != null && $kind != null && $much != null)
{
        //新增資料進資料庫語法
        $sql = "insert into exam (date, name, kind, much, mode) values ('$date', '$name', '$kind', '$much', 'open')";
        if(mysql_query($sql))
        {
                echo '考卷新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member_sp.php>';
        }
        else
        {
                echo '請仔細檢查資料有無錯誤!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member_sp.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=home.php>';
}
?>