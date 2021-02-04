<html>

  <style>
    body {  
        border-style: double;
        color: rgb(117, 93, 62); 
        background: rgb(135, 185, 202);
        font-size :x-large;
    }
   </style>

<?php
 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$entered_pass=$_POST['password1'];

$sql = "SELECT* from user where email='".$_POST['email']."' and password= md5('".$entered_pass."')";
$sql1= "SELECT* from department;";
$result = $conn->query($sql);
$result1=$conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "welcome: " . $row["name"] . "<br>";
        while($row = mysqli_fetch_assoc($result1)) {
            echo "<br> Department Name: " . $row["name"]."<br>  Description: " . $row["description"]."<br>";
          }

        
    }
}

else {
  include('welcome.html');
  echo'Email or password is incorrect!';
}
$conn->close();
?>

</html>


