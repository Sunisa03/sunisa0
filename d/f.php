<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ผลการสมัครงาน - บริษัท เทคโนโลยีล้ำยุค จำกัด</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    body {
        background-color: #f8f9fa; /* Light Gray */
    }
    .success-card-header {
        background-color: #198754; /* Success green */
        color: white;
    }
</style>

</head>

<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <header class="text-center mb-5">
                <h1 class="text-primary">บริษัท เทคโนโลยีล้ำยุค จำกัด</h1>
                <h2 class="text-success">ผลการส่งใบสมัคร</h2> 
            </header>
            
            <?php
            // ตรวจสอบว่ามีการส่งข้อมูลผ่าน POST มาจากฟอร์มหรือไม่
            if (isset($_POST['Submit'])) {
                
                // ดึงข้อมูลจากฟอร์มและกำหนดตัวแปร (ใช้ ?? เพื่อกำหนดค่าเริ่มต้นเผื่อกรณีไม่มีค่าส่งมา)
                $position = $_POST['position'] ?? 'ไม่ได้ระบุ';
                $prefix = $_POST['prefix'] ?? 'N/A';
                $fullname = $_POST['fullname'] ?? 'N/A';
                $dob = $_POST['dob'] ?? '';
                $education = $_POST['education'] ?? 'ไม่ได้ระบุ';
                $skills = $_POST['skills'] ?? '';
                $experience = $_POST['experience'] ?? '';
                
                // ฟังก์ชันสำหรับแปลงวันที่จาก YYYY-MM-DD เป็นรูปแบบที่อ่านง่าย (วัน/เดือน/ปี)
                function format_date_th($date_str) {
                    if ($date_str == '') return '-';
                    try {
                        $date = new DateTime($date_str);
                        return $date->format('d/m/Y');
                    } catch (Exception $e) {
                        return 'วันที่ไม่ถูกต้อง';
                    }
                }
                
                // แสดงผลลัพธ์
                echo '<div class="card shadow-lg border-success">';
                echo '<div class="card-header success-card-header">';
                echo '<h5>🎉 ใบสมัครของคุณได้รับการบันทึกแล้ว</h5>';
                echo '</div>';
                echo '<div class="card-body">';
                
                echo '<p class="lead"><strong>ผู้สมัคร:</strong> '.htmlspecialchars($prefix).' '.htmlspecialchars($fullname).'</p>';
                echo '<p class="lead"><strong>ตำแหน่งที่สมัคร:</strong> <span class="text-primary fw-bold">'.htmlspecialchars($position).'</span></p>';
                
                echo '<hr>';
                
                echo '<h6>รายละเอียดที่ส่งมา:</h6>';
                echo '<dl class="row">';
                
                // ข้อมูลส่วนตัว
                echo '<dt class="col-sm-4">วันเดือนปีเกิด:</dt>';
                echo '<dd class="col-sm-8">'.format_date_th($dob).'</dd>';
                
                // การศึกษาและความสามารถ
                echo '<dt class="col-sm-4">ระดับการศึกษาสูงสุด:</dt>';
                echo '<dd class="col-sm-8">'.htmlspecialchars($education).'</dd>';
                
                echo '<dt class="col-sm-4">ความสามารถพิเศษ:</dt>';
                echo '<dd class="col-sm-8">'.(empty($skills) ? '-' : htmlspecialchars($skills)).'</dd>';
                
                // ประสบการณ์
                echo '<dt class="col-sm-4">ประสบการณ์ทำงาน:</dt>';
                echo '<dd class="col-sm-8">'.(empty($experience) ? '-' : nl2br(htmlspecialchars($experience))).'</dd>';
                
                echo '</dl>';
                
                echo '</div>';
                echo '<div class="card-footer text-muted">';
                echo 'ขอบคุณที่ให้ความสนใจ บริษัท เทคโนโลยีล้ำยุค จำกัด จะติดต่อกลับไปเร็วที่สุด';
                echo '</div>';
                echo '</div>';
            } else {
                // กรณีเข้าถึงไฟล์ f.php โดยตรงโดยไม่ได้ส่งข้อมูลจากฟอร์ม
                echo '<div class="alert alert-warning text-center" role="alert">';
                echo 'ไม่พบข้อมูลการสมัคร กรุณาเข้าสู่ <a href="e.php" class="alert-link">หน้าฟอร์มรับสมัครงาน</a> เพื่อเริ่มต้น';
                echo '</div>';
            }
            ?>

            <div class="text-center mt-4">
                <a href="e.php" class="btn btn-outline-primary">กลับไปหน้าฟอร์ม</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>