<?php
session_start();
$_SESSION['isConnected']='On';

$host = 'mysql';
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
    $stmt = $pdo->prepare("SELECT * FROM user");
    $stmt->execute();

    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $rows=$resultats;

} catch(PDOException $e) {
    echo "Erreur de lecture : " . $e->getMessage();
}

$name="Toto";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
    <?php 
    include 'inc/header.php';
    ?>
    <h1>
        Welcome
        <?php 
        echo $name;
        ?>
    </h1>
    <h2>
        Liste des utilisateurs
    </h2>
    <table>
        <tr>
            <th>Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created at</th>
        </tr>
            <?php 
                foreach ($rows as $row):
                    ?> 
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <td><?php echo $row['created_date'] ?></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete user</a></td>
                    </tr>
                    <?php
                endforeach;
            ?>
    </table>
    <br />
    <h2>Creation d'un utilisateur</h2>
    <form action="create_user.php" method="POST">
        <label for="first-name">First name</label>
        <input type="text" name="first-name" id="first-name" placeholder="John"> 
        <br />

        <label for="last-name">Last name</label>
        <input type="text" name="last-name" id="last-name" placeholder="Smith">
        <br />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="exemple@gmail.com">
        <br />

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br />
        <label for="role">Role</label>
        <input type="role" name="role" id="role">
        <br />

        <button type="submit">Valider</button>

    </form>

    <a href="delete.php">Delete user</a>
    <!-- <a href="create_user.php?test=abs">test</a> -->
    <?php 
    include 'inc/footer.php';
    ?>
</body>
</html>
