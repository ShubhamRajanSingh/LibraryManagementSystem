<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link   type="text/css"    rel="stylesheet"  href="style.css"/>
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
<h1>Search</h1>
<form action="employee_search.php"  method="post">
 <div class="row">
    <div class="col-25">
      <label for="id">Id</label>
    </div>
    <div class="col-75">
      <input type="number" id="id" name="id" placeholder="id">
    </div>

</div>
<div class="row">
<div class="col-25">
      <label for="search_in">Search In</label>
    </div>
	 <div class="col-75">
      <select id="search_in" name="search_in">
	<option value="Book">Book</option>
    <option value="domain">Domain</option>
    <option value="issued_status">Issued-Status</option>


  </select>
    </div>
	<div class="row">
    <input type="submit" name="search" value="search">
  </div>
</div>
</form>
<table>
<?php



if(isset($_POST['search'])){


	  $servername = "localhost:3306";
      $username = "root";
      $password = "9833@SHUb995";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	$id=$_POST['id'];
	$search_in=$_POST['search_in'];
	if($search_in=="Book"){

	echo "<tr>";
      echo "<th>Book Id</th>";
   echo "<th>Book Name</th>";
   echo "<th>Author</th>";
    echo "<th>Publisher</th>";
   echo "<th>Price</th>";
   echo "<th>Branch Id</th>";
   echo "<th>Availability</th>";
   echo "</tr>";
	$sql="select books_id,books_name,author,publisher,price,branch_id,availability from books where books_id=$id ";

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
	}

	else if($search_in=="domain"){

		echo "<tr>";
      echo "<th>Book Id</th>";
   echo "<th>Book Name</th>";
   echo "<th>Author</th>";
    echo "<th>Publisher</th>";
   echo "<th>Price</th>";
   echo "<th>Branch Id</th>";
   echo "<th>Availability</th>";
   echo "</tr>";
		$sql="select books_id,books_name,author,publisher,price,branch_id,availability from books where domain_id=$id ";

   $result = $conn-> query($sql);
   if($result-> num_rows > 0)
   {
	   while($row = $result -> fetch_assoc()){
		  echo "<tr><td>".$row["books_id"]."</td><td>".$row["books_name"]."</td><td>".$row["author"]."</td><td>".$row["publisher"]."</td><td>".$row["price"]."</td><td>".$row["branch_id"]."</td><td>".$row["availability"]."</td></tr>";

	   }
	   echo "</table>";

   }
   else
   {
	   echo "0 result";
   }

		$conn -> close();

	}
	else if($search_in=="issued_status"){
			echo "<tr>";
			 echo "<th>Customer Id</th>";
      echo "<th>Book Id</th>";
   echo "<th>Issue Date</th>";
   echo "<th>Return Date</th>";
    echo "<th>Employee Issued</th>";
   echo "<th>Employee Returned</th>";

   echo "<th>Availability</th>";
   echo "</tr>";

			$sql="select customer_customer_id,book_id,date_of_issue,date_of_return,issue_employee_id,return_employee_id,availability from issue_status where book_id=$id ";

   $result = $conn-> query($sql);
   if($result-> num_rows > 0)
   {
	   while($row = $result -> fetch_assoc()){
		  echo "<tr><td>".$row["customer_customer_id"]."</td><td>".$row["book_id"]."</td><td>".$row["date_of_issue"]."</td><td>".$row["date_of_return"]."</td><td>".$row["issue_employee_id"]."</td><td>".$row["return_employee_id"]."</td><td>".$row["availability"]."</td></tr>";

	   }
	   echo "</table>";

   }
   else
   {
	   echo "0 result";

	}
	$conn -> close();
	}
	else{
		echo "<script type='text/JavaScript'>
     alert('Not Found'); </script>";
	}
}





?>
</table>


</div>

</body>
</html>
