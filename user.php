<?php
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

// try {
//     $stmt = $pdo->prepare("INSERT INTO user (first_name, last_name, email, password, role) 
//                            VALUES (:first_name, :last_name, :email, :password, :role)");

//     $stmt->bindParam(':first_name', $first_name);
//     $stmt->bindParam(':last_name',  $last_name);
//     $stmt->bindParam(':email', $email);
//     $stmt->bindParam(':password', $password);
//     $stmt->bindParam(':role', $role);

//     $first_name = 'Lola';
//     $last_name = 'Schiltz';
//     $email = 'lola@mail.com';
//     $password = '123456'; 
//     $role = 'member';

//     // Exécution de la requête
//     $stmt->execute();

//     echo "Insertion réussie !";
// } catch(PDOException $e) {
//     echo "Erreur d'insertion : " . $e->getMessage();
// }

// try {
//     $stmt = $pdo->prepare("UPDATE user SET first_name = :first_name WHERE id = :id");
//     $stmt->bindValue(':id', '1');
//     $stmt->bindValue(':first_name', 'Genie');

//     $stmt->execute();
// } catch(PDOException $e) {
//     echo "Erreur de mise à jour : " . $e->getMessage();
// }

// try {
//     $stmt = $pdo->prepare("DELETE FROM user WHERE id = :id");
//     $stmt->bindParam(':id', $id);

//     // Remplacer la condition
//     $id = 2;
//     $stmt->execute();
// } catch(PDOException $e) {
//     echo "Erreur de suppression : " . $e->getMessage();
// }
?>
