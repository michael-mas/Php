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
                    <h2 class="text-center text-white bg-primary">Ajouter examen</h2><hr>
               

                <form  method="post" enctype="multipart/form-data">
                   
                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Classe</label>
                        <div class="col-sm-10">
                           <select name="class" id="class" class="form-control" required>
                               <?php

                                    for($i=1; $i<=10; $i++){
                                        echo "<option value='$i'>Classe $i</option>";
                                    }
                                ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Pour la promotion</label>
                        <div class="col-sm-10">
                        <select name="batch" id="batch" class="form-control" required>
                               
                           </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Sujet</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer le sujet" name="subject" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Total de point</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Entrer le total de point"  name="tmarks" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Date de l'examen</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control"  name="date" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn btn-outline-dark border-0 btn-primary w-100" name="submit" type="submit">Ajouter Examen</button>
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

<script>
    $(document).ready(function(){
        $('#class').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"fetchbatch.php",
                method:"POST",
                data : {
                    id:id
                },
                dataType : "text",
                success : function(data){
                    $('#batch').html(data);
                }

            });
        });
    });
</script>

<?php
    if(isset($_POST['submit'])){
        $class = $_POST['class']; 
        $batch = $_POST['batch']; 
        $subject = $_POST['subject'];
        $tmarks = $_POST['tmarks']; 
        $date = $_POST['date']; 
    
        $insert_exam = "INSERT INTO exam
        
         (batchName,date,subject,class,totalMarks)
         
          VALUES 
          
          ('$class','$batch','$subject','$tmarks','$date')";
        
        $insert_pro = mysqli_query($con, $insert_exam);

        if($insert_pro){
            echo "<script>alert('Examen ajouté !')</script>";
            echo "<script>window.open('exam.php','_self')</script>";
        }
    }

?>