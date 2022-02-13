<?php

$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    // sql query
    $query = "SELECT userID, firstName, lastName, email, password, profileImage FROM user WHERE email=?";
    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);

    // Lie les paramètres
    mysqli_stmt_bind_param($q, 's', $email);
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)){
        // verifie le mot de passe
        if(password_verify($password, $row['password'])){
            header("location: index.php");
            exit();
        }
    }else{
        print "Tu es pas un membre, inscris toi!";
    }

}else{
    echo "Met ton mot de passe et mail pour te connecter!";
}
