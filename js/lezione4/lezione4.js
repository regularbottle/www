class Calcolatrice {
    constructor(numero1, numero2) {
        this.numero1 = numero1;
        this.numero2 = numero2;
    }

    somma = function () {
        return this.numero1 + this.numero2;
    }
    moltiplica = function () {
        return this.numero1 * this.numero2;
    }
    dividi = function () {
        if (this.numero2 !== 0) {
            return this.numero1 / this.numero2;
        } else {
            console.log("Divisore uguale a 0, impossibile dividere")
        }
    }
}

let calcolatrice = new Calcolatrice(10, -1.2);

console.log(calcolatrice.somma());
console.log(calcolatrice.moltiplica());
console.log(calcolatrice.dividi());