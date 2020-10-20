<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>
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
<h1>Customers</h1>
<table>
<tr>
<th>Customer Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Branch Id</th>
<th>Age</th>

<th>Address</th>
</tr>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql="select customer_id,first_name,last_name,branch_id,age,street,city,state,pincode,address from customer;";
//$sql="select * from employees";
$result = $conn-> query($sql);
   if($result-> num_rows > 0)
   {
	   while($row = $result -> fetch_assoc()){
		  echo "<tr><td>".$row["customer_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["branch_id"]."</td><td>".$row["age"]."</td><td>".$row["street"].",".$row["city"].",".$row["state"].",".$row["pincode"]."</td></tr>";

	   }
	   echo "</table>";

   }
   else
   {
	   echo "0 result";
   }

$conn -> close();
?>
</table>



</div>

</body>
</html>
