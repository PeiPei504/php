<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>修改</TITLE>
<style type="text/css">
<!--
.style1 {
	font-family: "標楷體";
	font-size: 24px;
	color: #FF0000;
}
.style2 {
	font-family: "Times New Roman", Times, serif;
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
<p class="style1 style5">遊戲購買-修改</p>
<br>
<?php	//PHP程式起始區域
$sNo = $_POST['sNo'];  //指定一個變數$empId，接收傳來的"職號"empId
$cNo = $_POST['cNo'];  //指定一個變數$name，接收傳來的"姓名"name
$semester = $_POST['semester'];  //指定一個變數$q01，接收傳來的"問卷調查結果"q1
$score = $_POST['score'];

echo "<table width=300 border=3>";
echo "<tr><td>帳號</td><td>$sNo</td></tr>";
echo "<tr><td>遊戲編號</td><td>$cNo</td></tr>";
echo "<tr><td>歲數</td><td>$semester</td></tr>";
echo "<tr><td>價錢</td><td>$score</td></tr>";
echo "</table>";

//擷取 Remote User IP Address
$ip = $_SERVER['REMOTE_ADDR'];
//寫入result.txt的資料格式
$record = "$sNo,$cNo,$semester,$score\r\n";

//將問卷調查結果存入文字檔案result.txt
if (!$fp=fopen("result.txt","a")) {	//檢查能否開啟資料輸入檔案result.txt
	echo "檔案無法開啟";  			//如果不能開啟result.txt，則顯示"檔案無法開啟"
	exit;							//結束
}	
fputs($fp, $record);  //寫入輸入檔案result.txt
fclose($fp);  //關閉檔案

//以下程式為存取 MySQL Database System
$username = "root";  
$password = "";  
$hostname = "localhost";
  
//connection string with database  
$db_link = mysqli_connect($hostname, $username, $password);
if(!$db_link) exit("MySQL error : ".mysqli_connect_error());
mysqli_set_charset($db_link, "utf-8");

//connect with database  
$selected = mysqli_select_db($db_link, "php")  
  or die("找不到此筆資料");
  
$sql = "UPDATE choose SET score = '$score' WHERE sNo='$sNo' and cNo='$cNo' and semester='$semester'";

 if (mysqli_query($db_link, $sql)) {
    echo "<br>  修改資料成功";
} else {
    echo "<br>  修改資料失敗<br>" . mysqli_error($db_link);
}
mysqli_close($db_link);
?> 
</p>
</BODY>
</HTML>

