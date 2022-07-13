<?php
$connection = mysqli_connect('localhost', 'root','', 'prestashop');    
    
   if(!$connection) {
        die("Database connection failed");
           }

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    //SQL Injection
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);



    //For password encription 
    $hashFormat ="$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt =  $hashFormat . $salt;
    $password = crypt($password,  $hashF_and_salt);


$query = "INSERT INTO ps_button (email,password)" ;
$query .= "VALUES('$email', '$password')";

$result = mysqli_query($connection, $query);
if(!$result){
    die('QUERY FAILED' . mysqli_error($connection));
}

}
?>
