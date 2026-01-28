<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunisa</title>
</head>

<body>
<h1>ฟอร์มรับข้อมูล - สุนิสา จันทัน(เนย)</h1>

<form method="post" action="">
ชื่อ-สกุล <input type="text" name="fullname" autofocus required>*<br>
เบอร์โทร <input type="text" name="phone" required>*<br>
ส่วนสูง <input type="number" name="height" min="50" max="220" required> ซม.*<br>

ที่อยู่ <br><textarea name="address" cols="40" rows="4"></textarea><br>

วัน/เดือน/ปีเกิด <input type="date" name="birthday"><br>
สีที่ชอบ <input type="color" name="color"><br>

สาขาวิชา
<select name="major">
	<option value="การบัญชี">การบัญชี</option>
    <option value="การตลาด">การตลาด</option>
    <option value="การจัดการ">การจัดการ</option>
    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
</select>
<br><br>
<!--</h1><input type="submit" name="Submit" value="สมัครสมาชิก">-->
<button type="submit" name="Submit">สมัครสมาชิก</button>
<button type="reset">ยกเลิก</button>
<button type="button" onClick="window.location='https://www.youtube.com/watch?v=4pqAFO5I-zY'">ไม่อยากให้เป็นเขาเลย</button>
<button type="button" onDblClick="alert('Hiii');">Hello</button>
<button type="button" onClick="window.print();"ิ>พิมพ์</button>

</form>
<br>

<?php
if (isset($_POST['Submit'])) {
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$height = $_POST['height'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$color = $_POST['color'];
	$major = $_POST['major'];
	
	echo "ชื่อ-สกุล : ".$fullname."<br>";
	echo "เบอร์โทร : ".$phone."<br>";
	echo "ส่วนสูง : ".$height." ซม.<br>";
	echo "ที่อยู่ : ".$address."<br>";
	echo "วัน/เดือน/ปีเกิด : ".$birthday."<br>";
	echo "สีที่ชอบ : <div style='background-color:{$color}; width:300px'>".$color."</div>";
	echo "สาขาวิชา : ".$major."<br>";
	
}
?>

</body>
</html>
