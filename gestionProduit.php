<?php
    session_start(); // Démarrage de la session
    if (!isset($_SESSION['user_id'])) { // Si l'utilisateur n'est pas connecté
        header('Location: connexion.php'); // Redirection vers la page de connexion
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> MEDICOM | Gestion Produits </title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="home-page">
    <header>
        <h1> Pharmacie MEDICOM </h1>
    </header>

    <nav>
        <a href="home.php"> Accueil </a>
        <a href="gestionProduit.php"> Gestion des Produits </a>
        <a href="logout.php" class="log"> Déconnexion </a>
    </nav>

    <h1 id="bvn"> Gestion des Produits </h1>
    <p>
        Voici notre tableau de bord, conçu pour vous fournir des informations détaillées sur nos produits. 
        Il vous permet de voir quels produits sont encore en stock, ceux qui sont en rupture, 
        ainsi que les produits les plus et les moins vendus. De plus, il vous alerte lorsque 
        le stock d'un produit est inférieur à 10. C'est un outil indispensable pour rester informé de 
        l'état de notre inventaire.
    </p>
    
    <?php

    // Pour l'authentification utiliser Patherne mvc

    // Config DB
    $host = 'localhost';
    $db   = 'medicomdb';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    
    class Medicament {
        public $nom;
        public $prix;
        public $quantite;
        public $date_ajout;
        public $date_expiration;
        public $photo;
    
        public function __construct($nom, $prix, $quantite, $date_ajout, $date_expiration, $photo) {
            $this->nom = $nom;
            $this->prix = $prix;
            $this->quantite = $quantite;
            $this->date_ajout = $date_ajout;
            $this->date_expiration = $date_expiration;
            $this->photo = $photo;
        }
    }

    // Récupération des médicaments
    $stmt = $pdo->query('SELECT nom, prix, quantite, date_ajout, date_expiration, photo FROM medicaments');
    $medicaments = [];
    while ($row = $stmt->fetch())
    {
        $medicaments[] = new Medicament($row['nom'], $row['prix'], $row['quantite'], $row['date_ajout'], $row['date_expiration'], $row['photo']);
    }

    echo "<table>";
    echo "<tr><th>Nom</th> <th>Prix</th> <th>Quantité</th> <th>Date d'ajout</th> <th>Date d'expiration</th> <th>Photo</th> </tr>";

    foreach ($medicaments as $medicament) {
        echo "<tr>";
        echo "<td>" . $medicament->nom . "</td>";
        echo "<td>" . $medicament->prix . " €</td>";
        echo "<td>" . $medicament->quantite . "</td>";
        echo "<td>" . $medicament->date_ajout . "</td>";
        echo "<td>" . $medicament->date_expiration . "</td>";
        echo "<td>" . $medicament->photo . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>




    <br><br><br><br>

    <footer>
        <p> Pharmacie MEDICOM : </p>
        <p> 12 Rue de Gerland </p>
        <p> ISITECH, Lyon, 69007</p>
        <p> Telephone: 091567890</p>
        <p> Courriel: EmreLucas@mail.fr</p>
        <div> &copy; 2024 MEDICOM</div>
    </footer>
</body>
</html>