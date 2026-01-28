<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunisa</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* สไตล์เล็กน้อยเพื่อให้กราฟแสดงผลสวยงามขึ้น */
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .chart-container {
        width: 80%; /* หรือปรับขนาดตามต้องการ */
        margin: 20px auto; /* จัดกึ่งกลาง */
        display: flex; /* เพื่อจัดเรียงกราฟข้างกัน */
        justify-content: space-around; /* กระจายช่องไฟ */
        flex-wrap: wrap; /* ให้กราฟขึ้นบรรทัดใหม่ได้ถ้าหน้าจอเล็ก */
    }
    .chart-box {
        width: 45%; /* ให้แต่ละกราฟกินพื้นที่ 45% เพื่อให้มีช่องว่างตรงกลาง */
        min-width: 300px; /* ขนาดขั้นต่ำของกราฟ */
        margin-bottom: 20px;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
<h1>สุนิสา จันทัน (เนย) 66010914020</h1>

<table border="1">
<tr>
    <th>ประเทศ</th>
    <th>ยอดขาย</th>
</tr>
<?php
include_once("connectdb.php"); // ตรวจสอบว่าไฟล์นี้เชื่อมต่อฐานข้อมูลได้ถูกต้อง

$sql = "SELECT `p_country`, SUM(`p_amount`) AS total FROM `popsupermarket` GROUP BY `p_country`;";
$rs = mysqli_query($conn, $sql);

// สร้าง Arrays สำหรับเก็บข้อมูลไปแสดงใน Chart.js
$countries = [];
$totals = [];
$table_rows = ""; // เก็บ HTML ของตารางไว้ในตัวแปร

while ($data = mysqli_fetch_array($rs)) {
    $country = $data['p_country'];
    $total = $data['total'];

    // เก็บข้อมูลลง Array สำหรับ Chart.js
    $countries[] = $country;
    $totals[] = $total;

    // สร้างแถวตาราง HTML
    $table_rows .= "<tr><td>" . htmlspecialchars($country) . "</td><td>" . number_format($total) . "</td></tr>";
}
mysqli_close($conn);

echo $table_rows; // แสดงตารางที่สร้างไว้
?>
</table>

<div class="chart-container">
    <div class="chart-box">
        <h2>กราฟยอดขายแยกตามประเทศ (Bar Chart)</h2>
        <canvas id="barChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>สัดส่วนยอดขายแยกตามประเทศ (Pie Chart)</h2>
        <canvas id="pieChart"></canvas>
    </div>
</div>

<script>
    // 2. รับข้อมูลจาก PHP ที่เราสร้างไว้ในรูปแบบ JSON
    const countries = <?php echo json_encode($countries); ?>;
    const totals = <?php echo json_encode($totals); ?>;

    // สีสำหรับกราฟ (สามารถเพิ่มได้ตามจำนวนประเทศ)
    const backgroundColors = [
        'rgba(255, 99, 132, 0.7)', // แดง
        'rgba(54, 162, 235, 0.7)', // น้ำเงิน
        'rgba(255, 206, 86, 0.7)', // เหลือง
        'rgba(75, 192, 192, 0.7)', // เขียว
        'rgba(153, 102, 255, 0.7)', // ม่วง
        'rgba(255, 159, 64, 0.7)', // ส้ม
        'rgba(199, 199, 199, 0.7)', // เทา
        'rgba(83, 102, 127, 0.7)', // น้ำเงินเข้ม
        'rgba(78, 205, 196, 0.7)', // เขียวมิ้นท์
        'rgba(255, 138, 128, 0.7)'  // ชมพูอ่อน
    ];
    const borderColors = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(199, 199, 199, 1)',
        'rgba(83, 102, 127, 1)',
        'rgba(78, 205, 196, 1)',
        'rgba(255, 138, 128, 1)'
    ];

    // 3. สร้าง Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: countries,
            datasets: [{
                label: 'ยอดขายรวม',
                data: totals,
                backgroundColor: backgroundColors.slice(0, countries.length), // ใช้สีตามจำนวนประเทศ
                borderColor: borderColors.slice(0, countries.length),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // ไม่แสดง legend สำหรับ Bar chart ถ้ามี dataset เดียว
                },
                title: {
                    display: true,
                    text: 'ยอดขายรวมแต่ละประเทศ'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'ยอดขาย'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'ประเทศ'
                    }
                }
            }
        }
    });

    // 4. สร้าง Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: countries,
            datasets: [{
                label: 'สัดส่วนยอดขาย',
                data: totals,
                backgroundColor: backgroundColors.slice(0, countries.length),
                borderColor: borderColors.slice(0, countries.length),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // แสดง legend ด้านบน
                },
                title: {
                    display: true,
                    text: 'สัดส่วนยอดขายตามประเทศ'
                }
            }
        }
    });
</script>

</body>
</html>