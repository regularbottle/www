function sum_media(n1, n2, n3, n4, n5) {
    let sum = n1 + n2 + n3 + n4 + n5;
    let media = sum / 5;
    return [sum, media]
}

console.log(sum_media(1,2,3,4,5));

function nr_cifre(intero) {
    if (intero>9999 || intero<0) return "numero maggiore a 9999 oppure minore a 0";
    if (intero > 999) return "4 cifre";
    if (intero > 99) return "3 cifre";
    if (intero > 9) return "2 cifre";
    return "1 cifra";
}

console.log(nr_cifre(654));

function odd_even(intero) {
    return ((intero % 2) ? "dispari" : "pari");
}

console.log(odd_even(6));

function tempo(secondi) {
    let date = new Date(null);
    date.setSeconds(secondi);
    return date.toISOString().substring(11, 19);
}

console.log(tempo(54000));

function transpose(matrix) {
    let matrix_temp = [];
    let matrix_transpose = [];
    for (let i = 0; i < matrix[0].length; i++) {
        for (let j = 0; j < matrix.length; j++) {
            matrix_temp.push(matrix[j][i]);
        }
        if (matrix_temp.includes(undefined)) return matrix_transpose;
        matrix_transpose.push(matrix_temp);
        matrix_temp = [];
    }
    return matrix_transpose;
}

matrix = [[1, 2], [5, 6], [9, 10], [13, 14], [99, 100]];
console.log(transpose(matrix));