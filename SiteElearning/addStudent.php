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
                    <h2 class="text-center text-white bg-primary">Ajouter étudiant</h2><hr>
               

                <form  method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Nom de l'étudiant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer le nom de l'étudiant" name="studentName"/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Adresse</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer son adresse" name="adress"/>
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
                        <label for="" class="col-sm-2 col-form-label text-danger">Promotion</label>
                        <div class="col-sm-10">
                        <select name="batch" class="form-control" required>
                               <?php
                                    $getBatch = "SELECT * FROM courses";
                                    $run_batch = mysqli_query($con, $getBatch);
                                    while($rowBatch = mysqli_fetch_array($run_batch)){
                                        $id = $rowBatch['course_id'];
                                        $course_name = $rowBatch['course_name'];
                                    
                               ?>
                               <option value="<?php echo $id ;?>"><?php echo $course_name;?></option>

                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Profil</label>
                        <div class="col-sm-10">
                        <select name="medium" class="form-control" required>
                                <option value="R">Reconversion</option>
                                <option value="AA">Amélioration Acquis</option>
                                <option value="CP">Conaissances Personnel</option>
                               
                           </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Genre</label>
                        <div class="col-sm-10">
                        <select name="gender" class="form-control" required>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                                <option value="autre">Autre</option>
                               
                           </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer télèphone mobile" name="mobile" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer son email" name="email" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Ecole</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer son ou ses écoles" name="school" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Paiements</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer ses paiements" name="fee" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer son mot de passe" name="password" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Sujets</label>
                        <div class="col-sm-10">
                          <?php
                            $subject = "SELECT * FROM subject";
                            $runSubject = mysqli_query($con, $subject);
                            while($rowSubject = mysqli_fetch_array($runSubject)){
                                $id = $rowSubject['id'];
                                $subjectName = $rowSubject['subjectName'];
                            
                          ?>
                          <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="sub[]" value="<?php echo $subjectName ;?>" />
                                    <?php echo $subjectName ;?>
                              </label>
                          </div>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Examens</label>
                        <div class="col-sm-10">
                          <?php
                            $subject = "SELECT * FROM competitive";
                            $runSubject = mysqli_query($con, $subject);
                            while($rowSubject = mysqli_fetch_array($runSubject)){
                                $id = $rowSubject['id'];
                                $examName = $rowSubject['examName'];
                            
                          ?>
                          <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="com[]" value="<?php echo $examName ;?>" />
                                    <?php echo $examName ;?>
                              </label>
                          </div>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Date de naissance</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="date" required />
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-sm-2 col-form-label text-danger">Image de l'étudiant</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file btn btn-danger w-100" name="u_image" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn btn-outline-dark border-0 btn-primary w-100" name="submit" type="submit">Ajouter Etudiant</button>
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
        $studentName = $_POST['studentName']; 
        $adress = $_POST['adress']; 
        $class = $_POST['class']; 
        $batch = $_POST['batch']; 
        $medium = $_POST['medium']; 
        $gender = $_POST['gender']; 
        $mobile = $_POST['mobile'];
        $email = $_POST['email']; 
        $school = $_POST['school']; 
        $fee = $_POST['fee']; 
        $password = $_POST['password'];
        $date = $_POST['date']; 
        
        $sub = implode(",",$_POST['sub']);
        $com = implode(",",$_POST['com']);

        $image_tmp = $_FILES['u_image']['tmp_name'];
        $u_image = 'student_'.date('Y-m-d-H-i-s'). '_'.uniqid(). '.jpg';

        move_uploaded_file($image_tmp,"../images/student/$u_image");
    
        $insert_student = "INSERT INTO student
        
         (name,adress,class,batch,medium,gender,mobile,email,school,fee,password,subject,cexam,dob,image,date)
         
          VALUES 
          
          ('$studentName','$adress','$class','$batch','$medium','$gender','$mobile','$email','$school','$fee','$password','$sub','$com','$date','$u_image',NOW())";
        
        $insert_pro = mysqli_query($con, $insert_student);

        if($insert_pro){
            echo "<script>alert('Etudiant ajouté !')</script>";
            echo "<script>window.open('student.php','_self')</script>";
        }
    }

?>