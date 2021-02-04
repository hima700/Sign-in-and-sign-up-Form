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

$new_pass=$_POST['password'];

$sql = "INSERT INTO user (name, email, password)
VALUES ('".$_POST["name"]."','".$_POST["email"]."', md5('".$new_pass."'));";

$sql1= "SELECT* from department;";
$result1=$conn->query($sql1);

if ($conn->query($sql) === TRUE) {
  
    $msg="User registered successfully!";
    echo '<p>'.$msg.'</p>';
    echo "welcome: " . $_POST["name"] . "<br>";
    while($row = mysqli_fetch_assoc($result1)) {
      echo "<br> Department Name: " . $row["name"]."<br>  Description: " . $row["description"]."<br>";
    }
} 

else {
     include('welcome.html');
     $msg='Email Already exists!';
     echo '<p style="margin-left:770px;">'.$msg.'</p>';
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
  
</html>