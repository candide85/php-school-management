<?php
    include 'inc/db.php';

    $gallery = "SELECT * FROM gallery";
    $gal_query = mysqli_query($con, $gallery);
    $gal_rows = mysqli_num_rows($gal_query);

    $student = "SELECT * FROM student";
    $std_query = mysqli_query($con, $student);
    $std_rows = mysqli_num_rows($std_query);

    $review = "SELECT * FROM review";
    $review_query = mysqli_query($con, $review);
    $review_rows = mysqli_num_rows($review_query);

    $courses = "SELECT * FROM course";
    $courses_query = mysqli_query($con, $courses);
    $courses_rows = mysqli_num_rows($courses_query);

    $register = "SELECT * FROM register";
    $register_query = mysqli_query($con, $register);
    $register_rows = mysqli_num_rows($register_query);

    $fee = "SELECT * FROM fee";
    $fee_query = mysqli_query($con, $fee);
    $fee_rows = mysqli_num_rows($fee_query);

    $category = "SELECT * FROM category";
    $category_query = mysqli_query($con, $category);
    $category_rows = mysqli_num_rows($category_query);

    $expense = "SELECT * FROM expenses";
    $expense_query = mysqli_query($con, $expense);
    $expense_rows = mysqli_num_rows($expense_query);

    $exam = "SELECT * FROM exam";
    $exam_query = mysqli_query($con, $exam);
    $exam_rows = mysqli_num_rows($exam_query);

    $msg = "SELECT * FROM message";
    $msg_query = mysqli_query($con, $msg);
    $msg_rows = mysqli_num_rows($msg_query);

    $msg_complaint = "SELECT * FROM msg_classes";
    $msg_complaint_query = mysqli_query($con, $msg_complaint);
    $msg_complaint_rows = mysqli_num_rows($msg_complaint_query);



?>
<div class="list-group">
    <a href="index_admin.php" class="list-group-item list-group-item-action active">
    <i class="bi bi-speedometer"></i>  Dashborad
    </a>

    <a href="gallery.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-camera"></i> Gallery    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $gal_rows; ?></span>    
    </a>

    <a href="student.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-person-circle"></i> Students    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $std_rows; ?></span>    
    </a>

    <a href="review.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-star-fill"></i> Review    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $review_rows; ?></span>    
    </a>

    <a href="review.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-life-preserver"></i> Batches    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $courses_rows; ?></span>    
    </a>

    <a href="register.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-lightbulb"></i> Registration    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $register_rows; ?></span>    
    </a>

    <a href="fees.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-cash-stack"></i> Fees    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $fee_rows; ?></span>    
    </a>

    <a href="category.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-bookmark-check"></i> Category    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $category_rows; ?></span>    
    </a>

    <a href="expenses.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-cash"></i> Expenses    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $expense_rows; ?></span>    
    </a>

    <a href="exam.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-question-circle"></i> Exams    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $exam_rows; ?></span>    
    </a>

    <a href="message.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-envelope"></i> Messages    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $msg_rows; ?></span>    
    </a>

    <a href="message_complains.php" class="list-group-item list-group-item-action mt-2" >
    <i class="bi bi-envelope-fill"></i> Complaints    
        <span class="badge rounded-pill bg-primary ms-5"><?php echo $msg_complaint_rows; ?></span>    
    </a>

</div>