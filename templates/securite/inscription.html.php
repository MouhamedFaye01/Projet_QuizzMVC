<div class="contentFormulaire">

<div class="contentInscription">
<form class="principal" action="<?= WEB_ROOT ?>" method="POST" id="form1">
<input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="inscription">


    <input type="hidden" name="role" value="<?= isset($_SESSION[KEY_USER_CONNECT]) ? "ROLE_ADMIN" : "ROLE_JOUEUR" ?>">
    <input type="hidden" name="score" value="0">
    <div class="inscription">
        <div class="partie1">
            <h1 class="inscrire">S'INSCRIRE</h1>
            <h3 class="inscrire2">Pour tester votre niveau de culture générale</h3>

        </div>

        <div class="form-control">
                <label for="username">Nom</label>
                <input type="text" id="nom" placeholder="Enter username">
                <small>Error message</small>
        </div>
        <div class="form-control">
                <label for="username">Prenom</label>
                <input type="text" id="prenom" placeholder="Enter username">
                <small>Error message</small>
        </div>
        <div class="form-control">
                <label for="email">Email</label>
                <input type="text" id="login1" placeholder="Enter email">
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="inscription_password" placeholder="Enter password">
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="password2">Confirm password</label>
                <input type="password" id="confirm_password" placeholder="Confirm your password">
                <small>Error message</small>
            </div>  
        
        <div class="bottom">
        <label  for="Avatar"></label>   
        <input class="avatar" type="file" id=""  name="avatar">
        <button class="click1" id="click1" >Créer Compte</button>
        </div>
    </div>
    <div class="picture">

        <div class="photo1">

        </div>
        <div class="photo2">

        </div>
    </div>
</form>
</div>
</div>
