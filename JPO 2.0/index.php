<?php
require_once ('Autoloader.php');
use Autoloader\Autoloader;
use Components\AffichageMode;
use Components\AffichageNavBar;
Autoloader::register('Components\AffichageNavBar');
Autoloader::register('Components\AffichageMode');
Autoloader::register('Components\AffichageActualite');

$mode = new AffichageMode();

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset= "UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?=$mode->afficher();?>.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
	<body>
        <header>
            <?php
            $navbar = new AffichageNavBar();
            $navbar->afficher();?>
        </header>
        <div id="notif"></div>
        <main>
            <?php 
            $actualite = new AffichageActualite();
            $actualite->afficher();
            ?>
        </main>
        <script src="JS/POO_js.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</body>
</html>
