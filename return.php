<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>

<?php

if(isset($_POST['return'])){
$cust_id= $_POST['Customer_id'];
$emp_id=$_POST['return_Employee_id'];
$book_id=$_POST['Book_id'];
$returnDate=$_POST['Date_of_return'];



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

$sql="update issue_status set date_of_return='$returnDate',availability=1,return_employee_id=$emp_id where book_id=$book_id";
//$sql="select * from employees";
$sqlm="update books set availability= 1 where books_id=$book_id";
$result = $conn-> query($sql);
$resultm = $conn-> query($sqlm);

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
<div><H1>Return Book</h1></div>
<div class="container">
  <form action="return.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="Customer_id">Customer Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="Customer_id" name="Customer_id" placeholder="Customer id">
    </div>
</div>

 <div class="row">
    <div class="col-25">
      <label for="return_Employee_id">Employee Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="return_Employee_id" name="return_Employee_id" placeholder="Employee id">
    </div>
	</div>
	<div class="row">
    <div class="col-25">
      <label for="Book_id">Book Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="Book_id" name="Book_id" placeholder="Book id">
    </div>
	</div>
 <div class="row">
    <div class="col-25">
      <label for="Date_of_return">Return Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="Date_of_return" name="Date_of_return" placeholder="Return Date">
    </div>
	</div>

  <div class="row">
    <input type="submit" name="return" value="Return">
  </div>
  </form>
</div>

</div>


</body>
</html>
