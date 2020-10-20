<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>

<?php


if(isset($_POST['create_domain'])){
$domain_id= $_POST['domain_Id'];
$domain_name=  $_POST['domain_name'];




$servername = "localhost:3306";
$username = "root";
$password = "9833@SHUb995";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql="insert into domain (domain_id,domain_name) values($domain_id,'$domain_name');";
$result = $conn-> query($sql);
$age=0;
if($result){


echo "<script type='text/JavaScript'>
     alert('Domain Created Successfully'); </script>";
}
else{

	echo "<script type='text/JavaScript'>
     alert('Domain not Available'); </script>";
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
<div><H1>New Domain</h1></div>
<div class="container">
<form action="admin_domain.php"  method="post">
   <div class="row">
    <div class="col-25">
      <label for="domain_Id">Allocated Domain Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="domain_Id" name="domain_Id" placeholder="Domain Id">
    </div>
	</div>








<div class="row">
    <div class="col-25">
      <label for="domain_name">Domain Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="domain_name" name="domain_name" placeholder="domain Name">
    </div>

</div>



  <div class="row">
    <input type="submit" name="create_domain" value="Create Domain">
  </div>
  </form>
</div>

</div>


</body>
</html>
