function Calcolatrice() {
    this.leggi = function (numero1, numero2) {
        this.numero1 = numero1;
        this.numero2 = numero2;
    }
    this.somma = function () {
        return this.numero1 + this.numero2;
    }
    this.moltiplica = function () {
        return this.numero1 * this.numero2;
    }
    this.dividi = function () {
        return this.numero1 / this.numero2;
    }
}

let calcolatrice = new Calcolatrice();

calcolatrice.leggi(10, 10);
console.log(calcolatrice.somma());
console.log(calcolatrice.moltiplica());
console.log(calcolatrice.dividi());
