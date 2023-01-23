<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <title>Add Emplyee</title>
</head>
<body>
<div class="container">
<table class="table table-borderless">
<form method="POST">
<td style="text-align:center" >First name</td><td style="text-align:center"><input placeholder="First name" type="text" name="nom" id="" class="form-control" required></tr>
<tr><td style="text-align:center" >Surname</td><td><input type="text" name="prenom" id="" class="form-control" placeholder="Surname" required></td>
<tr><td style="text-align:center" >Post</td><td><input type="text" name="post" id="" class="form-control" placeholder="Post" required></td></tr>
<tr><td style="text-align:center">Hiredate</td><td><input type="date" name="date" id="" class="form-control" required></td></tr>
<tr><td style="text-align:center" >E-mail</td><td><input type="email" name="mail" id="" class="form-control" placeholder="E-mail" required></td></tr>
<tr><td style="text-align:center" >Phone</td><td><input type="number" name="tele" id="" class="form-control" placeholder="Phond" required></td></tr>
<tr><td style="text-align:center" >Address</td><td><input type="text" name="adrs" id="" class="form-control" placeholder="Address" required></td></tr>
<tr>
    <!-- <a href="#" role="button" class="outline">Submit</a> -->
    <td style="text-align:center" colspan="2"><input type="submit" name="ok" value="valide" class="outline"></td></tr>
</form>
</table>
</div>
<?php
if (isset($_POST["ok"])) {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['post']) && isset($_POST['date']) && isset($_POST['mail']) && isset($_POST['tele']) && isset($_POST['adrs'])) {
    
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $post=$_POST['post'];
        $date=$_POST['date'];
        $mail=$_POST['mail'];
        $tele=$_POST['tele'];
        $adrs=$_POST['adrs'];
        
        
        $pdo = new PDO('mysql:host=localhost;dbname=emp_db','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sel=$pdo->prepare('SELECT email FROM employees WHERE email = ?');
        $sel->execute([$mail]);
        $count = $sel->rowCount();

        if ($count == 0) {
            $insert = "INSERT INTO employees VALUES (NULL,'$nom', '$prenom', '$post','$date','$mail','$tele','$adrs')";
            $pdo->exec($insert);
            // echo" row added successfully ";
            header('Location: emp.php');
            exit;
        }
        else{
            echo'something wrong';
        }
    }
}
?>
</body>
</html>