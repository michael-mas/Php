<?php
ob_start();
session_start();

//Si la variable session n'est pas trouvé
if(!isset($_SESSION['user_name'])){
    //redirection de l'utilisateur à la page de login

        header('location:login.php');
}

require_once('inc/top.php');
require_once('inc/db.php');

?>


<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12">
            <?php include('inc/navbar.php'); ?>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-3">
            <?php include('inc/sidebar.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <img src="images/banniere.png" alt="" class="img-fluid"  /><hr>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-primary">Ecrire message à la classe</h2><hr>
               

                <form  method="post" enctype="multipart/form-data">

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Classe</label>
                        <div class="col-sm-10">
                           <select name="class" class="form-control" required>
                                <option value="1">Classe 1</option>
                                <option value="2">Classe 2</option>
                                <option value="3">Classe 3</option>
                                <option value="4">Classe 4</option>
                                <option value="5">Classe 5</option>
                                <option value="6">Classe 6</option>
                                <option value="7">Classe 7</option>
                                <option value="8">Classe 8</option>
                                <option value="9">Classe 9</option>
                                <option value="10">Classe 10</option>
                           </select>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-2">
                    <label for="exampleFormControlTextarea1" class="form-label text-danger">Message à la classe</label>
                    </div>
                    <div class="col-10 mb-3">
                        
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                  

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn btn-outline-dark border-0 btn-primary w-100" name="submit" type="submit">Envoyer message</button>
                        </div>
                    </div>

                </form>
            </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row bg-dark mt-2">
            <?php include('inc/footer.php'); ?>
        </div>
    </div>
</div>

</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $class = $_POST['class']; 
        $message = $_POST['message']; 

        $idClass = "SELECT * FROM student WHERE class = '$class' ";
        $run_idClass = mysqli_query($con, $idClass);
        $row_idClass = mysqli_fetch_array($run_idClass);

       
        $studentClass = $row_idClass['id'];
    
        $insert_msgtoclasses = "INSERT INTO msgtoclasses
        
         (studentId,msgToCLass)
         
          VALUES 
          
          ('$studentClass','$message')";
        
        $insert_pro = mysqli_query($con, $insert_msgtoclasses);

        if($insert_pro){
            echo "<script>alert('Message envoyé !')</script>";
            echo "<script>window.open('msgToClasses.php','_self')</script>";
        }
    }

?>