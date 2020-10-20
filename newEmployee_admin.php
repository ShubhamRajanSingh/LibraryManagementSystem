<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>
<?php


if(isset($_POST['create_account'])){
$emp_id= $_POST['Emp_id'];
$first_name=$_POST['Efname'];
$last_name=$_POST['Elname'];
$bran_id=$_POST['Ebranch_id'];
$salary=$_POST['salary'];
$designation=$_POST['Designation'];
$password=$_POST['password'];




$servername = "localhost:3306";
$username = "root";
$password = "9833@SHUb995";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql="insert into employees (employee_id,first_name,last_name,branch_id,salary) values($emp_id,'$first_name','$last_name',$bran_id,$salary);";
$sqlm="insert into login (idlogin,password) values($emp_id,$password);";
$result = $conn-> query($sql);
$resultm = $conn-> query($sqlm);

if($result){
	if($designation=='manager'){

		$sqlm="update branch set manager_id=$emp_id where branch_id=$bran_id";
		$result1 = $conn-> query($sqlm);
	}


}
else{

	echo "<script type='text/JavaScript'>
     alert('Employee Id already Exist'); </script>";
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
<div><H1>New Employee Account</h1></div>
<div class="container">
  <form action="newEmployee_admin.php" method="post">

  <div class="row">
    <div class="col-25">
      <label for="Emp_id">Allocated Employee Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="Emp_id" name="Emp_id" placeholder="Employee_id">
    </div>
</div>
  <div class="row">
    <div class="col-25">
      <label for="Efname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="Efname" name="Efname" placeholder="first name">
    </div>

</div>

 <div class="row">
    <div class="col-25">
      <label for="Elname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="Elname" name="Elname" placeholder="last name">
    </div>
	</div>
 <div class="row">
    <div class="col-25">
      <label for="Ebranch_id">Branch Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="Ebranch_id" name="Ebranch_id" placeholder="Ebranch id">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="salary">salary</label>
    </div>
    <div class="col-75">
      <input type="number" id="salary" name="salary" placeholder="salary">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="password">Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="password" name="password" placeholder="password">
    </div>

</div>
<div class="row">
<div class="col-25">
      <label for="Designation">Designation</label>
    </div>
	 <div class="col-75">
      <select id="Designation" name="Designation">
    <option value="manager">Manager</option>
    <option value="librarian">Librarian</option>

  </select>
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
