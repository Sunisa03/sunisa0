<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunisa</title>
</head>

<body>
<h1>สุนิสา จันทัน(เนย)</h1>

<form method = "post" action = "">
    กรอกตัวเลข <input type = "number" name = "a" autofocus require>
    <button type = "submit" name = "Submit">OK</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])){
    #echo $_POST['a'];
    $gender = $_POST['a'];
    if($gender == 1){
        echo "เพศชาย";
    }else if ($gender == 2){
        echo "เพศหญิง";
    }else if ($gender == 3){
        echo "เพศทางเลือก";
    }else{
        echo "อื่นๆ";
    }
}
?>

</body>
</html>
