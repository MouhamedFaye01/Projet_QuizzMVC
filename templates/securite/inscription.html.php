
<div class="contentFormulaire">

<div class="contentInscription">
<form class="principal" action="<?= WEB_ROOT ?>" method="POST" id="form1" enctype="multipart/form-data">
<input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="inscription">


    <input type="hidden" name="role" value="<?= isset($_SESSION[KEY_USER_CONNECT]) ? "ROLE_ADMIN" : "ROLE_JOUEUR" ?>">
    <input type="hidden" name="score" value="0">
    <div class="inscription">
        <div class="partie1">
            <h1 class="inscrire">S'INSCRIRE</h1>
            <h3 class="inscrire2">Pour tester votre niveau de culture générale</h3>

        </div>
        
        <small class="small1" ><?= isset($errors['nom']) ? $errors['nom'] : '' ?></small>
        <div class="form-control">
                <label for="username">Nom</label>
                <input class="valeur"type="text" id="nom" placeholder="Enter username" name="nom">
                <small></small>
        </div>
        <small class="small1"><?= isset($errors['prenom']) ? $errors['prenom'] : '' ?></small>

        <div class="form-control">
                <label for="username">Prenom</label>
                <input class="valeur"type="text" id="prenom" placeholder="Enter username" name="prenom">
                <small></small>
        </div>
        <small class="small1" ><?= isset($errors['login']) ? $errors['login'] : '' ?></small>
        <small class="small1" ><?= isset($errors['error_login']) ? $errors['error_login'] : '' ?></small>

        <div class="form-control">
                <label for="email">Email</label>
                <input class="valeur"type="text" id="login1" placeholder="Enter email" name="login">
                <small></small>
            </div>
        <small class="small1"><?= isset($errors['password1']) ? $errors['password1'] : '' ?></small>

            <div class="form-control">
                <label for="inscription_password">Password</label>
                <input class="valeur"type="password" id="inscription_password" placeholder="Enter password" name="password">
                <small></small>
            </div>
            <div class="form-control">
                <label for="password2">Confirm password</label>
                <input class="valeur"type="password" id="confirm_password" placeholder="Confirm your password" name="confirm">
                <small></small>
            </div>  
        
        <div class="bottom">

        <input class="avatar" type="file" id="avatar"  name="avatar" hidden onchange="loadFile(this)">
        <button class="click1" id="click1" name="submit">Créer Compte</button>
    </div>
    <a href="<?= WEB_ROOT ?>" class='retour'>Se connecter</a>

    </div>
    <div class="picture">
   <label for="avatar" class="avatar">
   <div class="photo1">
   

   <img src="<?= WEB_PUBLIC."img/ic-pp.png" ?>" alt="" id="img" style="width:100%;height:100%; border-radius:50%" >




</div>
   </label>
   <small class="small1"><?= isset($errors['error_format']) ? $errors['error_format'] : '' ?></small>
    </div>
</form>
</div>
</div>
