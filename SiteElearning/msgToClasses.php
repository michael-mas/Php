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

    $del_query = "DELETE FROM msgtoclasses WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run){
        echo "<script> alert('Tu as supprimer avec succès')</script>";
        echo "<script> window.open('msgToClasses.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Voir toutes les réponses</h2>
                    <div align="right">
                        <a class="btn btn-outline-primary" href="addMsgToClasses.php">Ecrire message à une classe</a><hr>
                </div>
                <table class="table table-bordered" id="table2excel">
                    <thead class="thead bg-dark text-white">
                        <tr>
                            <th>N°</th>
                            <th>Nom étudiant</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>
                                <i class="fa fa-trash-o"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $msgtoclasses = "SELECT * FROM msgtoclasses ORDER BY id desc";
                            $runmsgtoclasses= mysqli_query($con,$msgtoclasses);
                            $i=0;
                            while($rowmsgtoclasses = mysqli_fetch_array($runmsgtoclasses)){
                                $id = $rowmsgtoclasses['id'];
                                $studentId = $rowmsgtoclasses['studentId'];
                                $msgToClass = $rowmsgtoclasses['msgToClass'];
                                $date = $rowmsgtoclasses['date'];
                                $i++;

                                $name = "SELECT * FROM student WHERE id = '$studentId' ";
                                $run_name = mysqli_query($con, $name);
                                $row_name = mysqli_fetch_array($run_name);
                                $name = $row_name['name'];
                              
                        ?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo ucfirst($name); ?></td>
                        <td><?php echo ucfirst($date);?></td>
                        <td><?php echo ucfirst($msgToClass);?></td>
                        <td>
                            <a href="msgtoclasses.php?del=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
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


