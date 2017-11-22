<?php
                /*créer une page (index.php) qui affiche les 5 articles les plus récents

                créer sur cette page un formulaire qui va nous permettre de choisir l'auteur des articles que l'on veut afficher*/
                try
                {			
                    $bdd = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '',array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    )
                                  );
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }
                           

                $resultat = $bdd->query('SELECT * FROM articles ORDER BY date_publi DESC');
                $articles = $resultat->fetchAll(PDO::FETCH_ASSOC);
                foreach($articles as $article){
                ?>
                    <article>		
                        <h2>
                            <?php echo $article['title']; ?>
                        </h2>
                        publié par <?php echo  $article['author']; ?> le <?php echo  $article['date_publi']; ?>
                        <p><?php echo  $article['content']; ?></p>
                    </article>
                <?php
                }
                ?>