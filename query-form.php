<?php

$outputText = "Function output displayed here";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $outputText = $_POST['functions']($conn);
} 

function insertStock($conn) {
    $ticker = $_POST['input1'];
    $type = $_POST['stockType'];
    $curr_price = $_POST['input2'];
    $prev_price = $_POST['input3'];
    $payout = $_POST['input4']; // only for dividends;
    $sql = "INSERT INTO STOCK 
                VALUES ($prev_price, '$ticker', $curr_price);";
    if ($type == "dividend") {
        $sql .= "INSERT INTO DIVIDEND VALUES ('$ticker', $payout)";
    }
    if ($type == "index") {
        $sql .= "INSERT INTO INDEX_CONTAINS_STOCKS VALUES('$ticker')";
    }
    $query = $conn->query($sql);
    if (!$query) {
            return "Invalid Input";
    }
    return "Inserted $ticker into database";
}

function selectStock($conn) {
    $ticker = $_POST['input1'];
    $query = $conn->query("SELECT * FROM STOCK WHERE Ticker='$ticker';");
    $row = $query->fetch();
    if (!$row) {
            return "Invalid Input";
    }
    return "$ticker Current Price: $" . $row['Current_Price'];
}

function deleteBot($conn) {

 
}

function modifyBot($conn) {
    $botID = $_POST['input1'];
    $status = strtoupper($_POST['input2']);
    $status_val = (int)($status == "TRUE");
    $query = $conn->query("UPDATE BOT
                            SET BOT_TESTED = $status_val
                            WHERE Bot_Id = $botID");
    if ($query) {
        return "bot #$botID tested status set to $status";
    } else {
        return "Invalid Input";
    }
}

function ownedStocks($conn) {
    $query = $conn->query("SELECT P.Ticker
                            FROM PORTFOLIO_CONTAINS P, STOCK S
                            WHERE P.Ticker = S.Ticker");
    if (!$query) {
        return "Error occurred when querying database";
    }
    $text = "Owned Stocks:&#13;&#10;";
    foreach ($query as $row) {
        $text .= $row['Ticker'] . "&#13;&#10;";
    }
    return $text;
}

function countIndexStocks($conn) {
    $index = $_POST['input1'];
    $query = $conn->query("SELECT COUNT(*)
                            FROM INDEX_CONTAINS_STOCKS S
                            WHERE S.Ticker = '$index';");
    $row = $query->fetch();
    // doesn't work properly
    if (!$row) {
        return "Invalid Input";
    }
    return "The $index index contains " . $row['COUNT(*)'] . " stocks";
}

?>