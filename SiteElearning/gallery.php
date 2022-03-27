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

    $del_query = "DELETE FROM gallery WHERE gallery_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run){
        echo "<script> alert('Tu as supprimer avec succès')</script>";
        echo "<script> window.open('gallery.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Voir toutes les images</h2>
                    <div align="right">
                        <a class="btn btn-outline-primary" href="addGallery.php">Ajouter image</a><hr>
                </div>
                <table class="table table-bordered" id="table2excel">
                    <thead class="thead bg-dark text-white">
                        <tr>
                            <th>N°</th>
                            <th>Titre image</th>
                            <th>Image</th>
                            <th>
                                <i class="fa fa-pencil-square-o"></i>
                            </th>
                            <th>
                                <i class="fa fa-trash-o"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $gallery = "SELECT * FROM gallery ORDER BY gallery_id desc";
                            $runGallery = mysqli_query($con,$gallery);
                            $i=0;
                            while($rowGallery = mysqli_fetch_array($runGallery)){
                                $gallery_id = $rowGallery['gallery_id'];
                                $gallery_title = $rowGallery['gallery_title'];
                                $gallery_image = $rowGallery['gallery_image'];
                                $i++;
                        ?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo ucfirst($gallery_title);?></td>
                        <td>
                            <img class="img-fluid" src="../images/gallery/<?php echo $gallery_image ;?>" width="100px" />
                        </td>
                        <td>
                            <a href="editGallery.php?id=<?php echo $gallery_id;?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td>
                            <a href="gallery.php?del=<?php echo $gallery_id;?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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


