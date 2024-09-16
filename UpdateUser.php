<?php
$server= "localhost"; /* Address of the IONOS Database servers */
$user= "id22035291_admin"; /* Database Username */
$password= "P@ssw0rd"; /* Password */
$database= "id22035291_allyxir"; /* Name of the Database */
$table= "User"; /* Name of the table, can be freely chosen */

/* Access SQL Server and create the table */
$dbc = mysqli_connect($server,$user,$password);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, $database);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit();
}

$Id = mysqli_real_escape_string($dbc, $_GET['Id']);
$FirstName = mysqli_real_escape_string($dbc, $_GET['FirstName']);
$LastName = mysqli_real_escape_string($dbc,$_GET['LastName']);
$DOB = date('Y-m-d', strtotime(mysqli_real_escape_string($dbc,$_GET['DOB'])));
$Gender = mysqli_real_escape_string($dbc,$_GET['Gender']);
$Occupaction = mysqli_real_escape_string($dbc,$_GET['Occupation']);
$Smoker = mysqli_real_escape_string($dbc,$_GET['Smoker']);
$PetOwner = mysqli_real_escape_string($dbc,$_GET['PetOwner']);
$ZipCode = mysqli_real_escape_string($dbc,$_GET['ZipCode']);
$Email = mysqli_real_escape_string($dbc,$_GET['Email']);
$Mobile = mysqli_real_escape_string($dbc,$_GET['Mobile']);
$Password = mysqli_real_escape_string($dbc,$_GET['Password']);


$query = "UPDATE $table SET 
    FirstName = '$FirstName', 
    LastName = '$LastName', 
    DOB = STR_TO_DATE('$DOB', '%Y-%m-%d'), 
    Gender = '$Gender', 
    Occupation = '$Occupation', 
    Smoker = '$Smoker', 
    PetOwner = '$PetOwner', 
    ZipCode = '$ZipCode', 
    Email = '$Email', 
    Mobile = '$Mobile', 
    Password = '$Password' 
    WHERE Id = '$Id'";

$result = mysqli_query($dbc, $query) or trigger_error("Query MySQL Error: " . mysqli_error($dbc)); 

mysqli_close($dbc); 

?>