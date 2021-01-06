<div class="Header">
        <img src="img/Logo.png" alt="Logo">
    </div>

    <?php include "menu.php"; ?>

    </div>

        <ul class="menu">
	        <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Trier par ▼ </a>
		        <ul>
			        <li><a href="index.php?OrderBy=<?php echo "nom"; ?>">Ordre Alphabétique</a></li>
			        <li><a href="index.php?OrderBy=<?php echo "durée"; ?>">Durée</a></li>
                    <li><a href="index.php?OrderBy=<?php echo "date"; ?>">Date</a></li>
                </ul>
            </li>
        </ul>
        
        
    </div>