<?php
include_once("connectdb.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunissa</title>
</head>

<body>

<h1>งาน i -- สุนิสา จันทัน (เนย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด 
    <input type="text" name="pname" autofocus required><br><br>

    รูปภาพ 
    <input type="file" name="pimage" required> <br><br>
    
    ภาค
    <select name="rid" required>
        <?php
        $sql3 = "SELECT * FROM regions";
        $rs3 = mysqli_query($conn, $sql3);
        while ($data3 = mysqli_fetch_array($rs3)){
        ?>
            <option value="<?php echo $data3['r_id']; ?>">
                <?php echo $data3['r_name']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>
    
    <button type="submit" name="Submit">บันทึก</button>
</form>

<hr>

<?php
// ================== INSERT ==================
if(isset($_POST['Submit'])){

    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $rid   = $_POST['rid'];

    // ดึงนามสกุลไฟล์
    $ext = strtolower(pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION));

    // ตรวจสอบไฟล์ภาพ
    $allowed = array("jpg","jpeg","png","gif");

    if(in_array($ext,$allowed)){

        $sql2 = "INSERT INTO provinces (p_id, p_name, p_ext, r_id)
                 VALUES (NULL, '$pname', '$ext', '$rid')";

        if(mysqli_query($conn, $sql2)){

            $pid = mysqli_insert_id($conn);

            // สร้างโฟลเดอร์ images ถ้ายังไม่มี
            if(!is_dir("images")){
                mkdir("images");
            }

            move_uploaded_file($_FILES['pimage']['tmp_name'],
                               "images/".$pid.".".$ext);

            echo "<p style='color:green;'>เพิ่มข้อมูลสำเร็จ</p>";

        }else{
            echo "<p style='color:red;'>Error: ".mysqli_error($conn)."</p>";
        }

    }else{
        echo "<p style='color:red;'>อนุญาตเฉพาะไฟล์ jpg, jpeg, png, gif</p>";
    }
}
?>

<br>

<!-- ================== แสดงข้อมูล ================== -->

<table border="1" cellpadding="5">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>

<?php
$sql = "SELECT * FROM provinces AS p 
        INNER JOIN regions AS r 
        ON p.r_id = r.r_id
        ORDER BY p.p_id DESC";

$rs = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($rs)){
?>

    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td>
            <img src="images/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="120">
        </td>
        <td align="center">
            <a href="delete_provinces.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext']; ?>" 
               onClick="return confirm('ยืนยันการลบ');">
               ลบ
            </a>
        </td>
    </tr>

<?php } ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
