<?php

    error_reporting(E_ALL); 

$title = 'Tchat de la communauté';
$h1 = 'Bienvenue sur le Tchat';
$h2 = 'L\'espace de partage de la communauté des Rocheux';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        <form action="/forteroche/app/Tchat/insert" method="post">
            
            <?php 
                if ( isset($_SESSION['identifiant']) ) 
                {
                   echo '<div class="shadow-lg p-3 mb-5 bg-dark rounded mt-5 text-center">
                                <p class="lead text-light"> Vous ête connecté en tant que : <span class="tchat-pseudo gradient">| '.$_SESSION['identifiant'].' |</span></p>
                                
                                <div class="form-group">
                                    <label class="lead text-light" for="mess">Votre message : <textarea name="mess" class="form-control"></textarea> </label>
                                </div>

                                <button type="submit" class="btn btn-info" name="tchat_btn">Envoyer</button>
                        </div>';

                } else { echo '<div class="shadow-lg p-3 mb-5 bg-dark rounded mt-5 text-center">
                                
                                    <p class="lead text-light">Connectez-vous pour accéder au Tchat</p>
                
                                    <button type="button" id="tchat_modal_btn" name="tchat_modal_btn" class="btn btn-info pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#tchat_modal">
                                        Se Connecter
                                    </button>

                            </div>' ;}#Bouton de la modal

            ?>
        
        </form>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>
            
        <?php 
            while($membre = $show_tchat->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-3 bg-white rounded mt-2">
                        <textarea style="display:none" class="com_id" name="com_id">'.$membre['id'].'</textarea>
                        <p class="tchat-pseudo gradient">'.$membre['pseudonyme'].' :</p>
                        <p class="tchat-mess text-justify">'.$membre['mess'].'</p>
                        <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$membre['timywoo'].'</p>';
                
                if (isset($_SESSION['identifiant']) && $membre['pseudonyme'] == $_SESSION['identifiant'])
                {
                    echo '<!-- Button trigger modal -->
                        <button type="button" name="update_modal_btn" class="modal_btn btn btn-info" data-toggle="modal" data-target="#modal_update">
                        Modifier votre commentaire
                        </button> 
                    </div>';
                } else { echo "</div>"; }

            }
        ?> 
        </div>


                            <!-- Modal de CONNEXION -->
    <div class="modal fade" id="tchat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Connectez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forteroche/app/Tchat/connect" method="post">

                        <div class="form-group">
                            <label for="pseudo">Identifiant : 
                                <input type="text" name="pseudo" class="form-control" placeholder="Entrez votre pseudo" value="<?php if ( isset($pseudo) )
                                    { echo $pseudo;
                                }?>"/>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="mdp">Mot de passe : 
                                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe"/> 
                            </label>  
                            <small class="text-danger"><?php echo $feedback; ?></small>
                        </div>
                        <small id="create_btn" data-toggle="modal" data-target="#create_modal"><a href="#">Se créer un compte</a></small>        
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button id ="connect_btn" type="submit" class="btn btn-primary" name="connect_btn">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

                    <!-- Modal de CREATION -->
    <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Devenir Rocheux</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forteroche/app/Tchat/register" method="post">

                    <div class="form-group">
                        <label for="pseudo">Votre pseudo :
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?php if ( isset($pseudo) )
                            { 
                                echo $pseudo;
                            }?>" >
                        </label> 
                    </div>
                    
                    <div class="form-group">
                            <label for="pseudo">Votre email: 
                                <input type="text" name="email" class="form-control" placeholder="@" value="<?php if ( isset($email) )
                                { 
                                        echo $email;
                                }?>">
                            </label> 
                    </div>

                    <div class="form-group">
                            <label for="pseudo">Votre mot de passe:
                                <input type="password" name="mdp" class="form-control" placeholder="Il sera sécurisé"></label> 
                    </div>
                    
                    <div class="form-group">
                            <label for="pseudo">Confirmez mot de passe: 
                                <input type="password" name="conf_mdp" class="form-control" placeholder="Pour être sûr"></label>
                    </div>

                    <small class="form-text text-danger"><?php echo $feedback; ?></small>    
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="create">S'inscrire</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de MODIFICATION -->

    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifiez votre commentaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/forteroche/app/Tchat/updateANDdelete_comment" method="post">
                            <textarea style="display:none" class="modal_id" name="com_id"></textarea>
                            <textarea style="border: none" class="modal_com" name="comment"></textarea>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                            <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 

<?php $content = ob_get_clean(); ?><?php require(_ROOT_.'template.php'); ?>