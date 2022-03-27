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

    $del_query = "DELETE FROM register WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run){
        echo "<script> alert('Tu as supprimer avec succès')</script>";
        echo "<script> window.open('register.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Voir toutes les inscriptions</h2>
                    
                <table class="table table-bordered" id="table2excel">
                    <thead class="thead bg-dark text-white">
                        <tr>
                            <th>N°</th>
                            <th>Nom de l'étudiant</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Adresse</th>
                            <th>Profil</th>
                            <th>Message</th>
                            <th>Date</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $register = "SELECT * FROM register ORDER BY regId desc";
                            $runregister = mysqli_query($con,$register);
                            $i=0;
                            while($rowregister = mysqli_fetch_array($runregister)){
                                $regId = $rowregister['regId'];
                                $regName = $rowregister['regName'];
                                $regEMail = $rowregister['regEMail'];
                                $regMobile = $rowregister['regMobile'];
                                $regAdress = $rowregister['regAdress'];
                                $regQua = $rowregister['Profil'];
                                $messageReg = $rowregister['messageReg'];
                                $date = $rowregister['date'];

                                $i++;
                        ?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo ucfirst($regName);?></td>
                        <td><?php echo $regEMail;?></td>
                        <td><?php echo $regMobile;?></td>
                        <td><?php echo $regAdress;?></td>
                        <td><?php echo $regQua;?></td>
                        <td><?php echo $messageReg;?></td>
                        <td><?php echo $date;?></td>
                       
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
