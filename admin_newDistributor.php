<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>

<?php


if(isset($_POST['create_account'])){
$dist_id= $_POST['Distributor_Id'];
$dist_name=$_POST['Dname'];
$bran_id=$_POST['branch_id'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$address=$street.",".$city.",".$state.",".$pincode;




$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql="insert into distributers (distributer_id,Distributer_name,branch_branch_id,street,city,state,pincode,address) values($dist_id,
'$dist_name',$bran_id,'$street','$city','$state',$pincode,'$address');";
$result = $conn-> query($sql);

if($result){

echo "<script type='text/JavaScript'>
     alert('Distributor Created Successfully'); </script>";
}
else{

	echo "<script type='text/JavaScript'>
     alert('Distributor Id not Available'); </script>";
}
$conn -> close();
}

?>
</head>
<body>

<div class="sidebar">
  <a class="active" href="admin_book.php">Books</a>
  <a href="admin_branch.php">Branch</a>
  <a href="issue_admin.php">Issue</a>
  <a href="return_admin.php">Return</a>
  <a href="admin_customer.php">Customer Deatils</a>
  <a href="admin_employee.php">Employee Deatils</a>
  <a href="newCustomer_admin.php">New Customer</a>
  <a href="newEmployee_admin.php">New Employee</a>
  <a href="admin_newBranch.php">New Branch</a>
  <a href="admin_newBook.php">Add Book</a>
  <a href="admin_domain.php">Add Domain</a>
  <a href="admin_newDistributor.php">Add Distributor</a>
  <a href="admin_search.php">Search</a>
  <a href="contact.php">Add Contact</a>
</div>
<div class="content">
<div><H1>New Distributor Account</h1></div>
<div class="container">
<form action="admin_newDistributor.php"  method="post">
   <div class="row">
    <div class="col-25">
      <label for="Distributor_Id">Allocated Distributor Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="Distributor_Id" name="Distributor_Id" placeholder="Distributor Id">
    </div>
	</div>
  <div class="row">
    <div class="col-25">
      <label for="Dname">Distributor Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="Dname" name="Dname" placeholder="Distributor name">
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
