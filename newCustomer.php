<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>

<?php


if(isset($_POST['create_account'])){
$cust_id= $_POST['ECust_Id'];
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$bran_id=$_POST['branch_id'];

$dob=$_POST['Date_of_Birth'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$address=$street.",".$city.",".$state.",".$pincode;
$age=0;



$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql="insert into customer (customer_id,first_name,last_name,branch_id,dob,age,street,city,state,pincode,address) values($cust_id,'$first_name','$last_name',$bran_id,'$dob',$age,'$street','$city','$state',$pincode,'$address');";
$result = $conn-> query($sql);

if($result){


$bday = new DateTime($dob);
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
$age= $diff->y;
$sqlm="update customer set age=$age where customer_id=$cust_id";

$resultm = $conn-> query($sqlm);
echo "<script type='text/JavaScript'>
     alert('Customer Created Successfully'); </script>";
}
else{

	echo "<script type='text/JavaScript'>
     alert('User Id not Available'); </script>";
}
$conn -> close();
}

?>



</head>
<body>
<div class="sidebar">
  <a class="active" href="emplyoyee_book.php">Books</a>
  <a href="employee_branch.php">Branch</a>
  <a href="issue.php">Issue</a>
  <a href="return.php">Return</a>
  <a href="employee_customer.php">Customer Deatils</a>
  <a href="newCustomer.php">New Customer</a>
  <a href="employee_search.php">Search</a>
</div>

<div class="content">
<div><H1>New Customer Account</h1></div>
<div class="container">
  <form action="newCustomer.php"  method="post">
   <div class="row">
    <div class="col-25">
      <label for="ECust_Id">Allocated Customer Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="ECust_Id" name="ECust_Id" placeholder="Customer Id">
    </div>
	</div>
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" placeholder="first name">
    </div>

</div>

 <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lname" placeholder="last name">
    </div>
	</div>
 <div class="row">
    <div class="col-25">
      <label for="branch_id">Branch Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="branch_id" name="branch_id" placeholder="branch id">
    </div>

</div>

 <div class="row">
    <div class="col-25">
      <label for="Date_of_Birth">Date Of Birth</label>
    </div>
    <div class="col-75">
      <input type="date" id="Date_of_Birth" name="Date_of_Birth" >
    </div>
	</div>
<div class="row">
    <div class="col-25">
      <label for="Address">Address Details:</label>
    </div>

	</div>

<div class="row">
    <div class="col-25">
      <label for="street">Street</label>
    </div>
    <div class="col-75">
      <input type="text" id="street" name="street" placeholder=" street">
    </div>

</div>
	<div class="row">
    <div class="col-25">
      <label for="city">City</label>
    </div>
    <div class="col-75">
      <input type="text" id="city" name="city" placeholder="city">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="state">State</label>
    </div>
    <div class="col-75">
      <input type="text" id="state" name="state" placeholder="state">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="pincode">Pincode</label>
    </div>
    <div class="col-75">
      <input type="number" id="pincode" name="pincode" placeholder="pincode">
    </div>

</div>

  <div class="row">
    <input type="submit" name="create_account" value="Create Account">
  </div>
  </form>
</div>

</div>


</body>
</html>
