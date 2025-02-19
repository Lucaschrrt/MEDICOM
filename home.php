<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> MEDICOM | Accueil </title>
    <link rel="icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="home-page">
    <header>
        <h1> MEDICOM </h1>
    </header>

    <nav>
        <a href="home.php"> Accueil </a>
        <a href="gestionProduit.php"> Gestion des Produits </a>
        <a href="logout.php" class="log"> Déconnexion </a>
    </nav>

    <main>
        <h1 id="bvn"> Bienvenue dans notre pharmacie MEDICOM </h1>
        <p id=pbvn> 
            Chez MEDICOM, notre mission est de fournir des soins 
            de santé de qualité à nos clients. Notre équipe de professionnels
            de la santé est là pour vous aider à trouver les meilleurs produits
            pour vous et votre famille. Nous nous engageons à offrir
            une large gamme de produits pharmaceutiques de haute qualité,
            allant des médicaments essentiels aux équipements médicaux. 
            Nous mettons l'accent sur la sécurité, l'efficacité et le service
            client, afin de répondre aux besoins de chacun de nos clients. 
            Contactez-nous dès aujourd'hui pour en savoir plus sur nos services 
            et découvrez comment nous pouvons vous aider à prendre soin de votre santé. </p>
    </main>

    <section id="product">
        <h2> Présentation générale </h2>
        <p> Voici quelques-uns des produits que nous offrons à nos clients : </p>

        <div class="product-container"> 
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/35616.L.jpg?crop=center&height=1024&v=1720631110&width=1024" alt="Produit 1">
                <h3> Stethoscope </h3>
                <p> 
                    Le stethoscope est un outil essentiel pour les professionnels de la santé. 
                    Il permet d'écouter les sons internes du corps, tels que les battements du 
                    coeur et les bruits respiratoires, afin de diagnostiquer les problèmes de santé.
                </p>
            </div>
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/40214.L.jpg?crop=center&height=1024&v=1720594695&width=1024" alt="Produit 2">
                <h3> Trousse de secours </h3>
                <p> 
                    La trousse de secours est un equipement indispensable pour les situations d'urgence. 
                    Elle contient différents articles medicaux tels que des pansements, des compresses, 
                    des bandages, des ciseaux, etc... Qui peuvent etre utilisés pour traiter les blessures 
                    et les urgences medicales.
                </p>
            </div>
            <div class="product">
                <img src="https://www.ccpartners.fr/564-medium_default/masque-chirurgical-en14683-type-1-bleu.jpg" alt="Produit 3">
                <h3> Masques </h3>
                <p> 
                    Les masques sont utilisés pour protéger le visage et les voies respiratoires des particules, 
                    des bactéries et des virus présents dans l'air. Ils sont largement utilisés dans les 
                    environnements médicaux et industriels pour prévenir la propagation des maladies et assurer 
                    la sécurité des travailleurs.
                </p>
            </div>
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/35398.L.jpg?crop=center&height=1024&v=1720593899&width=1024" alt="Produit 4">
                <h3> Ciseaux </h3>
                <p> 
                    Les ciseaux medicaux sont des instruments utilisés pour couper les tissus mous lors des 
                    interventions chirurgicales et des procédures medicales. Ils sont faits pour être précis 
                    et durables, et sont disponibles dans différentes tailles et formes pour répondre aux 
                    besoins specifiques des professionnels de la santé.
                </p>
            </div>
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/36906.L.jpg?crop=center&height=1024&v=1720593942&width=1024" alt="Produit 5">
                <h3> Pince </h3>
                <p> 
                    La pince de dissection est un instrument utilise pour saisir et manipuler les tissus lors 
                    des procedures chirurgicales et des dissections anatomiques. Elle est faite pour offrir une 
                    bonne prehension et une precision dans les gestes du praticien.
                </p>
            </div>
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/36435.L.jpg?crop=center&height=1024&v=1719996325&width=1024" alt="Produit 6">
                <h3> Rouleau Papier </h3>
                <p> 
                    Papier d'Essuyage Plus Tork résistant et absorbant afin d'éponger les liquides et d'essuyer 
                    les mains rapidement. 
                </p>
            </div>
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/5510.L.jpg?crop=center&height=1024&v=1719996110&width=1024" alt="Produit 7">
                <h3> Pansements </h3>
                <p> 
                    Pansements predecoupes enveloppe individuellement. Resistants a l'eau : support 
                    polyethylene microperfore couleur chair. 
                </p>
            </div>
            <div class="product">
                <img src="https://nmmedical.fr/cdn/shop/files/50702.L.jpg?crop=center&height=1024&v=1718870824&width=1024" alt="Produit 8">
                <h3> Sérum physiologique </h3>
                <p> 
                    Solution physiologique stérile permettant le nettoyage nasal et oculaire des nourrissons, 
                    enfants et adultes, ainsi que le nettoyage superficiel des petites plaies cutanées. 
                    Il peut être également utilisé pour rincer les lentilles oculaires, ou dans un nébuliseur.
                </p>
            </div>
        </div>
    </section>

    <br><br><br>

    <?php

        // Config DB
        $host = getenv('DBHOST');
        $db   = getenv('DBNAME');
        $user = getenv('DBUSER');
        $pass = getenv('DBPASS');
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $opt);

        class Medicament {
            public $photo;
            public $nom;
            public $prix;
            public $quantite;
            public $date_ajout;
            public $date_expiration;
            public $description;

            public function __construct($photo, $nom, $prix, $quantite, $date_ajout, $date_expiration, $description) {
                $this->photo = $photo;
                $this->nom = $nom;
                $this->prix = $prix;
                $this->quantite = $quantite;
                $this->date_ajout = $date_ajout;
                $this->date_expiration = $date_expiration;
                $this->description = $description;
            }
        }

        // Récupération des médicaments
        $stmt = $pdo->query('SELECT photo, nom, prix, quantite, date_ajout, date_expiration, description FROM medicaments');
        $medicaments = [];
        while ($row = $stmt->fetch())
        {
            $medicaments[] = new Medicament($row['photo'], $row['nom'], $row['prix'], $row['quantite'], $row['date_ajout'], $row['date_expiration'], $row['description']);
        }
    ?>

        <h2> Détails de nos médicaments </h2>

    <?php
        echo "<table>";
        echo "<tr> <th>Photo</th> <th>Nom</th> <th>Prix</th> <th>Quantité</th> <th>Date d'ajout</th> <th>Date d'expiration</th> <th>Description</th> </tr>";

        foreach ($medicaments as $medicament) {
            echo "<tr>";
            echo "<td><img src='" . $medicament->photo . "' alt='" . $medicament->nom . "'></td>";
            echo "<td>" . $medicament->nom . "</td>";
            echo "<td>" . $medicament->prix . " €</td>";
            echo "<td>" . $medicament->quantite . "</td>";
            echo "<td>" . $medicament->date_ajout . "</td>";
            echo "<td>" . $medicament->date_expiration . "</td>";
            echo "<td>" . $medicament->description . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>

    <br><br><br><br>

    <footer>
        <p> Pharmacie MEDICOM : </p>
        <p> 12 Rue de Gerland </p>
        <p> ISITECH, Lyon, 69007</p>
        <p> Téléphone: 091567890</p>
        <p> Courriel: EmreLucas@mail.fr </p>
        <div> &copy; 2024 MEDICOM </div>
    </footer>
</body>
</html>