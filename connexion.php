<?php

session_start();

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

try {
    $pdo = new PDO($dsn, $user, $pass, $opt); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $typedeform = $_POST['typedeform'];
        
        if ($typedeform === 'Connexion') {
            $username = $_POST['username_login'];
            $password = $_POST['password_login'];
            
            // LOGIN - CONNEXION
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]); 
            $user = $stmt->fetch(); 
            
            if ($user && $password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: home.php');
                exit();
            } else {
                echo "L'identifiant ou le mot de passe est incorrect";
            }
        } elseif ($typedeform === 'Inscription') {
            $username = $_POST['username_signin'];
            $password = $_POST['password_signin'];   
            
            // SIGNIN - INSCRIPTION
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if (!$user) {
                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->execute([$username, $password]);
            
                // Après la création et l'ajout du nouvel utilisateur dans la database, on le redirige vers la page d'accueil
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                $stmt->execute([$username]);
                $newUser = $stmt->fetch();
            
                if ($newUser) {
                    $_SESSION['user_id'] = $newUser['id'];
                    header('Location: home.php');
                    exit();
                } else {
                    echo "Une erreur est survenue, veuillez réessayer";
                }
            } else {
                echo "L'identifiant rentré existe déjà";
            }
        } else {
            echo "Une erreur est survenue, veuillez réessayer";
        }
    }
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MEDICOM | Connexion </title>
    <link rel="stylesheet" href="main.css">
</head>

<body class="login-page">
    <div class="login-container">
        <h2> Se connecter </h2>
        <form action='index.php' method='post' class="login-form">
            <input name="username_login" type="text" placeholder="Nom d'utilisateur" required>
            <input name="password_login" type="password" placeholder="Mot de Passe" required>
            <input name="typedeform" type="hidden" value="Connexion">
            <button type="submit"> Connexion </button>
        </form>

        <h2> Créer un compte </h2>
        <form action='index.php' method='post' class="register-form">
            <input name="username_signin" type="text" placeholder="Nom d'utilisateur" required>
            <input name="password_signin" type="password" placeholder="Mot de Passe" required>
            <input name="typedeform" type="hidden" value="Inscription">
            <button type="submit" name="register"> Inscription </button>
        </form>
    </div>
</body>
