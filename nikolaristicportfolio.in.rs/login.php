<?php

$host="169.254.0.2:3306";
$user="nikolari_user";
$password="MgTh{(I+j5Nf";
$db="nikolari_user";

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="SELECT * FROM login WHERE username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["username"]=$username;

		header("location:index2.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["username"]=$username;
		
		header("location:index1.php");
	}

	else
	{
		echo "<script>alert('Uneli ste pogresne podatke, pokusajte ponovo!');</script>";
	}

}




?>









<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Login Form </title>
	<link rel="shortcut icon" type="image/png" href="slike/iconKt.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleL.css">
  </head>
  <body>

		<div class="center">
      <h1>Login</h1>
      <form method="post">

        <div class="txt_field">
          <input type="text"  name="username" required>
          <span></span>
          <label>Username</label>
        </div>

        <div class="txt_field">
          <input type="password"  name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        
        <input type="submit" value="Login">
		<button type="submit" class="kt"><a href="servisi.html">Kargo Trans Servisi</a></button>
       
      </form>
    
	</div>
  </body>
</html>


