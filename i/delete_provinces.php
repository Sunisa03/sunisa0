<meta charset="utf-8">
<?php
include_once("connectdb.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $ext = $_GET['ext']; // รับค่านามสกุลไฟล์มาด้วยเพื่อลบรูป

    // 1. ลบข้อมูลจากฐานข้อมูล
    $sql_del = "DELETE FROM provinces WHERE p_id = '{$id}'";
    mysqli_query($conn, $sql_del) or die ("ลบข้อมูลไม่ได้: " . mysqli_error($conn));

    // 2. ลบไฟล์รูปภาพออกจากโฟลเดอร์ images (ถ้ามีไฟล์)
    if($ext != ""){
        $file_path = "images/" . $id . "." . $ext;
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }

    // ลบเสร็จแล้วเด้งกลับไปหน้าหลัก
    echo "<script>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='b.php';"; // ถ้าหน้าหลักคุณชื่ออื่น ให้แก้ตรงนี้
    echo "</script>";
} else {
    // ถ้าไม่มีการส่ง ID มา
    echo "<script>window.location='b.php';</script>";
}
?>