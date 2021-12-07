<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:wstephensprojects.database.windows.net,1433; Database = ProjectGroup28", "WStephens", "{Group28admin}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "WStephens", "pwd" => "{Group28admin}", "Database" => "ProjectGroup28", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:wstephensprojects.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
