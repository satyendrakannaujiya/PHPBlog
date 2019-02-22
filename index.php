<?php 

require_once('config/db.php');
require_once('config/config.php');

$query = 'SELECT * FROM posts ORDER BY created_at DESC';


//get the result


$result = mysqli_query($conn,$query);

//fetch data 

$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

// var_dump($posts);

//free the result


mysqli_free_result($result);

mysqli_close($conn);

?>


<?php include('inc/header.php');?>
<div class="container">
<h1>Articles</h1>
<?php foreach($posts as $post): ?>

  <div  style="border: 0.1px solid black;border-radius: 5px;margin-bottom: 5px;padding-left: 5px;">
  	<h3><?php echo $post['title'];?></h3>
  	<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
  	<p><?php echo $post['body']; ?></p>
  	<a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Read More</a>
  </div>
<?php endforeach; ?>
</div>
<?php include('inc/footer.php');?>