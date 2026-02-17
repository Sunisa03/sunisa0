<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunissa</title>
</head>

<body>

<h1>งาน i -- สุนิสา จันทัน (เนย)</h1>

<table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
        <th>ลบ</th>
    </tr>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM `regions`";
$rs = mysqli_query($conn, $sql);
while($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['r_ID'];?></td>
        <td><?php echo $data['r_name'];?></td>
        <td width="80" align="center"><img src="image/1.jpg" width="20"></td>
    </tr>
<?php } ?>
</table>

</body>
</html>
