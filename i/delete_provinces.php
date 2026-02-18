<meta charset="utf-8">
<?php
include_once("connectdb.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $ext = $_GET['ext']; 

    $sql_del = "DELETE FROM provinces WHERE p_id = '{$id}'";
    mysqli_query($conn, $sql_del) or die ("ลบข้อมูลไม่ได้: " . mysqli_error($conn));

    if($ext != ""){
        $file_path = "images/" . $id . "." . $ext;
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }

    echo "<script>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='b.php';"; 
    echo "</script>";
} else {
    echo "<script>window.location='b.php';</script>";
}
?>