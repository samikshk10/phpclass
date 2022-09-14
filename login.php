
<?php
if($_SERVER["REQUEST_METHOD"]=== "POST")
{
// print_r($_POST);

// $email=$_POST["email"];
// $password=$_POST["pass"];
// // echo $email."<br>".$password; 
//database create
 
$con=new mysqli('localhost','root','','phpclass');

if($con->connect_error)
{
die("$con->connect_error");
}
else{

$email=$_POST["email"];
$name=$_POST["name"];
$pass=$_POST["pass"];
//start login process
echo "connection success<br>";
$queryselect ="SELECT * from user where email='$email'";
$result=$con->query($queryselect);
if($result->num_rows >0)
{
echo ("<pre>");
print_r($result);
echo ("</pre>");
$rows=$result->fetch_assoc();
echo ("<pre>");
print_r($rows);
echo ("</pre>");

$dbemail=$rows['email'];
$dbpass=$rows['password'];

if($pass===$dbpass)
{
    echo ("password success");
}
else{
    echo "failed";
}
}
else{
    echo "login failed";
 }



// echo $dbemail;

}

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" placeholder="Enter your name" id="name"><br><br>
    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="Enter your email" id="email"><br><br>
    <label for="password">Password:</label>
    <input type="password"  placeholder="Enter your password" name="pass" id="password"><br><br>
    <button type="submit">Submit</button>
    </form>

    

</body>
</html>



