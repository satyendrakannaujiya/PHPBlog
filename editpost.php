<?php 

require_once('config/db.php');
require_once('config/config.php');

//chceck for submit

if(isset($_POST['submit'])){
$title = mysqli_real_escape_string($conn,$_POST['title']);
$body = mysqli_real_escape_string($conn,$_POST['body']);
$author = mysqli_real_escape_string($conn,$_POST['author']);
$id = mysqli_real_escape_string($conn,$_POST['update_id']);


   $query = "UPDATE posts SET 
         title='$title',
         author='$author',
         body='$body'
         where id= '$id'
    ";

   if(mysqli_query($conn,$query)){
   	header('Location: '.ROOT_URL.'');
   }else{
   	echo "Error: ".mysqli_error($conn);
   }

}
$id = mysqli_real_escape_string($conn,$_GET['id']);


$query = 'SELECT * FROM posts where id='.$id;


//get the result


$result = mysqli_query($conn,$query);

//fetch data 

$post = mysqli_fetch_assoc($result);

// var_dump($posts);

//free the result


mysqli_free_result($result);

mysqli_close($conn);




?>


<?php include('inc/header.php');?>
<div class="container">
<h1>Add Posts</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	

	<div class="form-group">
		<label >Title</label>
		<input type="text" name="title" class="form-control" value="<?php echo $post['title']?>">
	</div>
	<div class="form-group">
		<label >Author</label>
		<input type="text" name="author" class="form-control" value="<?php echo $post['author']?>">
	</div>
	<div class="form-group">
		<label >Body</label>
		<textarea name="body" class="form-control"><?php echo $post['body']?></textarea>
	</div>
	<input type="hidden" name="update_id" value="<?php  echo $post['id']; ?>">
	<input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
</div>
<?php include('inc/footer.php');?>