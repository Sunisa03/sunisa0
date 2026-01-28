<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sunisa - Supermarket Data</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #fff5f7; /* พื้นหลังชมพูอ่อนมาก */
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 182, 193, 0.3);
        }
        .card-header {
            background-color: #ffc0cb !important; /* ชมพูพาสเทล */
            color: #d63384;
            border-radius: 15px 15px 0 0 !important;
            font-weight: bold;
        }
        .table thead {
            background-color: #ffe4e1; /* Misty Rose */
        }
        .btn-sweet {
            background-color: #ff85a2;
            color: white;
            border: none;
        }
        .btn-sweet:hover {
            background-color: #ff5c8d;
            color: white;
        }
        .total-row {
            background-color: #fff0f5;
            font-weight: bold;
            color: #d63384;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-5 text-pink" style="color: #ff69b4;">สุนิสา จันทัน (เนย)</h1>
        <p class="text-muted">66010914020</p>
    </div>

    <div class="card">
        <div class="card-header p-3">
            <i class="bi bi-cart-fill"></i> ระบบจัดการข้อมูล Pop Supermarket
        </div>
        <div class="card-body">
            <form method="post" action="" class="mb-4 row g-2">
                <div class="col-auto">
                    <input type="text" name="a" class="form-control" placeholder="ค้นหาข้อมูล..." autofocus>
                </div>
                <div class="col-auto">
                    <button type="submit" name="Submit" class="btn btn-sweet px-4">ค้นหา</button>
                </div>
            </form>

            <div class="table-responsive">
                <table id="myTable" class="table table-hover border-light">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th>วันที่</th>
                            <th>ประเทศ</th>
                            <th class="text-end">จำนวนเงิน</th>
                            <th class="text-center">รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once("connectdb.php");
                        @$kw = $_POST['a'];
                        $sql = "SELECT * FROM `popsupermarket` WHERE p_country LIKE '%{$kw}%' OR p_product_name LIKE '%{$kw}%' OR p_category LIKE '%{$kw}%'";
                        $rs = mysqli_query($conn,$sql);
                        $total = 0;
                        while ($data = mysqli_fetch_array($rs)) {
                            $total += $data['p_amount'];
                        ?>
                        <tr>
                            <td><?php echo $data['p_order_id'];?></td>
                            <td><strong><?php echo $data['p_product_name'];?></strong></td>
                            <td><span class="badge bg-info text-dark"><?php echo $data['p_category'];?></span></td>
                            <td><?php echo date('d/m/Y', strtotime($data['p_date']));?></td>
                            <td><?php echo $data['p_country'];?></td>
                            <td align="right" class="text-primary"><?php echo number_format($data['p_amount'],0);?></td>
                            <td align="center">
                                <img src="img/<?php echo $data['p_product_name'];?>.jpg" 
                                     class="rounded shadow-sm" 
                                     style="width: 50px; height: 50px; object-fit: cover;"
                                     onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td colspan="5" class="text-end">ยอดรวมทั้งสิ้น:</td>
                            <td align="right"><?php echo number_format($total,0);?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json" // เมนูภาษาไทย
            },
            "pageLength": 10,
            "ordering": true
        });
    });
</script>

</body>
</html>