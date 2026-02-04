<?php
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunisa</title>
</head>

<body>
<h1>เข้าสู่ระบบหลังบ้าน - สุนิสา จันทัน (เนย)</h1>

<form method="post" action="">
Username <input type="text" name="auser" autofocus required> <br>
Password <input type="password" name="apwd" required> <br>
<button type="submit" name="Submit">LOGIN</button>
</form>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");
    $sql = "SELECT * FORM admin WHERE a_username='{$_POST['auser']}'AND a_password='{$_POST['apwd']}'LIMIT 1";
    $rs = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($rs);
    <?php
    session_start();
    ?>
    <!doctype html>
    <html lang="th">
    <head>
    <meta charset="utf-8">
    <title>เข้าสู่ระบบหลังบ้าน</title>
    
    <style>
        body{
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Segoe UI', Tahoma, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .login-box{
            background: #fff;
            width: 360px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
    
        .login-box h1{
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }
    
        .login-box p{
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }
    
        .login-box label{
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
    
        .login-box input{
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
    
        .login-box button{
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #667eea;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
    
        .login-box button:hover{
            background: #5a67d8;
        }
    
        .footer{
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
    </head>
    
    <body>
    
    <div class="login-box">
        <h1>เข้าสู่ระบบหลังบ้าน</h1>
        <p>สุนิสา จันทัน (เนย)</p>
    
        <form method="post">
            <label>Username</label>
            <input type="text" name="auser" required autofocus>
    
            <label>Password</label>
            <input type="password" name="apwd" required>
    
            <button type="submit" name="Submit">LOGIN</button>
        </form>
    
        <div class="footer">
            © 2026 Admin Panel
        </div>
    </div>
    
    <?php
    if(isset($_POST['Submit'])){
        include_once("connectdb.php");
    
        $user = mysqli_real_escape_string($conn,$_POST['auser']);
        $pwd  = mysqli_real_escape_string($conn,$_POST['apwd']);
    
        $sql = "SELECT * FROM admin 
                WHERE a_username='$user' 
                AND a_password='$pwd' 
                LIMIT 1";
    
        $rs = mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($rs)==1){
            $data = mysqli_fetch_assoc($rs);
            $_SESSION['aid']   = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            echo "<script>window.location='index2.php';</script>";
        }else{
            echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
        }
    }
    ?>
    
    </body>
    </html>
    
    if($num == 1){
        $data = mysqli_num_rows($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];
        echo "<script>";
        echo "window.location='index2.php';";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('Username หรือ Password ไม่ถูกต้อง');";
        echo "</script>";
    }

}
?>

</body>
</html>