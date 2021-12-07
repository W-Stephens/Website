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
    <!--nav class="flex-container">
        <a href="./query-page.html"><div>Query Page</div></a>
        <a href="./function-management.html"><div>Function Management</div></a>
        <div>Data Modification</div>
        <div>Logout</div>
    </nav-->
    <header class="border">
        Stock Database Web Interface
    </header>

    <form action="." method="POST">
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
