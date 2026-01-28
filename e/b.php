<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ฟอร์มรับสมัครงาน - บริษัท เทคโนโลยีล้ำยุค จำกัด</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    body {
        background-color: #f8f9fa; /* Light Gray */
    }
    .card-header-primary {
        background-color: #0d6efd; /* Primary blue */
        color: white;
    }
    .required-star {
        color: #dc3545; /* Danger red */
    }
</style>

</head>

<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <header class="text-center mb-5">
                <h1 class="text-primary">บริษัท เทคโนโลยีล้ำยุค จำกัด</h1>
                <h2 class="text-primary">สุนิสา จันทัน (เนย)</h2> 
                <p class="lead text-secondary">ฟอร์มรับสมัครงานออนไลน์</p>
            </header>
            
            <div class="card shadow-lg">
                <div class="card-header card-header-primary">
                    <h5 class="mb-0">กรุณากรอกข้อมูลเพื่อสมัครงาน</h5>
                </div>
                
                <div class="card-body p-4">
                    <form method="post" action="">
                        
                        <div class="mb-4">
                            <label for="position" class="form-label fw-bold">1. ตำแหน่งที่ต้องการสมัคร <span class="required-star">*</span></label>
                            <select class="form-select" id="position" name="position" required>
                                <option value="" disabled selected>--- กรุณาเลือกตำแหน่งงาน ---</option>
                                <option value="Software Developer">วิศวกรซอฟต์แวร์</option>
                                <option value="Data Analyst">นักวิเคราะห์ข้อมูล</option>
                                <option value="Digital Marketing Specialist">ผู้เชี่ยวชาญการตลาดดิจิทัล</option>
                                <option value="HR Specialist">เจ้าหน้าที่บุคคล</option>
                            </select>
                        </div>

                        <h6 class="text-secondary border-bottom pb-2 mb-3">2. ข้อมูลส่วนตัว</h6>
                        <div class="row g-3 mb-4">
                            
                            <div class="col-md-2">
                                <label for="prefix" class="form-label">คำนำหน้าชื่อ <span class="required-star">*</span></label>
                                <select class="form-select" id="prefix" name="prefix" required>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="fullname" class="form-label">ชื่อ-สกุล <span class="required-star">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>

                            <div class="col-md-4">
                                <label for="dob" class="form-label">วัน/เดือน/ปีเกิด <span class="required-star">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                        </div>

                        <h6 class="text-secondary border-bottom pb-2 mb-3">3. การศึกษาและความสามารถ</h6>
                        <div class="row g-3 mb-4">
                            
                            <div class="col-md-6">
                                <label for="education" class="form-label">ระดับการศึกษาสูงสุด <span class="required-star">*</span></label>
                                <select class="form-select" id="education" name="education" required>
                                    <option value="" disabled selected>--- เลือกระดับการศึกษา ---</option>
                                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                                    <option value="ปริญญาโท">ปริญญาโท</option>
                                    <option value="ปวส.">ปวส.</option>
                                    <option value="มัธยมปลาย">มัธยมปลาย</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="skills" class="form-label">ความสามารถพิเศษ</label>
                                <input type="text" class="form-control" id="skills" name="skills" placeholder="เช่น ภาษาอังกฤษ, Python, Adobe Suite">
                            </div>
                        </div>

                        <h6 class="text-secondary border-bottom pb-2 mb-3">4. ประสบการณ์ทำงาน</h6>
                        <div class="mb-4">
                            <label for="experience" class="form-label">ประสบการณ์ทำงานโดยย่อ</label>
                            <textarea class="form-control" id="experience" name="experience" rows="5" placeholder="ระบุตำแหน่ง, บริษัท, ช่วงเวลา, หน้าที่ความรับผิดชอบ หรือระบุ 'ไม่มี'"></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" name="Submit" class="btn btn-primary btn-lg me-md-2">ส่งใบสมัคร</button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg">ยกเลิก/ล้างข้อมูล</button>
                        </div>
                        
                    </form>
                </div>
                
                <div class="card-footer text-end text-muted">
                    <small>*กรุณากรอกข้อมูลให้ครบถ้วนก่อนส่งใบสมัคร</small>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
             if (isset($_POST['Submit'])) {
                $position = $_POST['position'] ;
                $prefix = $_POST['prefix'] ;
                $fullname = $_POST['fullname'] ;
                $dob = $_POST['dob'] ;
                $education = $_POST['education'] ;
                $skills = $_POST['skills'] ;
                $experience = $_POST['experience'] ;
        
                include_once("connectdb.php");
        
                $sql = "INSERT INTO application (a_id, a_position, a_prefix, a_fullname, a_dob, a_education, a_skills, a_experience) VALUES (NULL, '{$position}', '{$prefix}', '{$fullname}', '{$dob}', '{$education}', '{$skills}', '{$experience}');";
                mysqli_query($conn, $sql) or die ("insert ไม่ได้");
                
                echo "<script>";
                echo "alert('บันทึกข้อมูลสำเสร็จ');";
                echo "</script>";
            }
            ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>