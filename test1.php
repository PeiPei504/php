<?php  
$link=mysql_connect("localhost","root","管理員密碼");  
mysql_select_db("infosystem", $link);  
$q = "SELECT * FROM info";  
mysql_query("SET NAMES GB2312");  
$rs = mysql_query($q, $link);  

echo "<table>";  
echo "<tr><td>部門名稱</td><td>員工姓名</td><td>PC名稱</td></tr>";  
while($row = mysql_fetch_object($rs)) 
	echo "<tr><td><a href=’dodel.php?id=$row->id’>del</a></td><td>$row->depart</td><td>$row->ename</td></tr>";  
echo "</table>";  
?> 