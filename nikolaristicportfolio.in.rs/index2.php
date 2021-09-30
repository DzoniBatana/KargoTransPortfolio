<?php
    include "connection.php";
?>
<html lang="en">
<head>
  <title>Korisnicka forma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/png" href="slike/iconKt.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="col-lg-12">
<table class="table table-bordered">
    <thead>
      <tr>
      <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        
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
       


        echo "</tr>";


      }
      ?>
    </tbody>
  </table>

  <button type="submit" name="logout" class="btn btn-default"><a href="login.php">Logout</a></button>

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