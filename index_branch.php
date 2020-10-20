<!doctype html>
<html>
    <head>

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

