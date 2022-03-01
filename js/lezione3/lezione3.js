const Calciatore = {};
Calciatore.nome = 'Lorenzo';
Calciatore.cognome = 'Pellegrini';
Calciatore.nome = 'Giuseppe';
delete Calciatore.cognome;

console.log(Calciatore);

let objVuoto = {};
let objPieno = {"nome": "Giusseppe"};

function isEmpty(obj) {
    return !('nome' in obj);

}

console.log(isEmpty(objVuoto));
console.log(isEmpty(objPieno));

const calciatori = [
    {nome: "Lorenzo", cognome: "Pellegrini", maglia: 10},
    {nome: "Edin", cognome: "Dzeko", maglia: 23},
    {nome: "Federico", cognome: "Chiesa", maglia: 99},
    {nome: "Paulo", cognome: "Dybala", maglia: 10},
    {nome: "Lorenzo", cognome: "Insigne", maglia: 10},
    {nome: "Andrea", cognome: "Belotti", maglia: 9},
    {nome: "Antonio", cognome: "Vacca", maglia: undefined},
];


function stampaGiocatori(calciatori) {
    if (calciatori.length === 0) {
        console.log("L'array è vuoto");
        return;
    }

    for (let i = 0; i < calciatori.length; i++) {
        const calciatore = calciatori[i];
        if (calciatore.maglia === 10) {
            console.log(calciatore.nome + " " + calciatore.cognome);
        }
    }
}

stampaGiocatori(calciatori);