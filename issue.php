<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>
<?php

if(isset($_POST['issue'])){
$cust_id= $_POST['Customer_id'];
$emp_id=$_POST['issue_Employee_id'];
$book_id=$_POST['Book_id'];
$issueDate=$_POST['Date_of_issue'];



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

$sqln="select availability from books where books_id=$book_id;";
$result = $conn-> query($sqln);

$row = $result -> fetch_assoc();
if($row["availability"]!=0){

$sql="insert into issue_status(customer_customer_id,issue_employee_id,book_id,date_of_issue,availability)values('$cust_id','$emp_id','$book_id','$issueDate',0)";
//$sql="select * from employees";
$sqlm="update books set availability= 0 where books_id=$book_id";
$result = $conn-> query($sql);
$resultm = $conn-> query($sqlm);
}
else{
	echo "<script type='text/JavaScript'>
     alert('Book Not Available'); </script>";

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
<div><H1>Issue Book</h1></div>
<div class="container">
  <form action="issue.php" method="post">
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
      <label for="issue_Employee_id">Employee Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="issue_Employee_id" name="issue_Employee_id" placeholder="Employee id">
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
      <label for="Date_of_issue">Issue Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="Date_of_issue" name="Date_of_issue" placeholder="Issue Date">
    </div>
	</div>

  <div class="row">
    <input type="submit" name="issue" value="Issue">
  </div>
  </form>
</div>

</div>


</body>
</html>
