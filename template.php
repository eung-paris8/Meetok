
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Meetok</title>
        <link rel="icon" type="image/png" href="include/image/logo.png"/>
        <link rel="stylesheet" href="include/template.css"/>
        <link rel="stylesheet" href="include/style.css"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	</head>
    
    <body>
        <header>
            <nav>
                <a href="index.php"><img src="include/image/Meetok.png"/></a>
                <?php
                    if (!isset($_SESSION['id_Utilisateur'])){
                        echo '<a href="index.php?module=Connexion&action=formulaire"><input type="button" value="Connexion"></a>';
                        echo '<a href="index.php?module=Connexion&action=form_Inscription"><input type="button" value="Inscription"></a>';
                    }
                else {
                    echo '<a href="index.php?module=Connexion&action=deconnexion"><input type="button" value="Deconnexion"></a>';
                }
                ?>
            </nav>
        </header>
        <div class="container">
                <?= $module ?>
        </div>
        <footer>
        </footer>
    </body>
</html>