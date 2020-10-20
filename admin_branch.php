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

<h1 >Branch</h1>

<table>
<tr>
<th>Branch Id</th>
<th>Manager Id</th>
<th>Address</th>
<th>Contacts</th>
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

$sql="select branch_id,manager_id,street,city,state,pincode,address from branch;";

//$sql="select * from employees";
$result = $conn-> query($sql);
   if($result-> num_rows > 0)
   {
	   while($row = $result -> fetch_assoc()){
		  echo "<tr><td>".$row["branch_id"]."</td><td>".$row["manager_id"]."</td><td>".$row["street"].",".$row["city"].",".$row["state"].",".$row["pincode"]."</td><td>";
		  $cal=$row["branch_id"];
		  $sqlm="select * from contacts where branch_branch_id=$cal;";
		  $resultm = $conn-> query($sqlm);

		  if($result-> num_rows > 0){
			  while($rows = $resultm -> fetch_assoc()){
			  echo $rows["phone_no"].",";
			  }
		  }
		  echo "</td></tr>";


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
