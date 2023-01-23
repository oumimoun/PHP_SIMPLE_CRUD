<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <title>Employe management</title>
</head>
<body>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=emp_db','root','');

    if (isset($_GET['ide'])) {
        $id=$_GET['ide'];
        $delete = $pdo->prepare("DELETE FROM employees WHERE idEmp = ? LIMIT 1;");
        $delete->execute([$id]);
        
    }
?>

<div class='container'>
<table class="table table-borderless">
    <tr><td style="text-align:center" colspan='4'>List of employees</td>
    <td style="text-align:center">
    <a href="addEmp.php">
    <span class="">Add</span>
    </a>
    </td></tr>
    <tr><td style="text-align:center">First name</td><td style="text-align:center">Surname</td><td style="text-align:center">Post</td><td style="text-align:center">E-mail</td><td style="text-align:center">Action</td></tr>
    <?php
        $sql = "SELECT * FROM employees ";
        $res = $pdo ->query($sql);
        while ($tab = $res->fetch()) {
            ?>
            <tr><td style="text-align:center"><?=$tab['firstName']?></td><td><?=$tab['surName']?></td>
            <td style="text-align:center"><?=$tab['post']?></td>
            <td style="text-align:center"><?=$tab['email']?></td>
            <td style="text-align:center">
            <a href="infoEmp.php?ide=<?=$tab['idEmp']?>" role="button" class="outline">Info</a>
            <!-- <img src="https://img.icons8.com/ios-glyphs/30/null/user--v1.png"/></a> -->
            <a href="updateEmp.php?ide=<?=$tab['idEmp']?>" role="button" class="contrast outline">Update</a>
            <!-- <img src="https://img.icons8.com/ios-glyphs/30/null/edit--v1.png"/></a> -->
            <a href="emp.php?ide=<?=$tab['idEmp']?>" role="button" class="secondary outline">Delete</a>
            <!-- <img src="https://img.icons8.com/ios-glyphs/30/null/delete-sign.png"/></a> -->
            </td></tr>
<?php
}
?>    
</table>
</div>
</body>
</html>