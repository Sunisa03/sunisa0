<?php
include_once("connectdb.php");

// ส่วนบันทึกข้อมูล (อยู่บนสุดเพื่อให้บันทึกเสร็จแล้วแสดงผลทันที)
if(isset($_POST['Submit'])){
    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // บันทึกลงฐานข้อมูล
    $sql_insert = "INSERT INTO provinces (p_id, p_name, p_ext, r_id) VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql_insert) or die ("เพิ่มข้อมูลไม่ได้: " . mysqli_error($conn));
    
    // ดึง ID ล่าสุดเพื่อมาตั้งชื่อรูป
    $pid = mysqli_insert_id($conn);
    
    // อัพโหลดรูปภาพไปที่โฟลเดอร์ images
    move_uploaded_file($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sunisa</title>
</head>
<body>

<h1> งานi-- สุนิสา จันทัน (เนย) </h1>

<form method="post" action="" enctype="multipart/form-data" >
    ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
    รูปภาพ <input type="file" name="pimage" required> <br>
    
    ภาค
    <select name="rid">
    <?php
    $sql_region = "SELECT * FROM Regions";
    $rs_region = mysqli_query($conn, $sql_region);
    while ($data_region = mysqli_fetch_array($rs_region)){
    ?>   
        <option value="<?php echo $data_region['r_id'] ; ?>"><?php echo $data_region['r_name'] ;?></option>
    <?php } ?>
    </select>
    <br><br>
    
    <button type="submit" name="Submit">บันทึก</button> 
</form>
<br><hr><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
<?php
// แก้ไข SQL: เว้นวรรคตรง provinces AS p
$sql_show = "SELECT * FROM provinces AS p INNER JOIN regions AS r ON p.r_id = r.r_id ORDER BY p.p_id ASC";
$rs_show = mysqli_query($conn, $sql_show);

while ($data = mysqli_fetch_array($rs_show)){
?>   
    <tr>
        <td align="center"><?php echo $data['p_id'] ; ?></td>
        <td><?php echo $data['p_name'] ;?></td>
        <td><?php echo $data['r_name'] ;?></td>
        
        <td align="center">
            <?php if($data['p_ext'] != "") { ?>
                <img src="images/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="100">
            <?php } else { echo "ไม่มีรูป"; } ?>
        </td>
        
        <td align="center">
            <a href="delete_provinces.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext']; ?>" onClick="return confirm('ยืนยันการลบข้อมูลนี้?');">
                <img src="images/delete.jpg" width="30">
                
                </a>
        </td>
    </tr>
<?php } ?>
</table>

</body>
</html>
<?php mysqli_close($conn); ?>