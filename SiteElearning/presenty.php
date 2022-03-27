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

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

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

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-primary">Details Precenses Etudiants</h2><hr>
                    <a class="btn btn-info" href="course.php">Revenir à l'accueil</a><hr>
                </div>
            </div>
            <div class="row">
                <?php
                    $student = "SELECT * FROM  attendance WHERE studentId = '$id' order by attId DESC";

                    $run_student = mysqli_query($con,$student);

                    while($row_student = mysqli_fetch_array($run_student)){
                        $studentId = $row_student['studentId'];
                        $attendance = $row_student['attendance'];
                        $date = $row_student['date'];

                        $date = date('Y-m-d', strtotime($date));
                     
                ?>
                <div class="col-md-2" style="border:1px solid gray;">
                    <p>
                        <?php echo $date ;?>
                        <small class="<?php echo ($attendance == "Present") ? "text-primary" : "text-danger"?>">
                            <?php echo $attendance;?>
                        </small>
                    </p>
                </div>
                <?php } ?>
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