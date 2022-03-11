let hotel;
let ristorante;

function readTextFile(file, tipologia) {
    let rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4) {
            if (rawFile.status === 200 || rawFile.status === 0) {
                if (tipologia === "hotel") {
                    hotel = JSON.parse(rawFile.responseText);
                } else {
                    ristorante = JSON.parse(rawFile.responseText);
                }
            }
        }
    }
    rawFile.send(null);
}

readTextFile("./hotels.json", "hotel")
readTextFile("./ristoranti.json", "ristorante")

function print_data() {
    document.getElementById("hotel").innerHTML = "<h2>Hotel<h2>"
    for (let elements in hotel) {
        let span = document.createElement("span")
        span.innerHTML += "Hotel: " + hotel[elements].nome + "<br>";
        span.innerHTML += "Stelle: " + hotel[elements].stelle + "\u{2B50}" + "<br>";
        span.innerHTML += "Indirizzo: " + hotel[elements].indirizzo + "<br>";
        document.getElementById("hotel").appendChild(span)
    }
    document.getElementById("hotel").innerHTML += "<button class=\"btn btn-info btn-sm\" onClick=\"valutazione('hotel')\">Valutazioni</button>";
}

function valutazione(tipologia) {
    if (tipologia === "hotel") {
        document.getElementById("nomeRec").innerText = (hotel.nome)
        document.getElementById("recensione").innerText = hotel.recensione;
    } else {
        document.getElementById("nomeRec").innerText = (ristorante.nome)
        document.getElementById("recensione").innerText = ristorante.recensione;
    }
}