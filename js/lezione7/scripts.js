let hotel = {
    nome: "Hotel Cola",
    stelle: "5",
    indirizzo: "Via Bolzano 12",
    recensione: "Si sta molto bene qui!"
}

let ristorante = {
    nome: "Dalla Lella",
    stelle: "4.7",
    indirizzo: "Via Genova 11",
    recensione: "Si mangia molto bene qui!"
}

function print_data() {
    let div = document.getElementById("hotel");
    div = div.getElementsByTagName("span");
    div[0].innerText = "Hotel: " + hotel.nome;
    div[1].innerText = "Stelle: " + hotel.stelle + "\u{2B50}";
    div[2].innerText = "Indirizzo: " + hotel.indirizzo;

    let div2 = document.getElementById("ristoranti");
    div2 = div2.getElementsByTagName("span");
    div2[0].innerText = "Ristorante: " + ristorante.nome;
    div2[1].innerText = "Stelle: " + ristorante.stelle + "\u{2B50}";
    div2[2].innerText = "Indirizzo: " + ristorante.indirizzo;
}

function valutazione(tipologia) {
    if (tipologia === "hotel") {
        document.getElementById("recensione").innerText = hotel.recensione;
    }
    else {
        document.getElementById("recensione").innerText = ristorante.recensione;
    }
}