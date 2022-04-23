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
                        <img src="images/slid2.jpg" alt="" class="img-fluid" style="height: 60px; width: 100% "><hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center text-white bg-primary">
                            Statics Overview of Apex Academy
                        </h2>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-primary border-primary">
                            <div class="card-header bg-primary text-white">Students</div>
                            <div class="card-body">
                                <table class="table table-brdered table-condensed">
                                    <tbody>
                                        <?php 
                                            for ($i = 1; $i <= 10; $i++) { 
                                                $std = "SELECT * FROM student WHERE class = '$i' ";
                                                $std_run = mysqli_query($con, $std);
                                                $std_rows = mysqli_num_rows($std_run);
                                            
                                        ?>
                                        <tr>
                                            <th class="bg-dark text-white">Class <?php echo $i; ?></th>
                                            <th><?php echo $std_rows; ?></th>
                                        </tr>
                                        <?php
                                        }    
                                        ?>                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card text-primary border-warning">
                            <div class="card-header bg-warning text-white">Total Fees Collected</div>
                            <div class="card-body">
                                <table class="table table-brdered table-condensed">
                                    <tbody>
                                        <?php 
                                            $std_Total_Fee = "SELECT * FROM student";
                                            $std_Total_Fee_query = mysqli_query($con, $std_Total_Fee);
                                            $std_Total_Fee = 0;
                                            $Total_Fee = 0;

                                            while ($std_Total_Fee_rows = mysqli_fetch_array($std_Total_Fee_query)) {
                                                $std_Total_Fee = $std_Total_Fee_rows['fee'];
                                                $Total_Fee += $std_Total_Fee;
                                            }

                                            $fee = "SELECT * FROM fee";
                                            $fee_query = mysqli_query($con, $fee);
                                            $fees = 0;
                                            $fee = 0;

                                            while ($fee_rows = mysqli_fetch_array($fee_query)) {
                                                $fees = $fee_rows['fees'];
                                                $fee += $fees;
                                            }
                                        ?>
                                        <tr>
                                            <th class="bg-dark text-white">Total Fees</th>
                                            <th><?php echo $Total_Fee ?></th>
                                        </tr>
                                        <tr>
                                            <th class="bg-dark text-white">Collected Fees</th>
                                            <th><?php echo $fee ?></th>
                                        </tr>
                                        <tr>
                                            <th class="bg-danger text-white">Remaining Fees</th>
                                            <th><?php echo $Total_Fee - $fee ?></th>
                                        </tr>                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card text-primary  mt-3" style="border-color: purple;">
                            <div class="card-header text-white" style="background: purple;">Balance Cash</div>
                            <div class="card-body">
                                <table class="table table-brdered table-condensed">
                                    <tbody>
                                        <?php 
                                            $expenses = "SELECT * FROM expenses"; 
                                            $expenses_query = mysqli_query($con, $expenses);
                                            $exp_amount = 0;
                                            $total_exp = 0;

                                            while ($exp_rows = mysqli_fetch_array($expenses_query)) {
                                                $exp_amount = $exp_rows['expenses'];
                                                $total_exp += $exp_amount;
                                            }
                                        ?>
                                        <tr>
                                            <th class="bg-dark text-white">Collected Fees</th>
                                            <th><?php echo $fee ?></th>
                                        </tr>
                                        <tr>
                                            <th class="bg-dark text-white">Expenses</th>
                                            <th><?php echo $total_exp ?></th>
                                        </tr>
                                        <tr>
                                            <th class="bg-danger text-white">Remaining Balance</th>
                                            <th><?php echo $fee - $total_exp ?></th>
                                        </tr>                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                    <div class="card text-primary border-danger">
                            <div class="card-header bg-danger text-white" >Expenses <small>( Last Ten Expenses )</small></div>
                            <div class="card-body">
                                <table class="table table-brdered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="bg-dark text-white">Sr No</th>
                                            <th class="bg-dark text-white">Date</th>
                                            <th class="bg-dark text-white">Amount</th>
                                            <th class="bg-dark text-white">Particular</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $expenses = "SELECT * FROM expenses ORDER BY id DESC LIMIT 10";
                                            $expense_queries = mysqli_query($con, $expenses);
                                            $i = 0;

                                            while($expense_rows = mysqli_fetch_array($expense_queries)) {
                                                $exp_amounts = $expense_rows['amt'];
                                                $particular = $expense_rows['particular'];
                                                $date = $expense_rows['date'];

                                                $i = $i+1;                                            
                                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $exp_amounts; ?></td>
                                        <td><?php echo $particular; ?></td>
                                    </tr>
                                        <?php } ?>
                                    </tbody>                                                                           
                                </table>
                            </div>
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