<?php


require_once("dbConn.php");
require_once("query-form.php");


?>

<!doctype HTML>
<html>
<head>
    <title>Stock Databse</title>
    <script src="form-text.js"></script>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
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
                    <label class="form-label" for="input3">Input 3: </label>
                    <input type="text" id="input3" name="input3">
                </div>
                <div class="form-item">
                    <input id="submit-Btn" type="submit" value="submit">
                </div>
            </div>
            <div id="output-area">
                <textarea rows="40" cols="70" readonly><?php echo $outputText ?>
            <?php
            $sql = "SELECT * FROM STOCK";
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['Previous_Price_At']."</td>";
                echo "<td>".$row['Ticker']."</td>";
                echo "<td>".$row['Current_Price']."</td>";
             }
            ?>
                </textarea>
            </div>
        </div>  
    </form>
</body>
</html>
