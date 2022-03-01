class Contatto {
    constructor(nome, cognome, telefono) {
        this.nome = nome;
        this.cognome = cognome;
        this.telefono = telefono;
    }

    get nome() {
        return this._nome;
    }

    set nome(nome) {
        if (typeof (nome) === "string") {
            this._nome = nome;
        }
    }

    get cognome() {
        return this._cognome;
    }

    set cognome(cognome) {
        if (typeof (cognome) === "string") {
            this._cognome = cognome;
        }
    }

    get telefono() {
        return this._telefono;
    }

    set telefono(telefono) {
        if (typeof (telefono) === "string") {
            this._telefono = telefono;
        }
    }
}

class Rubrica {
    constructor() {
        this.database = [];
    }

    stampaContatti(ordinamento) {
        let data = []
        if (ordinamento.toLowerCase() === "az") {
            this.database.sort();
        } else {
            this.database.sort();
            this.database.reverse();
        }
        for (let i = 0; i < this.database.length; i++) {
            let contatto = this.database[i];
            data.push("<li>" + contatto.nome + " " + contatto.cognome + " " + contatto.telefono + "</li>");
        }
        return data;
    }

    aggiungiContatto(contatto) {
        let esisteContatto = false;
        if (contatto instanceof Contatto) {
            for (let i = 0; i < this.database.length; i++) {
                if (contatto.telefono === this.database[i].telefono) {
                    esisteContatto = true;
                }
            }
            if (!esisteContatto) {
                this.database.push(contatto);
            }
        }
    }

    modificaContatto(posizione, contatto) {
        if (contatto instanceof Contatto) {
            this.database[posizione].nome = contatto.nome;
            this.database[posizione].cognome = contatto.cognome;
            this.database[posizione].telefono = contatto.telefono;
        }
    }

    eliminaContatto(posizione) {
        this.database.splice(posizione, 1);
    }

    ricercaContatto(nome) {
        for (let i = 0; i < this.database.length; i++) {
            const contatto = this.database[i];
            if (contatto.nome.indexOf(nome) > -1) {
                console.log(contatto.nome + " " + contatto.cognome + " " + contatto.telefono);
            }
        }
    }
}

let contatto1 = new Contatto("Calin", "Furculita", "3898873929");
let contatto2 = new Contatto("Marco", "Battello", "3898473929");
let contatto3 = new Contatto("Alex", "Cherif", "3898233929");
let contatto4 = new Contatto("Silvia", "Cesari", "3895573929");
let rubrica = new Rubrica();
rubrica.aggiungiContatto(contatto1);
rubrica.aggiungiContatto(contatto2);
rubrica.aggiungiContatto(contatto3);
rubrica.aggiungiContatto(contatto4);
let data = rubrica.stampaContatti("az");
for (let i = 0; i < data.length; i++) {
    console.log(data[i]);
}
