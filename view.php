<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>home-page</title>
  </head>
  <body>
     <?php require 'nav.php' ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "EVENTDETAILS";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
//if (!$conn){
    //die("Sorry we failed to connect: ". mysqli_connect_error());
//}
//else{
    //echo "Connection was successful<br>";
//}

$sql = "SELECT * FROM `eventtable`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);
echo $num;
echo " records of Event details found<br>";
?>
<table class="table table-striped table-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Event-Name</th>
      <th scope="col">Event-Location</th>
      <th scope="col">Start-Date-Time</th>
      <th scope="col">End-Date-Time</th>
      <th scope="col">Type-Of-Event</th>
      <th scop="col" colspan=2 class="text-center">Action</th>
    </tr>

<?php 
  while($row = mysqli_fetch_assoc($result)): ?>
    <?php $id=$row['id']; ?> 
<tbody>
    <tr>
      <td><?php echo $row['id']; ?> </td>
      <td><?php echo $row['eventname']; ?> </td>
      <td><?php echo $row['eventlocation']; ?> </td>
      <td><?php echo $row['startdatetime']; ?> </td>
      <td><?php echo $row['enddatetime']; ?> </td>
      <td><?php echo $row['typeofevent']; ?> </td>
  <?php echo "<td>
      <a href='edit.php?id=$id'><button type='button'class='btn btn-warning'>EDIT</button></a>
    </td>"; ?>
    <?php echo "<td>
      <a href='delete.php?id=$id'><button type='button'class='btn btn-danger'>DELETE</button></a>
    </td>"; ?>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>