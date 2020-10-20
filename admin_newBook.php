<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>
<?php


if(isset($_POST['add_book'])){
$book_id= $_POST['book_Id'];
$book_name=$_POST['bname'];
$author=$_POST['author'];
$publisher=$_POST['publisher'];
$price=$_POST['price'];
$bran_id=$_POST['branch_id'];
$dom_id=$_POST['domain_id'];
$dis_id=$_POST['distributer_id'];


$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql="insert into books(books_id,books_name,author,publisher,price,branch_id,domain_id,distributer_id,availability)
values($book_id,'$book_name','$author','$publisher',$price,$bran_id,$dom_id,$dis_id,1);";
$result = $conn-> query($sql);

if($result){

echo "<script type='text/JavaScript'>
     alert('Book Added Successfully'); </script>";
}
else{
	//echo $conn -> error;
	echo "<script type='text/JavaScript'>
     alert('Error Occured'); </script>";
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
	<a href="contact.php">Add Contact</a>
</div>
<div class="content">
<div><H1>New Book</h1></div>
<div class="container">
<form action="admin_newBook.php"  method="post">
   <div class="row">
    <div class="col-25">
      <label for="book_Id">Allocated book Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="book_Id" name="book_Id" placeholder="Book Id">
    </div>
	</div>
  <div class="row">
    <div class="col-25">
      <label for="bname">Book Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="bname" name="bname" placeholder="Book name">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="author">Author</label>
    </div>
    <div class="col-75">
      <input type="text" id="author" name="author" placeholder="Author">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="publisher">Publisher Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="publisher" name="publisher" placeholder="publisher name">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="price">price</label>
    </div>
    <div class="col-75">
      <input type="number" id="price" name="price" placeholder="price ">
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
      <label for="domain_id">Domain Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="domain_id" name="domain_id" placeholder="domain id">
    </div>

</div>
<div class="row">
    <div class="col-25">
      <label for="distributer_id">Distributer Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="distributer_id" name="distributer_id" placeholder="Distributer id">
    </div>

</div>




  <div class="row">
    <input type="submit" name="add_book" value="Add Book">
  </div>
  </form>
</div>

</div>



</body>
</html>
