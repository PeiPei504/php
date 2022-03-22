<HTML>
<HEAD>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <TITLE>刪除資料接收端</TITLE>
  <STYLE TYPE="text/css">
  <!--
  .style1{
  font-family:"標楷體";
  font-size:24px;
  color:#FF0000;
  }
  .style2{
  font-family:"Times New Roman",Times, serif;
  font-weight: bold;
  }
  .style5 {font-size: 28px}
body {
    background-image: url(images/ball66.jpg);
    margin-left: 70px;
}
-->
</style> 
  </HEAD>

<BODY>
<p class="style1 style5">遊戲購買-刪除</p>
<br>
<?php //PHP程式起始區域
$sNo = $_POST['sNo'];
$cNo = $_POST['cNo'];
$semester = $_POST['semester'];
date_default_timezone_set("Asia/Taipei");
$today=getdate();
$date1="$today[year]/$today[mon]/$today[mday]-$today[hours]:$today[minutes]";

echo "<table width=300 border=3>";
echo "<tr><td>帳號</td><td>$sNo</td></tr>";
echo "<tr><td>遊戲編號</td><td>$cNo</td></tr>";
echo "<tr><td>歲數</td><td>$semester</td></tr>";
echo "<tr><td>價錢</td><td>$date1</td></tr>";
echo "</table>";



$ip = $_SERVER['REMOTE_ADDR'];
$record = "$sNo,$cNo,$semester,\r\n";

if (!$fp=fopen("finalresult.txt","a")){
	echo "檔案無法開啟";
	exit;
}
fputs($fp, $record);
fclose($fp);

$username = "root";
$password = "";
$hostname = "localhost";

$db_link = mysqli_connect($hostname, $username, $password);
if(!$db_link) exit("MySQL error: ".mysqli_connect_error());
mysqli_set_charset($db_link, "utf-8");

$selected = mysqli_select_db($db_link, "php")
 or die("Could not select examples");
 
 
 
$sql1 = "SELECT * FROM choose WHERE sNo='$sNo'";
$nums=mysqli_num_rows(mysqli_query($db_link, $sql1));
    if($nums > 0){
		$sql = "DELETE FROM choose WHERE sNo='$sNo' AND cNo='$cNo' AND semester='$semester'";
         if (mysqli_query($db_link, $sql)){
	         echo "<br>* 資料已刪除";
        }else{
	         echo "<br>* 資料未刪除!Error: ".$sql."<br>".mysqli_error($db_link); 
        }
    }else{
        echo $sNo."查無此資料";
    }
	
 mysqli_close($db_link);
 
 ?>
 </p>
 
</BODY>
</HTML>
