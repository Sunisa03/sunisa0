<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sunisa</title>
</head>

<body>
<h1>สุนิสา จันทัน(เนย) - โปรแกรมสูตรคูณ</h1>

<form method = "post" action = "">
    แม่สูตรคูณ <input type = "number" min ="2" max = "1000" name = "a" autofocus require>
    <button type = "submit" name = "Submit">OK</button>
</form>
<hr>
<?php
if (isset($_POST['Submit'])){
    $x = $_POST['a'];
    for($a=1 ; $a<=12 ; $a++){
        $i = $x * $a ;
        echo "{$x} x {$a} = {$i}<br>";
    }
}
?>

</body>
</html>
