<?php



require_once("query-form.php");


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
$conn = sqlsrv_connect($serverName, $co


$sql = "SELECT * FROM BOT";
$result = $conn->query($sql);
$conn->close(); 

?>

<!doctype HTML>
<html>
<head>
    <title>Stock Databse</title>
    <script src="form-text.js"></script>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <section>
        <h1>TEST TEST</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>STOCK</th>
                <thPrevious Prices</th>
                <th>Ticker</th>
                <th>Current Price</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['Previous_Price_At'];?></td>
                <td><?php echo $rows['Ticker'];?></td>
                <td><?php echo $rows['Current_Price'];?></td>

            </tr>
            <?php
                }
             ?>
        </table>
    </section>
    <!--nav class="flex-container">
        <a href="./query-page.html"><div>Query Page</div></a>
        <a href="./function-management.html"><div>Function Management</div></a>
        <div>Data Modification</div>
        <div>Logout</div>
    </nav-->
    <header class="border">
        Stock Database Web Interface
    </header>

    <form action="./index.php" method="POST">
        <div class="flex-container">
            <div id="query-form">
            <div class="form-item">
                    <select name="functions" id="functions" onChange="dMenuChange()">
                        <option value="insertStock">Insert Stock</option>
                        <option value="deleteBot">Delete Bot</option>
                        <option value="modifyBot">Update Bot Tested Status</option>
                        <option value="ownedStocks">Find Stocks Owned by Bots</option>
                        <option value="selectStock">Get Stock Price</option>
                        <option value="countIndexStocks">Count stocks in Index</option>
                    </select>
                </div>
                <div class="form-item">
                    <label class="form-label" for="input1">Input 1: </label>
                    <input type="text" id="input1" name="input1">
                </div>
                <div class="form-item">
                    <label class="form-label" for="input2">Input 2: </label>
                    <input type="text" id="input2" name="input2">
                </div>
                <div class="form-item">
                    <label class="form-label" for="input3">Input 3:</label>
                    <input type="text" id="input3" name="input3">
                </div>
                <div class="form-item">
                    <label class="form-label" for="input4">Input 4:</label>
                    <input type="text" id="input4" name="input4">
                </div>
                <div class="form-item">
                    <select name="stockType">
                        <option value="stock">Regular Stock</option>
                        <option value="dividend">Dividend</option>
                        <option value="index">Index</option>
                    </select>
                </div>
                <div class="form-item">
                    <input id="submit-Btn" type="submit" value="submit">
                </div>
                <div class="form-item">
                    <p id="function-label">To insert stock, enter ticker in input 1, current price in input 2, 
                        prev price in input 2, and payout in input 3 if dividend stock. use the dropdown to select stock type.</p>
                </div>
            </div>
            <div id="output-area">
                <textarea rows="40" cols="70" readonly><?php echo $outputText ?>
                </textarea>
            </div>
        </div>  
    </form>
</body>
</html>
