<?php
    include ('inc/top.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <?php include ('inc/navbar.php') ?>
            
        </div>
    </div>
</div>

<div class="row mt-5 m-0">
    <div class="col-md-4">
           <h2 class="text-secondary">Register Your Name</h2><hr>
           <form action="" method="post">
               <div class="form-group row">
                   <label for="" class="col-sm-2 col-form-label text-dark">Name</label>
                   <div class="col-sm-10 mt-2">
                       <input type="text"  name="name" placeholder="Enter your Name" style="border: 1px solid black; padding: left 5px;" class="form-control" id="">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="" class="col-sm-2 col-form-label text-dark">Email</label>
                   <div class="col-sm-10 mt-2">
                       <input type="text"  name="email" placeholder="Enter your Address Email" style="border: 1px solid black; padding: left 5px;" class="form-control" id="">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="" class="col-sm-2 col-form-label text-dark">Mobile</label>
                   <div class="col-sm-10 mt-2">
                       <input type="text" name="mobile" placeholder="Enter your Mobile Number" style="border: 1px solid black; padding: left 5px;" class="form-control" id="">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="" class="col-sm-2 col-form-label text-dark">Address</label>
                   <div class="col-sm-10 mt-2">
                       <input type="text" name="address" placeholder="Enter your Location" style="border: 1px solid black; padding: left 5px;" class="form-control" id="">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="" class="col-sm-2 col-form-label text-dark">Class</label>
                   <div class="col-sm-10 mt-2">
                       <select name="qualification" id="" class="form-control" style="border: 1px solid black; padding: left 5px;">
                            <option value="1">Class 1</option>
                            <option value="2">Class 2</option>
                            <option value="3">Class 3</option>
                            <option value="4">Class 4</option>
                            <option value="5">Class 5</option>
                            <option value="6">Class 6</option>
                        </select>
                   </div>
               </div>
               <div class="form-group row">
                   
                   <div class="offset-sm-2 col-sm-10 mt-2">
                       <button class="btn btn-danger custom-btn" name="submit" type="submit">Submit</button>
                   </div>
               </div>
           </form>
    </div>
    <div class="col-md-5 table-responsive mt-5 ">
           <table class="table table-bordered">
               <thead class="bg-dark text-white">
                   <tr>
                       <th>Sr No</th>
                       <th>Class</th>
                       <th>Subject</th>
                       <th>Course Fees</th>
                       <th>Batch Start</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                        <td>1</td>
                       <td>Class 1</td>
                       <td>1 Year</td>
                       <td>$900</td>
                       <td>01/01/2022</td>
                   </tr>
                   <tr>
                        <td>2</td>
                       <td>Class 1</td>
                       <td>2 Year</td>
                       <td>$1900</td>
                       <td>01/01/2022</td>
                   </tr>
                   <tr>
                        <td>3</td>
                       <td>Class 2</td>
                       <td>1 Year</td>
                       <td>$1000</td>
                       <td>01/01/2022</td>
                   </tr>
                   <tr>
                        <td>4</td>
                       <td>Class 3</td>
                       <td>2 Year</td>
                       <td>$2900</td>
                       <td>01/01/2022</td>
                   </tr>
                   <tr>
                        <td>5</td>
                       <td>Class 1</td>
                       <td>1 Year</td>
                       <td>$900</td>
                       <td>01/01/2022</td>
                   </tr>
               </tbody>
           </table>
    </div>
    <div class="col-md-3 mt-5" >
        <h4>Address</h4>
        <address>
            Apex Academy <br>
            Honda Showroom <br>
            Dist : Nanded <br>
            Phone : 02339870012 <br>
            Mobile : 3456709512 <br>
        </address>
        <img class="img-fluid" src="images/slider1.jpg" alt="">
    </div>
</div>

<div class="container-fluid">    
    <div class="row bg-dark mt-2 m-0">        
            <?php include ('inc/footer.php') ?>               
    </div> 
</div>

