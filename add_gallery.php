<?php
    ob_start();
    session_start();


    if (!isset($_SESSION['user_name'])) {
        header('Location: login_admin.php');        
    }

    require_once ('inc/db.php');
    require_once ('inc/top.php');



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
                        <h2 class="text-center text-white bg-primary">Add Images to Gallery</h2><hr>
                    
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Image Title</label>
                            <div class="col-sm-7">
                            <input type="text" class="form-control h-100" id="">
                            </div>
                        </div>
                           
                            <div class="row">
                                <label for="" class=" col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class=" form-control h-auto" name="image" id="" />
                                </div>
                            </div>
                            <div class="row">
                            <div class=" col-sm-2 offset-2 mt-4">
                                    <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Add Image</button>
                                </div>
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
    if (isset($_POST['submit'])) {
        $img_title = $_POST['imagetitle'];

        $img_file = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];

        $img_file = 'gallery_sch' . date('Y-m-d-H-i-s') .'_' .uniqid() . 'jpg';

        move_uploaded_file( $img_tmp, "images/gallery_sch/$img_file" );

        $insert_gallery = "INSERT INTO gallery (gallery_title, gallery_image) VALUES ('$img_title', '$img_file')";

        $insert_query = mysqli_query($con, $insert_gallery);

        if ($insert_query) {
            echo "<script>alert('Welcome, You have successfully added a new image')</script>";
            echo "<script>window.open('gallery.php', '_self')</script>";
        }
    }
?>