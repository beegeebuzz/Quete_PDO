<?php
// Connection à la BDD
require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$lastname = trim($_POST['lastname']); // get the data from a form

$query = "SELECT * FROM friend WHERE lastname=:lastname";
$statement = $pdo->prepare($query);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();
$friends = $statement->fetchAll();
?>
<div>
    <h1>PDO, my best friend</h1>
    <ul>
        <?php foreach ($friends as $friend) { ?>
        <li><?php echo $friend['firstname'] . ' ' . $friend['lastname']; } ?></li>
    </ul>
    <form action="/connec.php" method="post">
        <div>
            <label for="name">Lastname :</label>
            <input type="text" id="name" name="user_name">
        </div>
        <div>
            <label for="mail">Firstname :</label>
            <input type="text" id="firstname" name="user_first_name">
        </div>
        <div class="button">
            <button type="submit">Enregistrer</button>
        </div>
    </form>
</div>