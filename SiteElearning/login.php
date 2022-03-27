<?php
ob_start();
session_start();
require_once("inc/db.php");
if (isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $get_user = "SELECT * FROM users where user_name = '$username' AND user_pass = '$password'";
    $run_user = mysqli_query($con,$get_user);

    $check = mysqli_num_rows($run_user);
    if($check == 1){
        $_SESSION['user_name'] = $username;
        echo "<script>window.open('index.php', '_self')</script>";
    } else{
        echo "<script>alert('Le mot de passe ou email est invalide')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo chat.ico" />
    <title>Afpa Academie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous"  />


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400">
    <style>
        body {
            font-family: "Raleway", sans serif;
        }
    </style>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  </head>

  <body>

  
        <div class="container-fluid"> 
            <div class="d-flex justify-content-center mt-5">
            <a href="../index.php" class="btn btn-danger rounded-circle"><i class="fa fa-home"></i> Accueil</a>
            </div>
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="" class="form-control">
                            <h2 class="text-danger text-center">Connectez-Vous (Administrateur)</h2><hr>
                            <label class="text-danger">Pseudo</label>
                            <input type="text" class="form-control" name="username" placeholder="pseudo" required /><br>

                            <label class="text-danger">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="mot de passe" required /><br>
                            <button class="btn btn-danger w-100 " type="submit" name="submit">Envoyer</button>
                        </form>
                    </div>
                <div class="col-md-4"></div>
            </div>
        </div>
  </body>
</html>