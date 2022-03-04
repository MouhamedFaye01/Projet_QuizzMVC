
                <h2 class="h2">Liste des joueurs par score</h2>
                    <div class="haut">

                        <table>
                            <thead>
                                <tr>
                                    <td>Nom</td>
                                    <td>Prénom</td>
                                    <td>Score</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($joueurs as $joueur) { ?>
                                        <tr>
                                            <td><?= $joueur['nom'] ?></td>
                                            <td><?= $joueur['prenom'] ?></td>
                                            <td><?= $joueur['score'] ?></td>
                                        </tr>
                                  <?php  }
                                ?>
                            </tbody>
                        </table>

                       
                    </div>
                    
                    <button class="btn" id="next-btn">Suivant</button>
                    
                </div>

                </div>