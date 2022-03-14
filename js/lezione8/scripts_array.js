function inverse_array(numero) {
    let array = [];
    for (let i = 0; i < numero; i++) {
        array.push(Math.floor((Math.random() * 1000)));
    }
    console.log(array);
    let lunghezza = array.length;
    for (let i = lunghezza - 1; i >= 0; i--) {
        array.push(array[i]);
    }
    for (let i = 0; i < lunghezza; i++) {
        array.shift();
    }
    console.log(array);
}

inverse_array(5)

function sort_array_decrescente(array) {
    let finito = false;
    while (!finito) {
        finito = true;
        for (let i = 1; i < array.length; i++) {
            if (array[i - 1] < array[i]) {
                finito = false;
                let tmp = array[i - 1];
                array[i - 1] = array[i];
                array[i] = tmp;
            }
        }
    }
    console.log(array);
}

sort_array_decrescente([3, 7, -2, 5, 8, 1, 2, 5, 6, -4]);