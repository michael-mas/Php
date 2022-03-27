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

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-primary">Statistique Global De Afpa Academie</h2>
                </div>

                <div class="col-md-3">
                    <div class="card text-primary border-primary">
                        <div class="card-header bg-primary text-white">Etudiants</div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <!-- Afficher nombre d'étudiant dans chaque class jusqu'à 10 -->
                                    <?php 
                                        for($i = 1; $i<=10; $i++){
                                            $student = "SELECT * FROM student WHERE class = '$i'";
                                            $student_run = mysqli_query($con, $student);
                                            $row_student = mysqli_num_rows($student_run);
                                        
                                    ?>

                                    <tr>
                                        <th class="bg-dark text-white"><?php echo $i;?></th>
                                        <th><?php echo $row_student;?></th>
                                    </tr>
                                   <?php
                                        }
                                   ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card text-primary border-warning">
                        <div class="card-header bg-warning text-white">Revenu Total Collecté</div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <?php 
                                        $studentTotalFee ="SELECT * FROM student";
                                        $runstudentTotalFee = mysqli_query($con,$studentTotalFee);
                                        $studentTotalFee = 0;
                                        $TotalFeesa = 0;

                                        while($rowstudentTotalFee = mysqli_fetch_array($runstudentTotalFee)){
                                            $studentTotalFee = $rowstudentTotalFee['fee'];
                                            $TotalFeesa += $studentTotalFee;
                                        }

                                        $feea = "SELECT * FROM fee";
                                        $fee_run = mysqli_query($con,$feea);
                                        $fees = 0;
                                        $feesa = 0;
                                        while($row_fee = mysqli_fetch_array($fee_run)){
                                            $fees = $row_fee['fees'];
                                            $feesa += $fees;
                                        }
                                    ?>
                                    <tr>
                                        <th class="bg-dark text-white">Revenue Total</th>
                                        <th><?php echo $TotalFeesa; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Revenue collecté</th>
                                        <th><?php echo $feesa; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger text-white">Revenue restant</th>
                                        <th><?php echo $TotalFeesa - $feesa; ?></th>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card text-primary  border-secondary">
                        <div class="card-header bg-secondary text-white">Solde</div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>

                                    <?php
                                        $expenses = "SELECT * FROM expenses";
                                        $runexpenses = mysqli_query($con,$expenses);
                                        $expAmt = 0;
                                        $Totalexp = 0;

                                        while($rowexpenses = mysqli_fetch_array($runexpenses)){
                                            $expAmt = $rowexpenses['amt'];
                                            $Totalexp += $expAmt;
                                        }
                                    ?>

                                    <tr>
                                        <th class="bg-dark text-white">Revenue Collecté</th>
                                        <th><?php echo $feesa; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Dépense</th>
                                        <th><?php echo $Totalexp; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger text-white">Solde Restant</th>
                                        <th><?php echo $feesa - $Totalexp; ?></th>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card text-primary border-danger">
                        <div class="card-header bg-danger text-white">Dépenses <small> (10 dernières dépenses)</small>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-condensed">
                            <thead class="thead bg-dark text-white">
                                <tr>
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Particularité</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                        $expenses = "SELECT * FROM expenses ORDER by id DESC LIMIT 10";
                                        $runexpenses = mysqli_query($con,$expenses);
                                        $ia = 0;

                                        while($rowexpenses = mysqli_fetch_array($runexpenses)){
                                            $expAmt = $rowexpenses['amt'];
                                            $particular = $rowexpenses['particular'];
                                            $date = $rowexpenses['date'];

                                            $ia = $ia+1;
                                        
                                    ?>

                                <tr>
                                    <th><?php echo $ia; ?></th>
                                    <th><?php echo $date; ?></th>
                                    <th><?php echo $expAmt; ?></th>
                                    <th><?php echo $particular; ?></th>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
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