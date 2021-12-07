
function dMenuChange() {
    switch (document.getElementById("functions").value) {
        case "insertStock":
            hideInputs(5);
            break;
        case "deleteBot":
            hideInputs(1);
            break;
        case "modifyBot":
            hideInputs(2);
            break;
        case "ownedStocks":
            hideInputs(0);
            break;
        case "selectStock":
            hideInputs(1);
            break;
        case "countIndexStocks":
            hideInputs(1);
            break;
    }
}

function hideInputs(num) {
    elements = document.getElementsByClassName("form-item");
    for (let i = 0; i < num + 1; i++) {
        elements[i].style.display = "revert";
    }
    for (let i = num + 1; i < elements.length - 1; i++) {
        elements[i].style.display = "none";
    }
}