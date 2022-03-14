<?php  $nbrPage = ceil(count($joueurs)/7)?>
                <h2 class="h2">Liste des joueurs par score</h2>
                    <div class="haut">

                    <?php
                        if (isset($_GET['next'])) {
                            $page = $_GET['next'];
                            pagination($page,$joueurs);
                        }else{
                            pagination(1,$joueurs);

                        }
                    ?>

                       
                    </div>
                    
                    <?php
                        for ($i=1; $i < $nbrPage; $i++) { ?>
                            <a href="<?= WEB_ROOT."?controller=user&action=liste.joueur&next=$i" ?>" class="btn" id="next-btn"><?= $i ?></a>
                       <?php }
                    ?>
                
                </div>

                </div>