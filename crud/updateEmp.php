<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css">
    <title>Update Employe</title>
</head>
<body>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=emp_db','root','');

    if (isset($_GET['ide'])) {
        $id=$_GET['ide'];
        $select = $pdo->prepare("SELECT * FROM employees WHERE idEmp = ? LIMIT 1;");
        $select->execute([$id]);
        $row = $select->fetch(PDO::FETCH_ASSOC);
        // $name = $row['name'];
    
    }

?>
<div class="container">
<table class="table table-borderless">
<form method="POST">
<input type="hidden" name='id' value = "<?= $id?>">
<tr><td style="text-align:center">First name</td><td><input type="text" name="nom" value="<?=$row['firstName']?>" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center">Surname</td><td><input type="text" name="prenom" value="<?=$row['surName']?>" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center">Post</td><td><input type="text" name="post" value="<?=$row['post']?>" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center">Hiredate</td><td><input type="date" name="date" value="<?=$row['hireDate']?>" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center">E-mail</td><td><input type="email" name="mail" value="<?=$row['email']?>" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center">Phone</td><td><input type="number" name="tele" value="<?=$row['tele']?>" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center">Address</td><td><input type="text" name="adrs" value="<?=$row['address']?>" id="" class="form-control" required></td></tr>
<tr><td colspan="2"><input type="submit" name="ok" value="valide" class="outline"></td></tr>
</form>
</table></div>
<?php
if (isset($_POST['ok'])) {

if (isset($_POST['id'] , $_POST['nom'] , $_POST['prenom'] , $_POST['post'] , $_POST['date'] , $_POST['mail'] , $_POST['tele'] , $_POST['adrs'])) {
    echo 'set';
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $post=$_POST['post'];
    $date=$_POST['date'];
    $mail=$_POST['mail'];
    $tele=$_POST['tele'];
    $adrs=$_POST['adrs'];
    
    // $score = 453;
    // $user_id = 37841;

    $update = $pdo->prepare("UPDATE employees SET firstName = ? , surName = ? , post = ? , hireDate = ? , email = ? , tele = ? , address = ? WHERE idEmp = ? LIMIT 1;");
    $update->execute([$nom, $prenom, $post, $date, $mail, $tele, $adrs, $id]);
    

    header('Location: emp.php');
    exit;
}
}
?>


</body>
</html>