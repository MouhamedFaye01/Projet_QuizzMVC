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

     const form = document.getElementById('form1')
     const nom = document.getElementById('nom')

     const prenom = document.getElementById('prenom')
     const login1 = document.getElementById('login1')
     const password_inscription = document.getElementById('inscription_password')
     const confirm_password = document.getElementById('confirm_password')
     const click1 = document.getElementById('click1')

     //----------------------- Évènement d'écoute d'un bon email et password-----------------------------//



     //Functions-------------------------------------------------------------
     function showError(input, message) { //Afficher les messages d'erreur
         const formControl = input.parentElement;
         formControl.className = 'form-control error';
         const small = formControl.querySelector('small');
         small.innerText = message;
     }
     //
     function showSuccess(input) {
         const formControl = input.parentElement;
         formControl.className = 'form-control success';
     }

     //
     function checkRequired(inputArray) { // Tester si les champs ne sont pas vides
         inputArray.forEach(input => {
             if (input.value.trim() === '') {
                 showError(input, `${getFieldName(input)} is required`);
             } else {
                 showSuccess(input);
             }
         });
     }
     //
     function getFieldName(input) { //Retour le nom de chaque input en se basant sur son id
         return input.id.charAt(0).toUpperCase() + input.id.slice(1);
     }
     //
     function checkLength(input, min, max) { //Tester la longueur de la valeur  d'un input
         if (input.value.length < min) {
             showError(input, `${getFieldName(input)} must be at least ${min} characters!`)
         } else if (input.value.length > max) {
             showError(input, `${getFieldName(input)} must be less than ${max} characters !`);
         } else {
             showSuccess(input);
         }
     }
     //

     function checkPasswordMatch(input1, input2) {
         if (input1.value !== input2.value) {
             showError(input2, 'Passwords do not match!');
         }
     }


     //Even listeners--------------------------------------------------------
     form.addEventListener('submit', function(e) {


         e.preventDefault(); //Bloquer la soumission du formulaire


         checkRequired([nom, prenom, login1, password_inscription]);
         checkPasswordMatch(password_inscription, confirm_password)
         checkEmail(login1);


     })