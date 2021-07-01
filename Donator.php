<?php session_start(); ?>
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

<?php

	function verify_query($result_set) {

		global $connection;

		if (!$result_set) {
			die("Database query failed: " . mysqli_error($connection));
		}

	}

	function is_email($email)
	{
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
	}
?>

<?php

	$errors = array();
	$NIC = '';
	$First_Name = '';
	$Last_Name = '';
	$DOB = '';
  $Blood_Group = '';
	$Contact_Number = '';
	$No = '';
  $Street = '';
	$City = ''; 
	$District = '';
  $email = ''; 
	$check_me = '';
    
	if (isset($_POST['submit'])) {

		$NIC= $_POST['NIC'];
		$First_Name = $_POST['FirstName'];
		$Last_Name = $_POST['LastName'];
		$DOB = $_POST['Dob'];
    $Blood_Group = $_POST['b_group'];
		$Contact_Number =$_POST['ContactNo'];
		$No = $_POST['No'];
    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $District = $_POST['District'];
    $email = $_POST['Email'];
    $check_me = $_POST['check_me'];
  
		$NIC = mysqli_real_escape_string($connection, $_POST['NIC']);
		$First_Name = mysqli_real_escape_string($connection, $_POST['FirstName']);
    $Last_Name = mysqli_real_escape_string($connection, $_POST['LastName']);
    $DOB = mysqli_real_escape_string($connection, $_POST['Dob']);
    $Blood_Group = mysqli_real_escape_string($connection, $_POST['b_group']);
    $Contact_Number = mysqli_real_escape_string($connection, $_POST['ContactNo']);
    $No = mysqli_real_escape_string($connection, $_POST['No']);
    $Street = mysqli_real_escape_string($connection, $_POST['Street']);
    $City = mysqli_real_escape_string($connection, $_POST['City']);
    $District = mysqli_real_escape_string($connection, $_POST['District']);
    $email = mysqli_real_escape_string($connection, $_POST['Email']);
    $check_me = mysqli_real_escape_string($connection, $_POST['check_me']);

		$query = "INSERT INTO donator( ";
		$query .= "NIC , first_name, last_name , 	dob , blood_group ,contact_number , no , street ,city ,district ,email_address , check_me";
		$query .= ") VALUES (";
		$query .= "'{$NIC}' , '{$First_Name}', '{$Last_Name}' , '{$DOB}' , '{$Blood_Group}' , '{$Contact_Number}' , '{$No}' , '{$Street}', '{$City}', '{$District}' , '{$email}' , '{$check_me}'";
		$query .= ")";
        
		$result = mysqli_query($connection, $query);

		if ($result) {
			// query successful... redirecting to users page
			header('Location: home.html?user_added=true');
		} else {
			$errors[] = 'Failed to add the new record.';
        
		}

	}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <title>Registration Form</title>
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
    
   
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center login-row">
          <div class="login-form shadow">
         
            <form name="contactForm" novalidate action="Donator.php" method="post">
              <div class="form-group">
                <h2 style="color:rgb(18, 73, 105);">Registration Form</style></h2>
                <br>
                <label for="NIC">NIC No:</label>
                <input type="text" class="form-control" id="NIC" name="NIC" aria-describedby="NICHelp" placeholder="Enter NIC" ng-model="contact.NIC" ng-required="true">
                <div ng-show="contactForm.LastName.$touched  && contactForm.LastName.$Invalid">
                  <small style="color: red; display:block; text-align: center;">Enter a valid NIC No:</small>            
                </div>
                <br>

                <label for="FirstName">First Name</label>
                
              <input type="text" class="form-control" id="FirstName" name="FirstName" aria-describedby="FirstNameHelp" placeholder="Enter FirstName"ng-model="contact.FirstName" ng-required="true"/> 
              <div ng-show="contactForm.LastName.$touched  && contactForm.LastName.$Invalid">
                <small style="color: red; display:block; text-align: center;">Enter a valid name</small>
 
              </div>
            </div>
              <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" class="form-control" id="LastName" name="LastName" aria-describedby="LastNameHelp" placeholder="Enter LastName" ng-model="contact.LastName" ng-required="true"> 
             <div ng-show="contactForm.LastName.$touched  && contactForm.LastName.$Invalid">
               <small style="color: red; display:block; text-align: center;">Enter a valid name</small>

             </div>
                
              </div>
              
              
          
              <div class="form-group">
                <label for="Dob">Date of Birth:</label>
                <input type="date" class="form-control" id="Dob" name="Dob" aria-describedby="DobHelp" ng-model="contact.Dob" ng-required="true"> 
              </div>
              <div class="form-group">
                <label for="b_group">Blood Group:</label> 
                <select name="b_group" class="form-control" id="b_group" name="b_group" aria-describedby="b_groupHelp" ng-model="contact.b_group" ng-required="true">
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
              <label for="ContactNo">Contact Number</label>
             
              <input type="Number" class="form-control" id="ContactNo"name="ContactNo" aria-describedby="ContactNoHelp" placeholder="Enter Contact Number" ng-model="contact.ContactNo" ng-required="true"> 
            </div>

            <div class="form-group">
              <label for="Address">Address</label><br>
              <label for="No">No:</label>
              <input type="text" class="form-control" id="No" name="No" aria-describedby="NoHelp" placeholder="Enter No"ng-model="contact.No" ng-required="true"/>
              
              <label for="Street">Street:</label>
              <input type="text" class="form-control" id="Street" name="Street" aria-describedby="StreetHelp" placeholder="Enter Street"ng-model="contact.Street" ng-required="true"/>
             
              <label for="City">City:</label>
              <input type="text" class="form-control" id="City" name="City" aria-describedby="CityHelp" placeholder="Enter City"ng-model="contact.City" ng-required="true"/>
          </div>
            
              <div class="form-group">
                <label for="District">District</label>
                <select name="District" class="form-control" id="District" name="District" aria-describedby="DistrictHelp" ng-model="contact.District" ng-required="true">
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
              
 
                <div class="form-group">
                  <label for="Email">Email address</label>
                  <input type="email" class="form-control" id="Email1" name="Email" aria-describedby="emailHelp" placeholder="Enter email" ng-model="contact.email" ng-required="true">
                  
                  <div ng-show="contactForm.LastName.$touched  && contactForm.LastName.$Invalid">
                    <small style="color: red; display:block; text-align: center;">Enter a valid Address</small>
     
                  </div><small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                
                <fieldset class="form-group">
      <legend>Checkboxes</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="check_me" checked="check_me">
          Option one is this and that—be sure to include why it's great
        </label>
      </div>
    </fieldset>
                <button type="submit" class="btn btn-info btn-block"name="submit" ng-disabled="contactForm.$invalid">Submit</button>
              </form>
          </div>
          




          
        
        </div>
      </div>
      <style>
        body{
              background: url(DonBack.jpg);
              background-size: cover;
              font-size :large;
              font-weight:bolder;
          }
          .login-row{
              height: 100vh;
          }
          .login-form{
              width: 500px;
              background-color: rgba(0, 0, 0, 0.5);
              padding: 20px;
              margin-top: 40px;
              margin-bottom: 50px;

          }
          input.ng-invalid, textarea.ng-invalid{
            border: 2px solid red;
          }
          input[disabled=":disabled"]{
            opacity: 0.4;
            cursor: not-allowed !important;


                      }

      </style>
  </body>
</html>
   
