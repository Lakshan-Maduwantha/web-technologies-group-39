<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'blood_donation';

    $connection = mysqli_connect('localhost' , 'root' , '' , 'blood_donation');

    if(mysqli_connect_errno()){
        die('Database connection failed' . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search for Blood</title>
        <link rel="stylesheet" href="ConUs.css">
        <link rel="stylesheet" href="StyleRec.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
           
          
            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="Home.html">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Donator.php">Donator</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="receiver.php">Receiver</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Contact Us.html">Contact Us</a>
                </li>  
                <li class="nav-item">
                  <a class="nav-link" href="About Us.html">About Us</a>
                </li> 
              </ul>
             
            </div>
          </nav>
          <br>


          <div class="container">
            <center> 
              <h1>Search Box</h1>
            </center>

            <form action="receiver.php" method="post">
              <div class="form-group">
                <label for="b_group">Blood Group:</label> 
                <select class="form-control" id="b_group" name="b_group" aria-describedby="b_groupHelp" ng-model="contact.b_group" ng-required="true">
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                  
                 </select>

              </div>

              <div class="form-group">
                <label for="District">District</label>
                <select class="form-control" id="District" name="District" aria-describedby="DistrictHelp" ng-model="contact.District" ng-required="true">
                  <option value="all">All</option>  
                  <option value="Ampara">Ampara</option>
                  <option value="Anuradhapura">Anuradhapura</option>
                  <option value="Batticaloa">Batticaloa</option>
                  <option value="Badulla">Badulla</option>
                  <option value="Colombo">Colombo</option>
                  <option value="Galle">Galle</option>
                  
                  <option value="Gampaha">Gampaha</option>
                  <option value="Hambantota">Hambantota</option>
                  <option value="Jaffna">Jaffna</option>
                  <option value="Kalutara">Kalutara</option>
                  <option value="Kandy">Kandy</option>
                  <option value="Kegalle">Kegalle</option>
                  <option value="Kilinochchi">Kilinochchi</option>
                  <option value="Kurunegala">Kurunegala</option>
                  <option value="Mannar">Mannar</option>
                  <option value="Matale">Matale</option>
                  <option value="Matara">Matara</option>
                  <option value="Monaragala">Monaragala</option>
                  <option value="Mullaitivu">Mullaitivu</option>
                  <option value="Nuwara Eliya">Nuwara Eliya</option>
                  <option value="Polonnaruwa">Polonnaruwa</option>
                  <option value="Puttalam">Puttalam</option>
                  <option value="Ratnapura">Ratnapura</option>
                  <option value="Trincomalee">Trincomalee</option>
                  <option value="Vavuniya">Vavuniya</option>
                 </select>
               
              </div>
              <br>
              <button type="Search" class="btn btn-info btn-block" ng-disabled="contactForm.$invalid" name="search">Search</button>
            </form>
              
          </div>

    <?php

        $b_group = '' ;
        $district = '' ;

        if(isset($_POST['search'])){
            $b_group = $_POST['b_group'];
            $district = $_POST['District'];
  
            $b_group = mysqli_real_escape_string($connection, $_POST['b_group']);
            $district = mysqli_real_escape_string($connection, $_POST['District']);

            $sql3="SELECT * FROM donator WHERE blood_group LIKE '%$b_group%' AND district LIKE '%$district%' ";
            $result2 = mysqli_query($connection, $sql3);
            $resultcheck2 = mysqli_num_rows($result2);

            if($resultcheck2 > 0){
                while($row2 = mysqli_fetch_assoc($result2)){
           
                   echo "<div>
                    "."Name  : ".$row2['first_name']." ".$row2['last_name']."
                    <br>"."NIC  :".$row2['NIC']."
                    <br>"."Contact number :" .$row2['contact_number']."
                    <br>"."DOB  :".$row2['dob']."
                    <br>"."Address  :" .$row2['no']." , ". $row2['street']."
                    <br>"."Town  :" .$row2['city']."
                    <br>"."Email  : " .$row2['email_address']."<hr>
                    </div>";
  
                  }
                
            }

        }

    ?>

    </body>
</html>