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
                    <h2 class="text-center text-white bg-primary">Ajouter Cours</h2><hr>
               

                <form  method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Nom du cours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer le nom du cours" name="courseName"/>
                        </div>
                    </div>


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

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Durée du cours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer la durée" name="duration" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Prix du cours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer son prix" name="fee" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Date de départ</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control"  name="date" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn btn-outline-dark border-0 btn-primary w-100" name="submit" type="submit">Ajouter Cours</button>
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
        $courseName = $_POST['courseName']; 
        $class = $_POST['class']; 
        $duration = $_POST['duration'];
        $fee = $_POST['fee']; 
        $date = $_POST['date']; 
    
        $insert_course = "INSERT INTO courses
        
         (course_name,course_duration,course_fee,course_start,class)
         
          VALUES 
          
          ('$courseName','$duration','$fee','$date','$class')";
        
        $insert_pro = mysqli_query($con, $insert_course);

        if($insert_pro){
            echo "<script>alert('Cours ajouté !')</script>";
            echo "<script>window.open('course.php','_self')</script>";
        }
    }

?>