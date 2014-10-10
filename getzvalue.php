<?php
$q = ($_GET['q']);

$conn = @mysql_connect("localhost","root","kingofsnow") or die("Error");
mysql_select_db("zform",$conn);

$sql="SELECT * FROM ztable WHERE zvalue = $q ";
$zvalue = mysql_query($sql,$conn);

while($row = mysql_fetch_array($zvalue))
{
echo 100*$row[percent]."%";
}

//mysql_close($conn);
?>