<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Sunisa</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #1f1c2c, #928dab);
        min-height: 100vh;
        font-family: "Prompt", sans-serif;
        color: #fff;
    }
    .form-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.5);
    }
    h1 {
        text-shadow: 0 0 10px rgba(255,255,255,0.7);
    }
    .color-box {
        width: 100px;
        height: 30px;
        border-radius: 5px;
    }
</style>

</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h1 class="text-center mb-4">ฟอร์มรับข้อมูล - ChatGPT</h1>

            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label">ชื่อ-สกุล</label>
                    <input type="text" name="fullname" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">เบอร์โทร</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ส่วนสูง (ซม.)</label>
                    <input type="number" name="height" min="50" max="220" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ที่อยู่</label>
                    <textarea name="address" cols="40" rows="4" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">วัน/เดือน/ปีเกิด</label>
                    <input type="date" name="birthday" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="color" class="form-control form-control-color">
                </div>

                <div class="mb-3">
                    <label class="form-label">สาขาวิชา</label>
                    <select name="major" class="form-select">
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" name="Submit" class="btn btn-success px-4">สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-danger px-4">ยกเลิก</button>
                    <button type="button" class="btn btn-warning px-4" onClick="window.location='https://www.youtube.com/watch?v=4pqAFO5I-zY'">ไม่อยากให้เป็นเขาเลย</button>
                    <button type="button" class="btn btn-info px-4" ondblclick="alert('Hiii');">Hello</button>
                    <button type="button" class="btn btn-secondary px-4" onClick="window.print();">พิมพ์</button>
                </div>
            </form>

            <hr class="my-4">

            <?php
            if (isset($_POST['Submit'])) {
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $height = $_POST['height'];
                $address = $_POST['address'];
                $birthday = $_POST['birthday'];
                $color = $_POST['color'];
                $major = $_POST['major'];
                
                echo "<div class='mt-4 p-3 bg-dark rounded'>";
                echo "ชื่อ-สกุล : <strong>".$fullname."</strong><br>";
                echo "เบอร์โทร : <strong>".$phone."</strong><br>";
                echo "ส่วนสูง : <strong>".$height." ซม.</strong><br>";
                echo "ที่อยู่ : <strong>".$address."</strong><br>";
                echo "วัน/เดือน/ปีเกิด : <strong>".$birthday."</strong><br>";
                echo "สีที่ชอบ : <div class='color-box mt-1' style='background-color:{$color};'></div> ".$color."<br>";
                echo "สาขาวิชา : <strong>".$major."</strong><br>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
