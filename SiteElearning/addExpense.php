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
                    <h2 class="text-center text-white bg-primary">Ajouter dépense</h2><hr>
               

                <form  method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Particularité</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer sa particularité" name="particular"/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Montant</label>
                        <div class="col-sm-10">
                            <input type="text"  placeholder="Entrer son montant" class="form-control-file w-100" name="amt"/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Date</label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control-file w-100" name="date"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn btn-outline-dark border-0 btn-primary w-100" name="submit" type="submit">Ajouter dépense</button>
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
        $particular = $_POST['particular']; 
        $amt = $_POST['amt']; 
        $date = $_POST['date']; 
        
       
    
        $insert_expenses = "INSERT INTO expenses (particular,amt,date) VALUES ('$particular','$amt','$date')";
        
        $insert_pro = mysqli_query($con, $insert_expenses);

        if($insert_pro){
            echo "<script>alert('Dépense ajouté !')</script>";
            echo "<script>window.open('expenses.php','_self')</script>";
        }
    }

?>