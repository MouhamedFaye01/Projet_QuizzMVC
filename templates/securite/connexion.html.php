
<section class="content-form">
    <form class="connexion-form" id="connexion-form" action="<?= WEB_ROOT ?>" method="POST">
        <input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="connexion">
        <div class="libele-form-connect">
            <h2>Login Form</h2>
        </div>
        
        <div class="control-group-connect">
             <p class="para1" ><?= (isset($errors['connexion'])) ? $errors['connexion'] : '' ?></p>
         
           

            <!--//!login -->
            <p class="para"><?= isset($errors['login']) ? $errors['login'] : '' ?></p>
            <div class="forms-group">
          
            
                <input class="input-connexion" type="text"  name="login" id="login" class="login" placeholder="Login">
                <small class="ic-connexion"> <img class="champ" src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-login.png"?>" alt=""></small>
                <small></small>
            </div>
     
        
            <!-- //!password -->
            <p class="para"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>
            <div class="forms-group">
          

                <input class="input-connexion" type="password"  name="password" id="password" class="password" placeholder="Password">
                <small class="ic-connexion"><img class="champ"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-password.png"?>" alt=""></small>
                <small></small>
            </div>
           
                
            <!-- //!press on submit button -->
            <div class="last-control">
                <button id="connect" type="submit" disabled  >Connexion</button>
                <a href="<?= WEB_ROOT."?controller=securite&action=inscription" ?>">S'inscrire pour jouer </a>
            </div>
        </div>        
    </form>
</section>