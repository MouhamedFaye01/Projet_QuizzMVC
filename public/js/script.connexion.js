    //------------------------------- Test de la validité de l'email------------------------------------//

    function checkEmail(input) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (re.test(input.value.trim().toLowerCase())) {
            return true
        } else {
            return false
        }
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

    //------------------------------- Récupération des éléments------------------------------------//

    const login = document.getElementById('login')
    const password = document.getElementById('password')
    const boutton = document.getElementById('connect')

    //----------------------- Évènement d'écoute d'un bon email et password-----------------------------//

    login.addEventListener('input', () => {
        if (!checkEmail(login)) {
            login.style.border = "solid red 1px"
        } else {
            login.style.border = "solid green 1px"

        }
        password.addEventListener('input', () => {
            if (!isValidPassword(password)) {
                password.style.border = "solid red 1px"
            } else {
                password.style.border = "solid green 1px"
                boutton.removeAttribute('disabled')

            }


        })


    })