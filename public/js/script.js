const form = document.getElementById('form1')
const nom = document.getElementById('nom')
const champ4 = document.getElementById('champ4');
const prenom = document.getElementById('prenom')
const login1 = document.getElementById('login1')
const password_inscription = document.getElementById('inscription_password')
const confirm_password = document.getElementById('confirm_password')
const click1 = document.getElementById('click1')
const repChoice = document.getElementById('repChoice');
const countEl = document.getElementById("count");
var errorChoice = document.getElementById("errorChoice");

const formQuestion = document.getElementById("formQuestion");
const questionAdd = document.getElementById("uno");


let count = 1;
let i = 1
    //------------------------------- Test de la validité de l'email------------------------------------//
if (countEl) {


    countEl.addEventListener('blur', () => {

        if (isNaN(countEl.value) || countEl.value < 0) {
            countEl.value = 1
            errorChoice.innerText = "Veuillez saisir un chiffres"
        }
    })
}
formQuestion.addEventListener('submit', (e) => {

    if (questionAdd.value == '') {
        e.preventDefault()
        showError(questionAdd, "champ1", "veuillez saisir une question")

    }
    if (repChoice.value == 'Donnez le type de réponse') {

        e.preventDefault()
        showError(repChoice, "champ1", "veuillez choisir un type de réponse")

    }
    var allInput = document.querySelectorAll('.tres')
    var Input = document.querySelectorAll('.input1')
    allInput.forEach(count => {
        if (count.value == '') {
            e.preventDefault()
            showError(count, "champ1", "veuillez saisir une réponse")
        }

    })
    Input.forEach(count => {
        if (!count.checked) {
            e.preventDefault()
            showError(count, "champ1", "veuillez cocher une réponse")
        }
    })




})


//------------------------------- Test de la validité du password------------------------------------//

function isValidPassword(input) {
    validity = false;
    if (input.value.trim().length < 6) {
        validity = false;
    } else {
        motif = input.value.trim();;
        re = /^(?=.*\d).{6,}$/;
        if (re.test(motif)) {
            validity = true;
        }
    }
    return validity;
}

//--------------------------------------------------Functions----------------------------------------------//

//--------------------------------------------Affichage des erreurs-----------------------------------------//
function showError(input, classe = "form-control", message) {
    const formControl = input.parentElement;
    formControl.className = classe + ' error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
//
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

//-----------------------------------Tester si les champs ne sont pas vides-----------------------------//
function checkRequired(inputArray) {
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            showError(input, `Ce champ est obligatoire`);
        } else {
            showSuccess(input);
        }
    });
}

function getFieldName(input) { //Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//--------------------------/Tester la longueur de la valeur  d'un input---------------------------//
function checkLength(input, min, max) {
    if (input.value.length < min) {
        showError(input, `${getFieldName(input)} must be at least ${min} characters!`)
    } else if (input.value.length > max) {
        showError(input, `${getFieldName(input)} must be less than ${max} characters !`);
    } else {
        showSuccess(input);
    }
}


function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Les mots de passes sont pas conformes!');
    }
}

function choice() {
    champ4.innerHTML = ''
    const newDiv = document.createElement('div')

    i = 1
    if (repChoice.value == 'repText') {
        const label = document.createElement('label')
        const input = document.createElement('input')
        newDiv.appendChild(label)
        newDiv.appendChild(input)
        label.innerText = 'Réponse'
        input.setAttribute('name', 'repText')
        input.setAttribute('type', 'text')
        input.setAttribute('class', 'tres')
        label.setAttribute('for', "")
        champ4.appendChild(newDiv);
    }
}

function addElement(elementToCreate) {
    const newDiv = document.createElement('div')
    newDiv.setAttribute('class', 'champ1')
    const nbrReponse = document.getElementById('nbrReponse');
    nbrReponse.value = i;
    const label = document.createElement('label')
    const input = document.createElement('input')
    const input1 = document.createElement('input')
    input1.setAttribute('class', 'input1')


    const img = document.createElement('img')
    const small = document.createElement('small')
    newDiv.appendChild(label)
    newDiv.appendChild(input)
    newDiv.appendChild(input1)
    newDiv.appendChild(img)
    newDiv.appendChild(small)

    label.innerText = `Réponse${i}`
    label.setAttribute('class', 'lab')
    input.setAttribute('name', `rep_${i}`)
    input.setAttribute('type', 'text')
    input.setAttribute('class', 'tres')
    input1.setAttribute('name', 'checked[]')
    img.src = "img/ic-supprimer.png"
    img.setAttribute('class', 'img1')
    input1.setAttribute('type', `${elementToCreate}`)
    input1.setAttribute('value', `${i}`)
    label.setAttribute('for', "")


    champ4.appendChild(newDiv);
    i++;

    img.addEventListener('click', () => {
        newDiv.remove()
        i--
        rebuild();
    })
}

function addInput() {
    if (repChoice.value == 'repMultiple') {
        addElement('checkbox')
    } else if (repChoice.value == 'repSimple') {
        addElement('radio')
    }
}

function isValidEmail(email) { //Tester si l'email est valide
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
//------------------------------------------Evènement ---------------------------------------//
if (form) {
    form.addEventListener('submit', function(e) {


        if (nom.value === '') {
            showError(nom, 'le nom est requis!');
            e.preventDefault()
        } else {
            showSuccess(nom);
        }
        if (prenom.value === '') {
            showError(prenom, 'le prenom est requis!');
            e.preventDefault()
        } else {
            showSuccess(prenom);
        }

        if (login1.value === '') {
            showError(login1, 'Email est requis!');
            e.preventDefault()
        } else if (!isValidEmail(login1.value)) {
            showError(login1, 'Email n\'est pas valide!');
            e.preventDefault()
        } else {
            showSuccess(login1);
        }

        if (password_inscription.value === '' || password_inscription.length < 6) {
            showError(password_inscription, 'Le mot de passe doit étre supérieur a 6 caractéres!');
            e.preventDefault()
        } else {
            showSuccess(password_inscription);
        }

        if (checkPasswordMatch(password_inscription, confirm_password)) {
            showError(confirm_password, 'Les mots de passes doivent etre identiques');
            e.preventDefault()
        }





    })
}




//------------------------------   Enregistrement photo----------------------------------------//

function loadFile(photo) {
    let img = document.getElementById('img');
    img.src = window.URL.createObjectURL(photo.files[0])
}

function rebuild() {

    let labels = document.querySelectorAll('.lab');
    labels.forEach((label, a) => {
        a++
        label.innerText = "Reponse" + a
    });

}


//------------------------------   count photo----------------------------------------//


function plus() {
    count++;
    countEl.value = count;
    errorChoice.innerText = "";
}

function minus() {
    if (count > 1) {
        count--;
        countEl.value = count;
        errorChoice.innerText = ""
    }
}