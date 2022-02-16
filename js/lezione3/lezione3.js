const Calciatore = {};

console.log(Calciatore);

Calciatore.nome = 'Lorenzo';
Calciatore.cognome = 'Pellegrini';

console.log(Calciatore);

Calciatore.nome = 'Giuseppe';
delete Calciatore.cognome;

console.log(Calciatore);