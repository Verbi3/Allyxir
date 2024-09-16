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

$UserId = mysqli_real_escape_string($dbc,$_GET['UserId']);

$result = mysqli_query($dbc, "SHOW COLUMNS FROM $table");
$numberOfRows = mysqli_num_rows($result);
$csv_output = '';
if ($numberOfRows > 0) {

    $values = mysqli_query($dbc, "SELECT * FROM $table WHERE UserId='$UserId' ORDER BY StartDate DESC");
    while ($rowr = mysqli_fetch_row($values)) {
        $startMon = date('n', strtotime($rowr[3]));
        #echo "startMon".$startMon.$rowr[3];
        $endMon = date('n', strtotime($rowr[4]));
        #echo " endMon".$endMon.$rowr[4];
        #echo "\n";
        $medicineNum = $rowr[7];

        for ($j=$startMon;$j<=$endMon;$j++) {
            $csv_output .= $j.", ".$medicineNum.", ";
        }
    }
}

print $csv_output;
exit;

?>