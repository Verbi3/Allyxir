<?php
$server= "localhost"; /* Address of the IONOS Database servers */
$user= "id22035291_admin"; /* Database Username */
$password= "P@ssw0rd"; /* Password */
$database= "id22035291_allyxir"; /* Name of the Database */
$table= "Symptom"; /* Name of the table, can be freely chosen */

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

$UserId = mysqli_real_escape_string($dbc, $_GET['UserId']);
$SymptomOn = mysqli_real_escape_string($dbc,$_GET['SymptomOn']);
$StartDate = date('Y-m-d', strtotime(mysqli_real_escape_string($dbc,$_GET['StartDate'])));
$EndDate = date('Y-m-d', strtotime(mysqli_real_escape_string($dbc,$_GET['EndDate'])));
$SymptomTypes = mysqli_real_escape_string($dbc,$_GET['SymptomTypes']);
$Severity = mysqli_real_escape_string($dbc,$_GET['Severity']);
$TakingMedicine = mysqli_real_escape_string($dbc,$_GET['TakingMedicine']);
$Note = mysqli_real_escape_string($dbc,$_GET['Note']);


$query = "INSERT INTO $table (UserId, SymptomOn, StartDate, EndDate, SymptomTypes, Severity, TakingMedicine, Note) 
    VALUES ('$UserId', '$SymptomOn', STR_TO_DATE('$StartDate', '%Y-%m-%d'), STR_TO_DATE('$EndDate', '%Y-%m-%d'), '$SymptomTypes', '$Severity', '$TakingMedicine', '$Note')";

$result = mysqli_query($dbc, $query) or trigger_error("Query MySQL Error: " . mysqli_error($dbc)); 

mysqli_close($dbc); 

?>