<?php 
session_start();

var_dump($_SESSION);

var_dump($_POST);

if (!empty($_POST)) {
    $host = 'mySQL';
    $dbname = 'letscook_php_DB';
    $username = 'root';
    $password = 'root';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Définit le mode d'erreur PDO sur exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO user (first_name, last_name, email, password, role) 
                               VALUES (:first_name, :last_name, :email, :password, :role)");
    
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
    
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $role = $_POST['role'];
    
        // Exécution de la requête
        $stmt->execute();
    
        echo "Insertion réussie !";
    } catch(PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}
else {
        echo "Pas d'info";
}

// header("Location: index.php");
// exit();
?>