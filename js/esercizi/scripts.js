function hideEx() {
    document.getElementById("esercizio1").style.display = "none";
    document.getElementById("esercizio2").style.display = "none";
    document.getElementById("esercizio3").style.display = "none";
    document.getElementById("esercizio4").style.display = "none";
}

function printTabellina() {
    let table = document.createElement('table');
    table.setAttribute('class', 'table');
    let row = table.insertRow(0);
    for (let i = 1; i <= 10; i++) {
        for (let j = 1; j <= 10; j++) {
            let text = document.createTextNode(i * j);
            let cell = row.insertCell(j - 1);
            cell.setAttribute('align', 'center')
            cell.appendChild(text);
        }
        row = table.insertRow(i)
    }
    document.getElementById("tabellina").appendChild(table);
}

class Calcolatrice {
    constructor(operando1, operando2) {
        this.operando1 = operando1;
        this.operando2 = operando2;
    }

    sum() {
        document.getElementById("result").innerText = "Risultato: " + (this.operando1 + this.operando2);
    }

    difference() {
        document.getElementById("result").innerText = "Risultato: " + (this.operando1 - this.operando2);
    }

    divide() {
        document.getElementById("result").innerText = "Risultato: " + (this.operando1 / this.operando2);
    }

    multiply() {
        document.getElementById("result").innerText = "Risultato: " + (this.operando1 * this.operando2);
    }
}

function calcolatrice(operator) {
    let calc = new Calcolatrice(parseFloat(document.getElementById("operando1").value), parseFloat(document.getElementById("operando2").value))
    switch (operator) {
        case "sum":
            calc.sum();
            break;
        case "difference":
            calc.difference();
            break;
        case "divide":
            calc.divide();
            break;
        case "multiply":
            calc.multiply();
            break;
        default:
            document.getElementById("result").innerText = "Funzione non prevista";
            break;
    }
}

function controllo() {
    document.getElementById("controllo-dati").innerText = "";
    let cognome = document.getElementById("cognome").value;
    let nome = document.getElementById("nome").value;
    let email = document.getElementById("email").value;
    let telefono = document.getElementById("telefono").value;
    let ul = document.createElement('ul');
    ul.setAttribute('class', 'list-group');
    let text;
    if (cognome !== "") {
        text = document.createTextNode("Il cognome è stato inserito\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    } else {
        text = document.createTextNode("Il cognome non è stato inserito\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    }
    if (nome !== "") {
        text = document.createTextNode("Il nome è stato inserito\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    } else {
        text = document.createTextNode("Il nome non è stato inserito\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    }
    if (email !== "") {
        if (email.includes('@')) {
            text = document.createTextNode("La mail è stata inserita e contiente @\n");
            let li = document.createElement('li');
            li.appendChild(text);
            li.setAttribute('class', 'list-group-item');
            ul.appendChild(li);
        } else {
            text = document.createTextNode("La mail è stata inserita ma non contiente @\n");
            let li = document.createElement('li');
            li.appendChild(text);
            li.setAttribute('class', 'list-group-item');
            ul.appendChild(li);
        }
    } else {
        text = document.createTextNode("La mail non è stata inserita\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    }
    if (telefono !== "") {
        text = document.createTextNode("Il telefono è stato inserito\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    } else {
        text = document.createTextNode("Il telefono non è stato inserito\n");
        let li = document.createElement('li');
        li.appendChild(text);
        li.setAttribute('class', 'list-group-item');
        ul.appendChild(li);
    }
    document.getElementById("controllo-dati").appendChild(ul);
}

let indice = 0;

function carosello(azione) {
    let ul = document.getElementById("list-carosello");
    let li = ul.getElementsByTagName("li");
    switch (azione) {
        case "avanti":
            if (indice < li.length - 1) {
                indice++;
                li[indice].removeAttribute("style");
                li[indice - 1].setAttribute('style', 'display: none');
            } else {
                indice = 0;
                li[indice].removeAttribute("style");
                li[2].setAttribute('style', 'display: none');
            }
            break;
        case "indietro":
            if (indice > 0) {
                indice--;
                li[indice].removeAttribute("style");
                li[indice + 1].setAttribute('style', 'display: none');
            } else {
                indice = li.length - 1;
                li[indice].removeAttribute("style");
                li[0].setAttribute('style', 'display: none');
            }
            break;
        default:
            break;
    }
}