
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Meetok</title>
        <link rel="icon" type="image/png" href="include/image/coeur.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="include/template.css"/>
        <link rel="stylesheet" href="include/style.css"/>

        
        
    </head>
    
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="accueil.html">
                        <img src="include/image/Meetok.png" class="img-fluid" alt="Logo du Site">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                            if (!isset($_SESSION['id_Utilisateur'])){
                                echo '<a href="index.php?module=Connexion&action=formulaire"><input type="button" value="Connexion" class="ms-auto mt-auto btn btn-outline-dark"></a>';
                                echo '<a href="index.php?module=Connexion&action=form_Inscription"><input type="button" value="Inscription" class="ms-auto mt-auto btn btn-outline-dark"></a>';
                            }
                            else {

                                echo '<a href="index.php?module=Connexion&action=deconnexion"><input type="button" value="Deconnexion" class="btn btn-outline-dark"></a>';
                            }
                        ?>
                    </div>
                </div>
            </nav>
        </header>
        
        <?= $module ?>
        
        <footer>
            <p>Meetok © Copyright 2020, Tous droits réservés</p>
        </footer>
    </body>
</html>