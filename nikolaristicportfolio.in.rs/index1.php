<?php
    include "connection.php";
?>
<html lang="en">
<head>
  <title>Admin forma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/png" href="slike/iconKt.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Klasicna forma za upis novih korisnika</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="email">Firstname</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" >
    </div>
    <div class="form-group">
      <label for="pwd">Lastname</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
    </div>
    <div class="form-group">
      <label for="pwd">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Contact</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact">
    </div>
    



    
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    <button type="submit" name="update" class="btn btn-default">Update</button>
    <button type="submit" name="delete" class="btn btn-default">Delete</button>
    <button type="submit" name="logout" class="btn btn-default"><a href="login.php">Logout</a></button>
  </form>
</div>
</div>

<div class="col-lg-12">
<table class="table table-bordered">
    <thead>
      <tr>
      <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res=mysqli_query($link, "select * from table1");
      while($row=mysqli_fetch_array($res))

      {

        echo "<tr>";

        echo "<td>"; echo $row["id"]; echo "</td>";
        echo "<td>"; echo $row["firstname"]; echo "</td>";
        echo "<td>"; echo $row["lastname"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["contact"]; echo "</td>";
        echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>" ><button type="button" class="btn btn-success">Edit</button></a> <?php  echo "</td>";
        echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"];  ?> " ><button type="button" class="btn btn-danger">Delete</button></a> <?php  echo "</td>";


        echo "</tr>";


      }
      ?>
    </tbody>
  </table>

</div>


</body>



<!-- Odavde krece PHP za svako dugme (insert, delete, update) da se izvrsi definicija dugmica koje ce sta da radi, za svko dugme se navodi i uvezuje se sa tabelom iz baze podataka da u nju unosi ili brise ili menja vrednosti i opet unosi u istu  -->
<?php 
if(isset($_POST["insert"]))
{
    mysqli_query($link,"insert into table1 values (NULL, '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[contact]')");

    //ovaj loop ovde sam refresuje stranu kada se izvrsi neki od unosa u bazu podataka, da ne bi mi morali da radimo manuelno to svaki put. Takodje ovaj loop kopiramo posle svake opcije, tacnije da za svako dugme radi isto.
    ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php

}

if(isset($_POST["delete"]))

{
    mysqli_query($link, "delete from table1 where firstname='$_POST[firstname]'") or die (mysqli_error($link));
    ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php
}

if(isset($_POST["update"]))

{
    mysqli_query($link, "update table1 set firstname='$_POST[lastname]' where firstname='$_POST[firstname]'") or die (mysqli_error($link));
    ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php
}
?>
</html>