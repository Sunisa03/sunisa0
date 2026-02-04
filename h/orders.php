<?php
    session_start();
    if (empty($_SESSION['aid'])){
        echo "Access Denied";
        echo "<meta http-equiv='refresh' content='3; url=index.php'";
        exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunisa</title>
</head>

<body>
<h1>หน้าหลักแอดมิน - สุนิสา จันทัน (เนย)</h1>

<?php each "แอดมิน:". $_SESSION['aname']; ?> <br>

<ul>
    <a hreh="products.php"><li>จัดการสินค้า</li></a>
    <a hreh="orders.php"><li>จัดการออเดอร์</li></a>
    <a hreh="customers.php"><li>จัดการลูกค้า</li></a>
    <a hreh="logout.php"><li>ออกจากระบบ</li></a>

</ul>
</body>
</html>