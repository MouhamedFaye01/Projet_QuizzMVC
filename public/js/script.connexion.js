    //------------------------------------Récupération des élélments---------------------------------------//

    // const login = document.getElementById('login');
    // const password = document.getElementById('password');
    // const deux = document.getElementById('deux');
    // const b1 = document.getElementById('b1');


    //-------------------------------Fonction pour récupérrer les éléments--------------------------------//


    // function recuperation() {

    //     const valeurLogin = login.value;
    //     const valeurPassword = password.value;
    //---------------------------------------Validation du login-----------------------------------------//
    // if (valeurLogin === '') {
    //     Error_case(login, "Veuillez saisir un email");

    // } else {
    //     Success_case(login);
    // }

    //---------------------------------------Validation du password-------------------------------------//

    //     if (valeurPassword === '') {
    //         Error_case(password, "Mot de passe obligatoire ");

    //     } else {
    //         Success_case(password);
    //     }
    // }

    //----------------------------------------Évènement bouton------------------------------------------//

    // b1.addEventListener('click', () => {
    //     recuperation()
    // });

    //---------------------------------------Afficher les messages--------------------------------------//

    // function Error_case(input, message) {
    //     const Control = input.parentElement;
    //     Control.className = 'icone-error';
    //     small.innerText = message;
    // }
    // function Success_case(input) {
    //     const Control = input.parentElement;
    //     Control.className = 'icone-success';
    // }
    //-----------------------------------------Les fonctions---------------------------------------------//
    // function Error_case(input, message = 'le champ est vide') {
    //     input =
    //         // const formControl = input.parentElement;
    //         // const small = formControl.querySelector('small');
    //         console.log()
    // }
    // function Success_case(input) {
    //     const formControl = input.parentElement
    //     formControl.className = 'formControl success';
    // }
    // const form = document.querySelector('.content-form form');
    // const login = document.getElementById('login');
    // const password = document.getElementById('password');


    //Functions-------------------------------------------------------------
    // function showError(input, message) {
    //Afficher les messages d'erreur
    //     const formControl = input.parentElement;
    //     formControl.className = 'forms-group error';
    //     const p = formControl.nextElementSibling;
    //     p.innerHTML = message;
    //     p.className = "RED-ERROR  ERROR-LAY";
    // }
    //
    // function showSuccess(input) {
    //     const formControl = input.parentElement;
    //     formControl.className = 'forms-group success';
    //     const p = formControl.nextElementSibling;
    // p.innerHTML = '';
    // p.style.display = 'none';
    // p.className = "RED-ERROR  ERROR-LAY";
    // }
    //
    function checkEmail(input) {
        // Tester si l'email est valide :  javascript : valid email
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (re.test(input.value.trim().toLowerCase())) {
            return true
        } else {
            return false
        }
    }
    // //
    // function checkRequired(inputArray) {
    // Tester si les champs ne sont pas vides
    //     inputArray.forEach(input => {
    //         if (input.value.trim() === '') {
    //             showError(input, ` ${getFieldName(input)}  obligatoire`);
    //         } else {
    //             showSuccess(input);
    //         }
    //     });
    // }
    // //
    // function getFieldName(input) {
    //Retour le nom de chaque input en se basant sur son id
    // return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    // }

    // 
    // function isValidEmail(login) {
    //Tester si l'email est valide
    //     const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     return re.test(String(login).toLowerCase());
    // }

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





    //Even listeners--------------------------------------------------------
    // form.addEventListener('submit', function(e) {
    //Blocage de la soumission du formulaire
    // e.preventDefault();

    // checkRequired([login, password]);
    //     checkEmail(login);
    //     isValidPassword(password);

    //     if (login.value === '') {
    //         showError(login, "Login obligatoire!");
    //     } else if (!isValidEmail(login.value)) {
    //         showError(login, "L'email est invalide!");
    //     } else {
    //         showSuccess(login);
    //     }

    //     if (password.value === '') {
    //         showError(password, 'Password  obligatoire ');
    //     } else {
    //         if (!isValidPassword(password)) {
    //             showError(password, 'le mot doit être au moins 6 caractères et doit contenir au moins une lettre et une majuscule ');
    //         } else {
    //             showSuccess(password);
    //         }
    //     }
    //     if (isValidEmail(login.value) && isValidPassword(password)) {
    //         e.target.submit();
    //     }
    // });
    const login = document.getElementById('login')
    const password = document.getElementById('password')
    const boutton = document.getElementById('connect')

    login.addEventListener('input', () => {
        if (!checkEmail(login)) {
            login.style.border = "solid red 1px"
        } else {
            login.style.border = "solid green 1px"
                // boutton.removeAttribute('disabled')

        }
        password.addEventListener('input', () => {
            if (!isValidPassword(password)) {
                password.style.border = "solid red 1px"
            } else {
                password.style.border = "solid green 1px"
                boutton.removeAttribute('hidden')

            }


        })


    })