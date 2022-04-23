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
                        <h2 class="text-center text-white bg-primary">Add Students</h2><hr>
                    
                        <form action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Student Name</label>
                            <div class="col-sm-7">
                            <input type="text" class="form-control h-100" placeholder="Enter your Name" name="name" id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"  >Address</label>
                            <div class="col-sm-7">
                            <input type="text" placeholder="Enter your Address" name="address" class="form-control h-100" id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">For Class</label>
                            <div class="col-sm-7">
                            <select class="form-control" name="class" required id="">                                
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                                <option value="4">Class 4</option>
                                <option value="5">Class 5</option>
                                <option value="6">Class 6</option>
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
                                        $id = $row_batch['course_id'];
                                        $course_name = $row_batch['course_name'];                                    
                                ?>
                                <option value="<?php echo $course_name ?>"><?php echo $course_name ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Medium</label>
                            <div class="col-sm-7">
                            <select class="form-control" name="medium" required id="">                                
                                <option value="certificate">Certificate</option>
                                <option value="full-course">Full-Course</option>
                                <option value="week-class">Week-Class</option>
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-7">
                            <select class="form-control" name="gender" required id="">                                
                                <option value="male">Male</option>
                                <option value="female">Female</option>                                
                            </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-7">
                            <input type="text" name="mobile" required placeholder="Enter your Mobile Number" class="form-control h-100" id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-7">
                            <input type="text" name="email" placeholder="Enter your Email Address" class="form-control h-100" required id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">School</label>
                            <div class="col-sm-7">
                            <input type="text" name="school" placeholder="Enter your School Name" class="form-control h-100" required id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Fees</label>
                            <div class="col-sm-7">
                            <input type="text" name="fees" placeholder="Enter your total Fees Amount" class="form-control h-100" required id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-7">
                            <input type="text" name="password" class="form-control h-100" id="" placeholder="">
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
                                        <input type="checkbox" name="subj[]" value="<?php echo $subj_name ?>" class="form-check-input p-2" /><?php echo $subj_name ?>
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
                                        <input type="checkbox" name="comp[]" value="<?php echo $exam_name ?>" class="form-check-input p-2" /><?php echo $exam_name ?>
                                    </lable>
                                </div>
                                <?php }?>
                            </div>                            
                        </div>   
                        <div class="row">
                                <label for="" class=" col-sm-2 col-form-label">Student Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class=" form-control h-auto" name="image" id="" />
                                </div>
                            </div>                                               
                        <div class=" mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-7">
                            <input type="date" name="date" class="form-control h-auto" id="">
                            </div>
                        </div>                                                   
                            <div class="row mt-3 mb-2">                            
                                <div class="col-sm-2 offset-5">
                                    <button class="btn btn-danger form-control mt-4" id="btn" name="submit" type="submit">Add Student</button>
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
        $std_name = $_POST['name'];
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
        $dob = $_POST['date'];

        $subj = implode(",",$_POST['subj']);
        $comp = implode(",",$_POST['comp']);
        
        $img_tmp = $_FILES['image']['tmp_name'];

        $img_file = 'students_' . date('Y-m-d-H-i-s') .'_' .uniqid() . '.jpg';
        move_uploaded_file( $img_tmp, "images/students/$img_file" );

        $insert_std = "INSERT INTO student (name,address,class,batch,medium,gender,mobile,email,school,fee,password,subject,exam,dob,image,date) 
        VALUES ('$std_name','$address','$class','$batch','$medium','$gender','$mobile','$email','$school','$fees','$password','$subj','$comp','$dob','$img_file',NOW())";

        $insert_query = mysqli_query($con, $insert_std);

        if ($insert_query) {
            echo "<script>alert('Welcome, You have successfully added a new student')</script>";
            echo "<script>window.open('student.php', '_self')</script>";
        }
    }
?>