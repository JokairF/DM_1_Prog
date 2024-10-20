window.onload = function () {
    document.getElementById("calculateButton").onclick = calculate;
    document.getElementById("clearButton").onclick = clearCalculator;
};

function calculate() {
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    const operation = document.getElementById("operation").value;
    let result;

    if (isNaN(num1) || isNaN(num2)) {
        result = "Veuillez entrer des valeurs numériques valides.";
    } else {
        switch (operation) {
            case "add":
                result = num1 + num2;
                break;
            case "subtract":
                result = num1 - num2;
                break;
            case "multiply":
                result = num1 * num2;
                break;
            case "divide":
                result = num2 !== 0 ? num1 / num2 : "Division par zéro impossible.";
                break;
            default:
                result = "Opération non valide.";
        }
    }

    document.getElementById("result").innerText = `Résultat: ${result}`;
}

function clearCalculator() {
    document.getElementById("num1").value = "";
    document.getElementById("num2").value = "";
    document.getElementById("result").innerText = "";
}
