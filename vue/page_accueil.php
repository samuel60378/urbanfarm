
<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_accueil.css"/>
		<?php include("controleur/ct_actualite.php"); ?>
        <?php include("controleur/ct_boutique.php"); ?>
    </head>
	
	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
	</header>
	<?php include("vue/elem/elem_menu.php"); ?>
	<body>
		<div id="description"> Urbanfarm en quelques mots ?
			<p>LA solution qu'il vous faut pour produire votre propre nourriture à votre echelle, tout est completement personnalisable et simple, laissez vous guider !</p>
		</div>
		<div class="container">
				<div id="col1">
				<div class="galleryContainer">
					<div class="slideShowContainer">
						<div id="playPause" onclick="playPauseSlides()"></div>
						<div onclick="plusSlides(-1)" class="nextPrevBtn leftArrow"><span class="arrow arrowLeft"></span></div>
						<div onclick="plusSlides(1)" class="nextPrevBtn rightArrow"><span class="arrow arrowRight"></span></div>
						<div class="captionTextHolder">
							<p class="captionText slideTextFromTop"></p>
						</div>
						<div class="imageHolder">
							<img src="vue/img/f1.jpg">
							<p class="captionText">Construisez votre propre ferme sans efforts !</p>
						</div>
						<div class="imageHolder">
							<img src="vue/img/f2.jpg">
							<p class="captionText">Automatisez l'entretien d'une serre !</p>
						</div>
						<div class="imageHolder">
							<img src="vue/img/f3.jpg">
							<p class="captionText">Goutez au bonheur de la compagnie des poules !</p>
						</div>
						<div class="imageHolder">
							<img src="vue/img/f4.jpg">
							<p class="captionText">Automatisez tout un poulailler</p>
						</div>
					</div>
					<div id="dotsContainer"></div>
					</div>
						<script src="vue/script/scriptCarousel.js"></script>
						<br><br>
						
					</div>
					<div id="col2">
						<h2>Dernières actualités</h2>
						<div id="actualité">
							<div id="titre"><?php afficheDernierTitre($bdd); ?></div>
							<div id="texte"><?php afficheDernierArticle($bdd); ?></div>
						</div>
					</div>
					<div id="col3">
						<h2>Nos best-sellers</h2>
						<div class="box_product">
                            <?php
                            $produit = getRandomProduit($bdd)->fetch();
                            $type = $produit['type'];
                            $ref = $produit['n°produit'];
                            $description = $produit['description'];
                            if (strlen($description) > 128) {
                                $description = substr($description,0,128) . "...";
                            }
                            $prix = $produit['prix'];
                            echo
                            //inititule du produit
                            '<h2>' . $type . '</h2>' .
                            //numero de reference
                            '<h3 class = "ref">ref. ' . $ref . '</h3>' .
                            //contenu descriptif du produit
                            '<div class="information">
                                <img class="photo_produit" src="vue/img/'.strtolower($type).'.jpg" width="140" height="140">
                                <h4 class="description">' . $description . '</h4>
								<div class="achat">
									<h2>' . number_format($prix,2,",","") . '€</h2>
								</div>
                            </div>';
                            ?>
                        </div>
					</div>
					<div id="col4">
						<h2>Une équipe surmotivée pour vous répondre !</h2>
						<div class="equipe">
							<div class="image-personnel" id="horticulteur">
								<div class="overlay1">
									<p class="cv">
										Stéphane notre horticulteur
									</p>
								</div>
								<img src="vue/img/horticulteur.jpg" width="200" height="200">
							</div>
							<div class="image-personnel" id="fermier">
								<div class="overlay2">
									<p class="cv">
										Patrick notre éleveur
									</p>
								</div>
								<img src="vue/img/fermier.jpg" width="200" height="200">
							
							</div>
							<div class="image-personnel" id="ingenieur">
								<div class="overlay3">
									<p class="cv">
										Eric notre ingénieur réseaux
									</p>
								</div>
								<img src="vue/img/ingenieur.png" width="200" height="200">
							</div>
							<div class="image-personnel" id="electronique">
								<div class="overlay4">
									<p class="cv">
										Marine notre responsable technique
									</p>
								</div>
								<img src="vue/img/electronique.jpg" width="200" height="200">
							</div>
						</div>
					</div>						
					</div>
				</div>
		</div>
	</body>

	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>
