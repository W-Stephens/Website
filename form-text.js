
function dMenuChange() {
    text = "To insert stock, enter ticker in input 1, current price in input 2, prev price in input 2, and payout in input 3 if dividend stock. use the dropdown to select stock type."
    switch (document.getElementById("functions").value) {
        case "insertStock":
            hideInputs(5);
            break;
        case "deleteBot":
            text = "";
            hideInputs(1);
            break;
        case "modifyBot":
            text = "";
            hideInputs(2);
            break;
        case "ownedStocks":
            text = "";
            hideInputs(0);
            break;
        case "selectStock":
            text = "";
            hideInputs(1);
            break;
        case "countIndexStocks":
            text = "";
            hideInputs(1);
            break;
    }
    document.getElementById("function-label").innerHTML = text;

}

function hideInputs(num) {
    elements = document.getElementsByClassName("form-item");
    for (let i = 0; i < num + 1; i++) {
        elements[i].style.display = "revert";
    }
    for (let i = num + 1; i < elements.length - 2; i++) {
        elements[i].style.display = "none";
    }
}