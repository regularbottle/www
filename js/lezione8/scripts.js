(function () {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()

function Contatto(nome, cognome, telefono, email) {
    return {
        nome: nome,
        cognome: cognome,
        telefono: telefono,
        email: email
    }
}
function to_JSON(oggettoJSON) {
    return JSON.stringify(oggettoJSON);
}
function from_JSON(stringaJSON) {
    return JSON.parse(stringaJSON);
}

function stampa_dati() {
    let input = document.getElementsByTagName("input");
    let contatto = new Contatto(input['nome'].value, input['cognome'].value, input['telefono'].value, input['email'].value)
    contatto = to_JSON(contatto);
    document.getElementById("stampa_nome").innerText = "Nome: " + contatto.nome;
    document.getElementById("stampa_cognome").innerText = "Cognome: " + contatto.cognome;
    document.getElementById("stampa_telefono").innerText = "Telefono: " + contatto.telefono;
    document.getElementById("stampa_email").innerText = "Email: " + contatto.email;
}

