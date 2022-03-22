<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>查詢</TITLE>
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
<p class="style1 style5">遊戲購買-查詢</p>
<br>
<?php	//PHP程式起始區域
$sNo = $_POST['sNo'];
$cNo = $_POST['cNo'];
$semester = $_POST['semester'];

echo "輸入的資料:";
echo "<table width=300 border=3>";
echo "<tr><td>學號</td><td>$sNo</td></tr>";
echo "<tr><td>課程編號</td><td>$cNo</td></tr>";
echo "<tr><td>學期</td><td>$semester</td></tr>";
echo "</table>";

//擷取 Remote User IP Address
$ip = $_SERVER['REMOTE_ADDR'];
//寫入result.txt的資料格式
$record = "$sNo,$cNo,$semester\r\n";

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
  or die("這是您第一次新增此筆資料");
 
echo "<br>查詢結果:<br>";
 if( $sNo=='0' && $cNo=='0' && $semester=='0' ){
	$sql1="SELECT * FROM choose";	
	$nums1=mysqli_num_rows(mysqli_query($db_link,$sql1));
    if($nums1 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result1=mysqli_query($db_link,$sql1);
		for ($i=0;$i<$nums1;$i++) {
			$row = mysqli_fetch_assoc($result1);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}elseif($sNo=='0' && $cNo=='0'){
	$sql2="SELECT * FROM choose WHERE semester='$semester'";	
	$nums2=mysqli_num_rows(mysqli_query($db_link,$sql2));
    if($nums2 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result2=mysqli_query($db_link,$sql2);
		for ($i=0;$i<$nums2;$i++) {
			$row = mysqli_fetch_assoc($result2);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}elseif($cNo=='0' && $semester=='0'){
	$sql3="SELECT * FROM choose WHERE sNo='$sNo'";	
	$nums3=mysqli_num_rows(mysqli_query($db_link,$sql3));
    if($nums3 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result3=mysqli_query($db_link,$sql3);
		for ($i=0;$i<$nums3;$i++) {
			$row = mysqli_fetch_assoc($result3);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}elseif($sNo=='0' && $semester=='0'){
	$sql4="SELECT * FROM choose WHERE cNo='$cNo'";	
	$nums4=mysqli_num_rows(mysqli_query($db_link,$sql4));
    if($nums4 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result4=mysqli_query($db_link,$sql4);
		for ($i=0;$i<$nums4;$i++) {
			$row = mysqli_fetch_assoc($result4);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}elseif($sNo=='0'){
	$sql5="SELECT * FROM choose WHERE cNo='$cNo' and semester='$semester'";	
	$nums5=mysqli_num_rows(mysqli_query($db_link,$sql5));
    if($nums5 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result5=mysqli_query($db_link,$sql5);
		for ($i=0;$i<$nums5;$i++) {
			$row = mysqli_fetch_assoc($result5);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}elseif($cNo=='0'){
	$sql6="SELECT * FROM choose WHERE sNo='$sNo' and semester='$semester'";	
	$nums6=mysqli_num_rows(mysqli_query($db_link,$sql6));
    if($nums6 > 0){		
		echo "<table width=300 border=3>";
		echo"<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result6=mysqli_query($db_link,$sql6);
		for ($i=0;$i<$nums6;$i++) {
			$row = mysqli_fetch_assoc($result6);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}elseif($semester=='0'){
	$sql7="SELECT * FROM choose WHERE sNo='$sNo' and cNo='$cNo'";	
	$nums7=mysqli_num_rows(mysqli_query($db_link,$sql7));
    if($nums7 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result7=mysqli_query($db_link,$sql7);
		for ($i=0;$i<$nums7;$i++) {
			$row = mysqli_fetch_assoc($result7);
			echo "<tr><td>".$row['sNo']."</td><td>".$row['cNo']."</td><td>".$row['semester']."</td><td>".$row['score']."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}else{
	$sql8="SELECT * FROM choose WHERE sNo='$sNo' and cNo='$cNo' and semester='$semester'";	
	$nums8=mysqli_num_rows(mysqli_query($db_link,$sql8));
    if($nums8 > 0){		
		echo "<table width=300 border=3>";
		echo "<tr><td>帳號</td><td>遊戲編號</td><td>歲數</td><td>價錢</td></tr>";
		$result8=mysqli_query($db_link,$sql8);
		for ($i=0;$i<$nums8;$i++) {
			$row = mysqli_fetch_assoc($result8);
			echo "<tr><td>".$row[sNo]."</td><td>".$row[cNo]."</td><td>".$row[semester]."</td><td>".$row[score]."</td></tr>";
		}
	}else{
			echo "查無資料";
	}
}

mysqli_close($db_link);
?> 
</p>
</BODY>
</HTML>