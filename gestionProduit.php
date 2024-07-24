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
    <title>MEDICOM | Gestion Produits</title>
    <link rel="icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="home-page">
    <header>
        <h1>MEDICOM</h1>
    </header>

    <nav>
        <a href="home.php">Accueil</a>
        <a href="gestionProduit.php">Gestion des Produits</a>
        <a href="logout.php" class="log">Déconnexion</a>
    </nav>

    <h1 id="bvn">Gestion des Produits</h1>
    <p>
        Voici notre tableau de gestion de produits, conçu pour vous fournir des informations détaillées sur nos médicaments.
        C'est un outil indispensable pour gérer le stock de médicaments. Grâce à lui, vous pouvez modifier et supprimer les 
        données enregistrés pour chaque médicaments présents dans notre inventaire.
    </p>

    <?php
    // Config DB
    $host = getenv('DBHOST');
    $db = getenv('DBNAME');
    $user = getenv('DBUSER');
    $pass = getenv('DBPASS');
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);

    // Récupération des médicaments
    $stmt = $pdo->query('SELECT id, nom, prix, quantite, date_ajout, date_expiration FROM medicaments');
    $medicaments = [];
    while ($row = $stmt->fetch()) {
        $medicaments[] = $row;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM medicaments WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: gestionProduit.php");
            exit();
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];
            $date_ajout = $_POST['date_ajout'];
            $date_expiration = $_POST['date_expiration'];
            
            $stmt = $pdo->prepare("UPDATE medicaments SET nom = ?, prix = ?, quantite = ?, date_ajout = ?, date_expiration = ? WHERE id = ?");
            $stmt->execute([$nom, $prix, $quantite, $date_ajout, $date_expiration, $id]);
            header("Location: gestionProduit.php");
            exit();
        }
    }

    echo "<table>";
    echo "<tr> <th>Nom</th> <th>Prix</th> <th>Quantité</th> <th>Date d'ajout</th> <th>Date d'expiration</th> <th>Actions</th> </tr>";

    foreach ($medicaments as $medicament) {
        echo "<tr>";
        echo "<form method='post' action='gestionProduit.php'>";
        echo "<td><input type='text' name='nom' value='" . $medicament['nom'] . "'></td>";
        echo "<td><input type='text' name='prix' value='" . $medicament['prix'] . "'> €</td>";
        echo "<td><input type='text' name='quantite' value='" . $medicament['quantite'] . "'></td>";
        echo "<td><input type='text' name='date_ajout' value='" . $medicament['date_ajout'] . "'></td>";
        echo "<td><input type='text' name='date_expiration' value='" . $medicament['date_expiration'] . "'></td>";
        echo "<td>
                <input type='hidden' name='id' value='" . $medicament['id'] . "'>
                <input type='submit' name='update' value='Modifier'>
                <input type='submit' name='delete' value='Supprimer'>
              </td>";
        echo "</form>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <br><br><br><br>

    <footer>
        <p>Pharmacie MEDICOM :</p>
        <p>12 Rue de Gerland</p>
        <p>ISITECH, Lyon, 69007</p>
        <p>Téléphone: 091567890</p>
        <p>Courriel: EmreLucas@mail.fr</p>
        <div>&copy; 2024 MEDICOM</div>
    </footer>
</body>
</html>