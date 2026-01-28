<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sunisa Sales Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #121212; color: #e0e0e0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 20px; }
        .container { max-width: 1000px; margin: auto; }
        .charts-wrapper { display: flex; gap: 20px; margin-bottom: 30px; flex-wrap: wrap; }
        .chart-container { flex: 1; min-width: 300px; background: #1e1e1e; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        table { width: 100%; border-collapse: collapse; background: #1e1e1e; border-radius: 10px; overflow: hidden; margin-top: 20px; }
        th, td { padding: 12px; text-align: center; border-bottom: 1px solid #333; }
        th { background-color: #330066; color: #fff; }
        h1 { text-align: center; color: #bb86fc; }
    </style>
</head>
<body>

<div class="container">
    <h1>สุนิสา จันทัน (เนย) 66010914020</h1>

    <div class="charts-wrapper">
        <div class="chart-container">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>

    <?php
    include_once("connectdb.php");
    $sql = "SELECT MONTH(p_date) AS Month, SUM(p_amount) AS Total_Sales FROM popsupermarket GROUP BY MONTH(p_date) ORDER BY Month;";
    $rs = mysqli_query($conn, $sql);
    
    $labels = [];
    $sales = [];
    $table_rows = "";

    while ($data = mysqli_fetch_array($rs)) {
        $labels[] = "เดือน " . $data['Month'];
        $sales[] = $data['Total_Sales'];
        $table_rows .= "<tr><td>{$data['Month']}</td><td>" . number_format($data['Total_Sales'], 2) . "</td></tr>";
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>เดือน</th>
                <th>ยอดขาย (บาท)</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $table_rows; ?>
        </tbody>
    </table>
</div>

<script>
    // ข้อมูลจาก PHP ส่งมายัง JavaScript
    const labels = <?php echo json_encode($labels); ?>;
    const dataSales = <?php echo json_encode($sales); ?>;

    const chartConfig = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { labels: { color: '#e0e0e0' } }
        }
    };

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายรายเดือน',
                data: dataSales,
                backgroundColor: 'rgba(187, 134, 252, 0.7)',
                borderColor: '#bb86fc',
                borderWidth: 1
            }]
        },
        options: chartConfig
    });

    // Doughnut Chart
    new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataSales,
                backgroundColor: [
                    '#03dac6', '#cf6679', '#3700b3', '#ffb74d', '#4fc3f7'
                ],
                borderWidth: 0
            }]
        },
        options: chartConfig
    });
</script>

</body>
</html>