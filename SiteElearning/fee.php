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

if(isset($_GET['del'])){
    $del_id = $_GET['del'];

    $del_query = "DELETE FROM fee WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run){
        echo "<script> alert('Tu as supprimer avec succès')</script>";
        echo "<script> window.open('fee.php', '_self')</script>";
    }
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
                    <h2 class="text-center text-white bg-primary">Voir toutes les détails de paiements</h2>
                    
                <table class="table table-bordered" id="table2excel">
                    <thead class="thead bg-dark text-white">
                        <tr>
                            <th>N°</th>
                            <th>Nom de l'étudiant</th>
                            <th>Classe</th>
                            <th>Promotion</th>
                            <th>Montant</th>
                            <th>N° coupon</th>
                            <th>Date</th>
                            <th><i class="fa fa-trash-o"></i></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $fee = "SELECT * FROM fee ORDER BY id desc";
                            $runfee = mysqli_query($con,$fee);
                            $i=0;
                            while($rowfee = mysqli_fetch_array($runfee)){
                                $id = $rowfee['id'];
                                $studentId = $rowfee['studentId'];
                                $classId = $rowfee['classId'];
                                $batchId = $rowfee['batchId'];
                                $fees = $rowfee['fees'];
                                $rNo = $rowfee['rNo'];
                                $date = $rowfee['date'];

                                $i++;

                                $list = "SELECT * FROM student WHERE id = '$studentId'";
                                $runlist = mysqli_query($con, $list);
                                $rowlist = mysqli_fetch_array($runlist);

                                $name = $rowlist['name'];

                                $batch = "SELECT * FROM courses WHERE course_id = '$batchId'";
                                $runbatch = mysqli_query($con, $batch);
                                $rowbatch = mysqli_fetch_array($runbatch);

                                $course_name = $rowbatch['course_name'];
                        ?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo ucfirst($name);?></td>
                        <td>Classe <?php echo $classId;?></td>
                        <td><?php echo $course_name;?></td>
                        <td><?php echo $fees;?></td>
                        <td><?php echo $rNo;?></td>
                        <td><?php echo $date;?></td>
                        <td><a href="fee.php?del=<?php echo $id ;?>" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </a></td>
                       
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-danger w-auto" id="btn" type="button" >Exporter en Excel</button>
            </div >
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
        $('#table2excel').DataTable();
    });
</script>

<script>
    $("#btn").click(function(){
        $("#table2excel").table2excel({
            name:"Worksheet name",
            filename: "gallerie.xls"
        });
    });
</script>
