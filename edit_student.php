<?php
    ob_start();
    session_start();


    if (!isset($_SESSION['user_name'])) {
        header('Location: login_admin.php');        
    }

    require_once ('inc/db.php');
    require_once ('inc/top.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $student = "SELECT * FROM student WHERE id = '$id' ";
        $query = mysqli_query($con, $student);
        $row = mysqli_fetch_array($query);

        $id = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $class = $row['class'];
        $batch = $row['batch'];
        $medium = $row['medium'];
        $gender = $row['gender'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $school = $row['school'];
        $fees = $row['fee'];
        $password = $row['password'];
        $subject = $row['subject'];        
        $exam = $row['exam'];
        $dob = $row['dob'];
        $img_files = $row['image'];
        $date = $row['date'];
        
        
        $subArray = explode(",",$subject);
        $examArray = explode(",",$exam);

        $courses = "SELECT * FROM course WHERE course_id = '$batch' ";
        $query_courses = mysqli_query($con, $courses) ;
        $row_courses = mysqli_fetch_array($query_courses);

        // $courses_id = $row_courses['course_id'];
        // $courses_name = $row_courses['course_name'];
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
                        <h2 class="text-center text-white bg-primary">Update Student</h2><hr>
                        <form action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Student Name</label>
                            <div class="col-sm-7">
                            <input type="text" class="form-control h-100" value="<?php echo $name ?>" name="name" id="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-7">
                            <input type="text" value="<?php echo $address ?>" name="address" class="form-control h-100" id="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">For Class</label>
                            <div class="col-sm-7">
                            <select class="form-control" name="class" required id="">                                
                                <option value="1"<?php if($class == "1"){echo "selected";} ?> >Class 1</option>
                                <option value="2"<?php if($class == "2"){echo "selected";} ?> >Class 2</option>
                                <option value="3"<?php if($class == "3"){echo "selected";} ?> >Class 3</option>
                                <option value="4"<?php if($class == "4"){echo "selected";} ?> >Class 4</option>
                                <option value="5"<?php if($class == "5"){echo "selected";} ?> >Class 5</option>
                                <option value="6"<?php if($class == "6"){echo "selected";} ?> >Class 6</option>
                                <option value="7"<?php if($class == "7"){echo "selected";} ?> >Class 7</option>
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Batch</label>
                            <div class="col-sm-7">
                             <select class="form-control" name="batch" required id="">                                
                                <?php 
                                    $getbatch = "SELECT * FROM course";
                                    $query_batch = mysqli_query($con, $getbatch);
                                    while ($row_batch = mysqli_fetch_array($query_batch) ) {
                                        $opt_id = $row_batch['course_id'];
                                        $opt_coursename = $row_batch['course_name'];                                    
                                ?>
                                <option value="<?php echo $opt_id?>" <?php if($batch == $opt_id){echo "selected";} ?>><?php echo $opt_coursename ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Medium</label>
                            <div class="col-sm-7">
                            <select class="form-control" name="medium" required id="">                                
                                <option value="certificate" <?php if($medium == "certificate"){echo "selected";} ?>>Certificate</option>
                                <option value="full-course" <?php if($medium == "full-course"){echo "selected";} ?>>Full-Course</option>
                                <option value="week-class" <?php if($medium == "week-class"){echo "selected";} ?>>Week-Class</option>
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-7">
                            <select class="form-control" name="gender" required id="">                                
                                <option value="male"<?php if($gender == "male") echo "selected"?>>Male</option>
                                <option value="female"<?php if($gender == "female") echo "selected"?>>Female</option>                                                                
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-7">
                            <input type="text" name="mobile" required value="<?php echo $mobile ?>" class="form-control h-100" id="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-7">
                            <input type="text" name="email" value="<?php echo $email ?>" class="form-control h-100" required id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">School</label>
                            <div class="col-sm-7">
                            <input type="text" name="school" value="<?php echo $school ?>" class="form-control h-100" required id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Fees</label>
                            <div class="col-sm-7">
                            <input type="text" name="fees" value="<?php echo $fees ?>" class="form-control h-100" required id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-7">
                            <input type="text" name="password" value="<?php echo $password ?>" class="form-control h-100" id="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-7">
                                <?php
                                    $subject = "SELECT * FROM subject";
                                    $query = mysqli_query($con, $subject);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $subj_name = $row['subject_name'];                                                                        
                                ?>

                                <div class="form-check form-check-inline">
                                    <lable class="form-check-label">
                                        <input type="checkbox" name="subj[]" value="<?php echo $subj_name ?>" <?php if(in_array("$subj_name",$subArray)){echo "checked";}?> class="form-check-input p-2"/><?php echo $subj_name; ?>
                                    </lable>
                                </div>
                                <?php }?>
                            </div>                            
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Competitive Exam</label>
                            <div class="col-sm-7">
                                <?php
                                    $comp_exam = "SELECT * FROM competition";
                                    $query = mysqli_query($con, $comp_exam);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $exam_name = $row['exam_name'];                                                                        
                                ?>

                                <div class="form-check form-check-inline">
                                    <lable class="form-check-label">
                                        <input type="checkbox" name="comp[]" value="<?php echo $exam_name ?>" <?php if(in_array("$exam_name",$examArray)){echo "checked";}?> class="form-check-input p-2" /><?php echo $exam_name; ?>
                                    </lable>
                                </div>
                                <?php }?>
                            </div>                            
                        </div>  
                        <div class=" mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-7">
                            <input type="date" name="dob" value="<?php echo $dob ?>" class="form-control h-auto" id="">
                            </div>
                        </div>  
                        <div class="row">
                                <label for="" class=" col-sm-2 col-form-label">Student Image</label>
                                <div class="col-sm-8">
                                    <input type="file" value="<?php echo $image ?>" class=" form-control h-auto" name="image" id="" />
                                </div>
                            </div>                                                                                                                        
                            <div class="row mt-3 mb-2">                            
                                <div class="col-sm-2 offset-5">
                                    <button class="btn btn-danger form-control mt-4" id="btn" name="update" type="submit">Add Student</button>
                                </div>
                            
                            </div>

                          
                        </form>
                    </div>
            </div>
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

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
               
        }
        
        $name = $_POST['name'];
        $address = $_POST['address'];
        $class = $_POST['class'];
        $batch = $_POST['batch'];
        $medium = $_POST['medium'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $school = $_POST['school'];
        $fees = $_POST['fees'];
        $password = $_POST['password'];               
        $dob = $_POST['dob'];
        
        $sub = implode(",",$_POST['subj']);
        $com = implode(",",$_POST['comp']);

        $img_file = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        

        if (empty($img_file)) {
            $img_file = $img_files;
        }else {
            $img_file = 'students' . date('Y-m-d-H-i-s') .'_' .uniqid() . 'jpg';
        }

       
        move_uploaded_file( $img_tmp, "images/students/$img_file" );

        $update = "UPDATE student set name = '$name', address = '$address', class = '$class', 
        batch = '$batch', medium = '$medium', gender = '$gender', mobile = '$mobile', email = '$email', 
        school = '$school', fee = '$fees', password = '$password', subject = '$sub', exam = '$com', 
        dob = '$dob', image = '$img_file'  WHERE id = '$id'";        

        $insert_query = mysqli_query($con, $update);

        if ($insert_query) {
            echo "<script>alert('Welcome, You have successfully updated student')</script>";
            echo "<script>window.open('student.php', '_self')</script>";
        }
    }
?>