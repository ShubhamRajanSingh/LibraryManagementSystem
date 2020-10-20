<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>

<?php


if(isset($_POST['create_contact'])){
$contact= $_POST['contact'];
$bran_id=$_POST['branch_Id'];





$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql="insert into contacts(phone_no,branch_branch_id) values($contact,$bran_id);";
$result = $conn-> query($sql);

if($result){


echo "<script type='text/JavaScript'>
     alert('Contact Added'); </script>";
}
else{

	echo "<script type='text/JavaScript'>
     alert('Branch does not exist'); </script>";
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
<div><H1>New Branch Contact</h1></div>
<div class="container">
<form action="contact.php"  method="post">
   <div class="row">
    <div class="col-25">
      <label for="branch_Id"> Branch Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="branch_Id" name="branch_Id" placeholder="Branch Id">
    </div>
	</div>


 <div class="row">
    <div class="col-25">
      <label for="contact">Phone Number</label>
    </div>
    <div class="col-75">
      <input type="number" id="contact" name="contact" placeholder="contact ">
    </div>
</div>




  <div class="row">
    <input type="submit" name="create_contact" value="Create contact">
  </div>
  </form>
</div>

</div>


</body>
</html>
