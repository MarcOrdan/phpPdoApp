<?php
    require 'classes/Database.php';

    $database = new Database;
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if($post['submit']){
        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        
        #$database->query('INSERT INTO posts(title,body) VALUES(:title, :body)');
        $database->query('UPDATE posts set title = :title, body = :body WHERE id = :id');
        $database->bind(':title', $title);
        $database->bind(':body', $body);
        $database->bind(':id', $id);
        $database->execute();
        
      #  if($database->lastInsertId()){
      #      echo '<p>Post Added</p>';
      #  }
    }
  
    $database->query('SELECT * FROM posts');
    /*  EXECUTE THIS IF YOU WANT TO FILTER. 
        example of bind use case.
    $database->query('SELECT * FROM posts WHERE id = :id');
    $database->bind(':id', 1);
    */
    $rows = $database->resultset();
?>

    <h1>ADD POST</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="body">POST ID:</label>
        <br>
        <input type="text" name="id" placeholder="Specify ID">
        <br>
        <label for="body">Interesting Title Here:</label>
        <br>
        <input type="text" name="title" placeholder="Post Title">
        <br>
        <label for="body">Type in your post:</label>
        <br>
        <textarea name="body" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>


    <h1>Blog Bois</h1>
    <div>
    <?php foreach($rows as $row) : ?>
        <div>
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo $row['body']; ?></p>
        </div>
    <?php endforeach ?>
    </div>
    