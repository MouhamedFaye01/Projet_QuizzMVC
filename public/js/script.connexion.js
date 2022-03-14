    const login = document.getElementById('login')
    const password = document.getElementById('password')
    const boutton = document.getElementById('connect')



    //------------------------------- Test de la validité de l'email------------------------------------//

    function checkEmail(input) { //Tester si l'email est valide :  javascript : valid email
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (re.test(input.value.trim().toLowerCase())) {
            return true
        } else {
            return false
        }
    }

    function showErrorConnect(input, message) { //Afficher les messages d'erreur
        const formControl = input.parentElement;
        formControl.className = 'forms-group errorConnect';
        const small = formControl.querySelector('small');
        small.innerText = message;
    }
    //
    function showSuccessConnect(input) {
        const formControl = input.parentElement;
        formControl.className = 'forms-group successConnect';
        const small = formControl.querySelector('small');
        small.innerText = "";
    }
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



    //----------------------- Évènement d'écoute d'un bon email et password-----------------------------//
    if (login) {
        login.addEventListener('input', () => {

            if (!checkEmail(login)) {

                showErrorConnect(login, 'Erreur email')
                password.setAttribute('disabled', 'disabled')
            } else {
                showSuccessConnect(login)
                password.removeAttribute('disabled')

                password.addEventListener('input', () => {
                    if (!isValidPassword(password)) {
                        showErrorConnect(password, 'Erreur mot de passe')

                    } else {
                        showSuccessConnect(password)

                        boutton.removeAttribute('disabled')

                    }


                })

            }



        })
    }