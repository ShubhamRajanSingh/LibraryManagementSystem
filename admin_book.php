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

<h1>Books</h1>
<table>
<tr>
<th>Book Id</th>
<th>Book Name</th>
<th>Author</th>
<th>Publisher</th>
<th>Price</th>
<th>Branch Id</th>
<th>Availability</th>
</tr>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "9833@SHUb995";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql="select books_id,books_name,author,publisher,price,branch_id,availability from books";
//$sql="select * from employees";
$result = $conn-> query($sql);
   if($result-> num_rows > 0)
   {
	   while($row = $result -> fetch_assoc()){
		     if($row["availability"]==1)
		   {
			   $m="available";
		   }
		   else
		   {
			   $m="not available";
		   }
		  echo "<tr><td>".$row["books_id"]."</td><td>".$row["books_name"]."</td><td>".$row["author"]."</td><td>".$row["publisher"]."</td><td>".$row["price"]."</td><td>".$row["branch_id"]."</td><td>".$m."</td></tr>";

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
