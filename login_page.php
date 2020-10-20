 <!doctype html>
<html lang="en">
    <head>
        <title>EduLab</title>

        <link rel="stylesheet" href="style2.css" type="text/css">



    </head>

 <body style="margin-top: 60px; text-align: center; background-color:#d0d0d0">

<div >

                   <form method="post">

                        <br>
                        <br>
                       <input style="   line-height: 1.5 !important ;
                        border-radius: .3rem !important;
                        box-shadow: 5px 5px #D0D0D0 !important; "type="text" name="ID" placeholder="Enter your ID ">
						<br>
						<br>
						<input style="   line-height: 1.5 !important ;
                        border-radius: .3rem !important;
                        box-shadow: 5px 5px #D0D0D0 !important; "type="password" name="password" placeholder="Enter your password ">
                        <br>
                        <br>
                        <button type="submit" name="submit" class="lightgreybutton"  ><a  style="color:#ffffff !important; text-decoration: none ; !important"  >LOG IN</a></button><br><br>
						 <button type="submit" name="cancel" class="lightgreybutton"  ><a  style="color:#ffffff !important; text-decoration: none ; !important"  >cancel</a></button><br><br>

                    </form>
       </div>
    </body>
</html>

<?php
if((isset($_POST["submit"])))
{
$servername = "localhost:3306";
$username = "root";
$password = "9833@SHUb995";

// Create connection
$conn = new mysqli($servername, $username, $password,"dbms_miniproject");



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
   $ID=$_POST["ID"];
   $pass=$_POST["password"];


   $sql="select idlogin,password from login where idlogin=$ID and password= '$pass';";
   $result = $conn-> query($sql);
 if($result-> num_rows > 0){


	    $sqlm="select  manager_id from branch where manager_id=$ID ";
	    $resultm = $conn-> query($sqlm);

         if($resultm-> num_rows > 0){
             echo"<script>window.open('admin_front.php','_self')</script>";

           }
        else{
             echo"<script>window.open('employee_front.php','_self')</script>";
            }
       }
    else
    {
        echo "<script>alert('Entered ID is wrong')</script>";
    }

	$ID = 0 ;
	$conn -> close();
 }
 if((isset($_POST["cancel"]))){
	  echo"<script>window.open('home_page.php','_self')</script>";
 }


?>
