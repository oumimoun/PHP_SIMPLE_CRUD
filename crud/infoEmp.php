<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <title>user</title>
</head>
<body>
    <?php
    $pdo = new PDO(
        'mysql:host=localhost;dbname=emp_db',
        'root',
        ''
        );
        if (isset($_GET['ide'])) {
            $id=$_GET['ide'];
            $sel = "SELECT * FROM employees WHERE idEmp=$id";
            $res = $pdo->query($sel);
            $tab = $res->fetch();
    ?>
<div class="container">
<table class="table table-borderless">
<tr><td style="text-align:center">First name</td><td style="text-align:center"><?=$tab['firstName']?></td></tr>
<tr><td style="text-align:center">Surname</td><td style="text-align:center"><?=$tab['surName']?></td></tr>
<tr><td style="text-align:center">Post</td><td style="text-align:center"><?=$tab['post']?></td></tr>
<tr><td style="text-align:center">E-mail</td><td style="text-align:center"><?=$tab['email']?></td></tr>
<tr><td style="text-align:center">Hiredate</td><td style="text-align:center"><?=$tab['hireDate']?></td></tr>
<tr><td style="text-align:center">Phone number</td><td style="text-align:center"><?=$tab['tele']?></td></tr>
<tr><td style="text-align:center">address</address></td><td style="text-align:center"><?=$tab['address']?></td></tr>
</table></div>
<?php
}
?>
</body>
</html>