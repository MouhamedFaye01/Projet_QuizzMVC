


    <div class="container">

        <div class="admin-dashboard">

            <div class="admin-dashboard-header">
                <h2>CRÉEZ ET PARAMÉTREZ VOS QUIZZ</h2>
                <a href="<?= WEB_ROOT. "?controller=securite&action=logout" ?>" class="btn">Déconnexion</a>
                
            </div>

            <div class="administrateur">

                <div class ="left">

                   

                        <div class="admin-infos">
                            <div class="photo">
                                <div class="toff">
                                    <img class="femme"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-pp.png"?>" alt="">
                                </div>


                            </div>

                            <div class="name">
                                <p id="first-name"><?= $_SESSION[KEY_USER_CONNECT]['nom'] ?></p>
                                <p id="last-name"><?= $_SESSION[KEY_USER_CONNECT]['prenom'] ?></p>
                            </div>

                        </div>


                        <div class="admin-menu">
                            <div class="icone">
                                <ul>
                                    <li>
                                        <a href="<?= WEB_ROOT."?controller=user&action=liste.question"?>">Liste des questions</a> 
                                        <img class="champ"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-liste.png"?>" alt="">
                                
                                    </li>
                                
                                    <li>
                                        <a href="<?= WEB_ROOT."?controller=user&action=creation.admin"?>">Créer un admin</a>                                      
                                        <img class="champ"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-ajout.png"?>" alt="">

                                    </li>
                                    <li>
                                        <a href="<?= WEB_ROOT."?controller=user&action=liste.joueur"?>">Liste des joueurs</a> 
                                        <img class="champ"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-liste.png"?>" alt="">

                                    </li>
                                    <li>
                                        <a href="<?= WEB_ROOT."?controller=user&action=creation.question"?>">Créer une question</a>
                                        <img class="champ"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-ajout.png"?>" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>

                </div>

                <div class="right"> 
                     
                    <?= isset($affiche) ? $affiche : '' ?>
              
</div> 
         
        </div>
    </div>
    
