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
                    <h2 class="text-center text-white bg-primary">Ajouter image dans la gallerie</h2><hr>
               

                <form  method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Titre de l'image</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Entrer le titre de l'image" name="imageTitle1"/>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="" class="col-sm-2 col-form-label text-danger">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file btn btn-danger w-100" name="u_image"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn btn-outline-dark border-0 btn-primary w-100" name="submit" type="submit">Ajouter Image</button>
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
        $imageTitle = $_POST['imageTitle1']; 
        
        $u_image = $_FILES['u_image']['name'];
        $image_tmp = $_FILES['u_image']['tmp_name'];

        $u_image = 'GalleryImg' .date('Y-m-d-H-i-s') . '_' .uniqid() . 'jpg';

        move_uploaded_file($image_tmp, "../images/gallery/$u_image");
    
        $insert_gallery = "INSERT INTO gallery (gallery_title,gallery_image) VALUES ('$imageTitle','$u_image')";
        
        $insert_pro = mysqli_query($con, $insert_gallery);

        if($insert_pro){
            echo "<script>alert('Image ajouté !')</script>";
            echo "<script>window.open('gallery.php','_self')</script>";
        }
    }

?>