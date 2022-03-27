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


                <div class="row">
                    <div class="col-2">
                    <label for="exampleFormControlTextarea1" class="form-label text-danger">Message à l'élève</label>
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
        
        $message = $_POST['message']; 
        
        if(isset($_GET['del'])){
            $del_id = $_GET['del'];
      
        $idStudent = "SELECT * FROM msg WHERE id = '$del_id' ";
        $run_idClass = mysqli_query($con, $idStudent);
        $row_idClass = mysqli_fetch_array($run_idClass);

       
        $studentId = $row_idClass['studentId'];
    }
        $insert_msg = "INSERT INTO msgtoclasses
        
         (studentId,msgToClass)
         
          VALUES 
          
          ('$studentId','$message')";
        
        $insert_pro = mysqli_query($con, $insert_msg);

        if($insert_pro){
            echo "<script>alert('Message envoyé !')</script>";
            echo "<script>window.open('msgToClasses.php','_self')</script>";
        }
    }

?>