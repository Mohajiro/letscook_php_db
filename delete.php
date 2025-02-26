<?php 
$host = 'mySQL'; 
$dbname = 'letscook_php_DB';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}


if (!empty($_GET['id'])) {
    $id = (int) $_GET['id']; 

    try {
        $stmt = $pdo->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: index.php");
        exit(); 
    } catch(PDOException $e) {
        echo "Erreur de suppression : " . $e->getMessage();
    }
} else {
    echo "ID utilisateur non valide.";
}
?>