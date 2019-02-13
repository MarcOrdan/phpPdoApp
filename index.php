<?php
    require 'classes/Database.php';

    $database = new Database;

    $database->query('SELECT * FROM posts');
    /*  EXECUTE THIS IF YOU WANT TO FILTER. 
        example of bind use case.
    $database->query('SELECT * FROM posts WHERE id = :id');
    $database->bind(':id', 1);
    */
    $rows = $database->resultset();
?>

    <h1>Blog Bois</h1>
    <div>
    <?php foreach($rows as $row) : ?>
        <div>
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo $row['body']; ?></p>
        </div>
    <?php endforeach ?>
    </div>
    