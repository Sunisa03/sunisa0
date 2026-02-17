<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunissa</title>
</head>

<body>

<h1>งาน i -- สุนิสา จันทัน (เนย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
    รูปภาพ <input type="file" name="pimage" required><br>

    ภาค
    <select name="rid">
    <?php
include_once("connectdb.php");
$sql = "SELECT * FROM `provinces`";
$rs = mysqli_query($conn, $sql);
while($data = mysqli_fetch_array($rs)){
?>
        <option value="xxx">xxx</option>
<?php } ?>
    </select>
    <button type="submit" name="Submit">บันทึก</button>
</form><br><br>

<?php
if(isset($_POST['Submit'])){
	include_once("connectdb.php");
	$rname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];

	$sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}','{$ext}','{$rname}')";
	mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลไม่ได้");
    $pid = mysqli_insert_id($conn);
    copy($_FILES['pimage']['tmp_name'],"images/".$pid.".".$ext);
}
?>

<table border="1">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM `provinces);
while($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['p_id'];?></td>
        <td><?php echo $data['p_name'];?></td>
        <td><img src="image/<?php echo $data['p_id'];?>.<?php echo $data['p-ext'];?>"width="20"></td>
        <td width="80" align="center"><a href="delete_regions.php?id=<?php echo $data['i_id'] ; ?>" onClick="return confirm('ยืนยันการลบ?')"><img src="image/1.jpg" width="20"></td>
    </tr>
<?php } ?>
</table>

</body>
</html>
