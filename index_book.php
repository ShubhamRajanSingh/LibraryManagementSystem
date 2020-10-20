<!doctype html>
<html>
    <head>
        <title>EduLab</title>
         <link rel="stylesheet" href="style.css" type="text/css">
            <link rel="icon" href="img/icon.png"type="image/png">
			<style>
			table{
	border-collapse : collapse;
	width: 100%;
	color: #515A5A;
	font-family: monospace;
	font-size: 25px;
	text-align: left;

}
th{
	background-color: #515A5A;
	color: white;
}
tr:nth-child(even){background-color: #EAEDED }
			</style>

    </head>
<body style="background-color:#white; margin: 0px !important;">


<div class="topnav">



                               <a href="home_page.php" class="active">Home</a>
                                <a href="index_book.php">Books</a>
                                <a href="index_branch.php">Branches</a>
                                <a href="contacts.php">Contacts</a>
  <div class="topnav-right">
    <a href="login_page.php">Login</a>
    <a href="#about">About</a>
  </div>



</div>
    <div >


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

