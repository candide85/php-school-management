<?php
    ob_start();
    session_start();


    if (!isset($_SESSION['user_name'])) {
        header('Location: login_admin.php');        
    }

    require_once ('inc/db.php');
    require_once ('inc/top.php');

    if (isset($_GET['id'])) {
        $edit_id = $_GET['id'];

        $select = "SELECT * FROM gallery WHERE gallery_id = '$edit_id' ";
        $query = mysqli_query($con, $select);
        $row = mysqli_fetch_array($query);

        $gallery_id = $row['gallery_id'];
        $gallery_title = $row['gallery_title'];
        $img_files = $row['gallery_image'];
    }

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-2">
            <?php include 'inc/navbar_admin.php'; ?>
            </div>
        </div>
        <p><?php echo "Welcome,  ". $_SESSION['user_name']; ?></p>
        <div class="row mt-1">
            <div class="col-md-3">
                <?php include 'inc/sidebar.php';?>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <img src="images/slid2.jpg" alt="" class="img-fluid" style="height: 60px; width: 100% ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h2 class="text-center text-white bg-primary">Update Images to Gallery</h2><hr>
                    
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="" class=" col-sm-2 col-form-label text-danger">Image Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class=" form-control"  name="imagetitle" value="<?php echo $gallery_title ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-sm-2 col-form-label text-danger">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class=" form-control-file btn-danger" name="image" value="<?php echo $gallery_image ?>" />
                                </div>
                            </div>
                            <div class=" offset-sm-2 col-sm-10">
                                    <button class="btn btn-outline-primary btn-block" name="update" type="submit">Update Image</button>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row bg-dark mt-2">
                <?php include 'inc/footer.php'; ?>
            </div>
        </div>
    </div>    
</body>
</html>

<?php
    if (isset($_POST['update'])) {
        $img_title = $_POST['imagetitle'];

        $img_file = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];

        if (empty($img_file)) {
            $img_file = $img_files;
        }else {
            $img_file = 'gallery_sch' . date('Y-m-d-H-i-s') .'_' .uniqid() . 'jpg';
        }

       
        move_uploaded_file( $img_tmp, "images/gallery_sch/$img_file" );

        $update = "UPDATE gallery set gallery_title = '$img_title', gallery_image = '$img_file' WHERE gallery_id = '$edit_id'";        

        $insert_query = mysqli_query($con, $update);

        if ($insert_query) {
            echo "<script>alert('Welcome, You have successfully updated image')</script>";
            echo "<script>window.open('gallery.php', '_self')</script>";
        }
    }
?>