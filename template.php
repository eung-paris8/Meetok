<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Meetok</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="include/image/logo.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="include/acceuil.css"/>
        <link rel="stylesheet" href="include/administrateur.css"/>
        <link rel="stylesheet" href="include/connexion.css"/>
        <link rel="stylesheet" href="include/messagerie.css"/>
        <link rel="stylesheet" href="include/profil.css"/>
        <link rel="stylesheet" href="include/template.css"/>
        <link rel="stylesheet" href="include/rencontre.css"/>
        <link rel="stylesheet" href="include/media_query.css"/>
                <script type="text/javascript">
            
            function deconnexion() {
                if (window.confirm('Voulez-vous vous déconnecter?')) {
                    window.location.href="index.php?module=Connexion&action=deconnexion";
                } 
            }
                    
                
        </script>

	</head>
    
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="accueil.html">
                        <a href="index.php"><img src="include/image/Meetok.png"/></a>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                            if (!isset($_SESSION['id_Utilisateur']) && !isset($_SESSION['id_Administrateur'])){
                                echo '<div class="boutonConnexion ms-auto mt-auto ">
                                <a href="index.php?module=Connexion&action=formulaire">Connexion</a></div>';
                                echo '<div class="boutonConnexion">
                                <a href="index.php?module=Connexion&action=form_Inscription">Inscription</a>
                                </div>';
                            }
                            else {
                                if (isset($_SESSION['id_Utilisateur'])){
                                    echo '<a href="index.php?module=Profil&user='.$_SESSION['id_Utilisateur'].'"><img src="include/image/default.png" class="ppdp" style="width:40px; border-radius:50%;"></a>';
                                    echo '<div class="boutonConnexion"><a href="index.php?module=Rencontre">Rencontre</a></div>';
                                    echo '<div class="boutonConnexion"><a href="">Messagerie</a></div>';
                                    echo '<a href="index.php?module=Notification"> <img src="include/image/cloche.png" style="width : 20px"></a>';  
                                }
                               else {
                                  echo '<div class="boutonConnexion">
                                <a href="index.php?module=Administrateur&action=admin">Panneau d\'daministration</a>
                                </div>'; 
                               }
                                echo '
                                <input type="button" value="Deconnexion" class="ms-auto mt-auto btn btn-outline-dark" onClick="deconnexion()">';
                            }
                        ?>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container_fluid sectionPrincipale">
            <div class="container-xxl">
                <?= $module ?>
            </div>
        </div>
        <footer>
            <p>Meetok © Copyright 2020, Tous droits réservés</p>
        </footer>
    </body>
</html>