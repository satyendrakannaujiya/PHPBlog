<?php 

require_once('config/db.php');
require_once('config/config.php');

//chceck for submit

if(isset($_POST['submit'])){
$title = mysqli_real_escape_string($conn,$_POST['title']);
$body = mysqli_real_escape_string($conn,$_POST['body']);
$author = mysqli_real_escape_string($conn,$_POST['author']);


   $query = "INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";

   if(mysqli_query($conn,$query)){
   	header('Location: '.ROOT_URL.'');
   }else{
   	echo "Error: ".mysqli_error($conn);
   }

}



?>


<?php include('inc/header.php');?>
<div class="container col-md-4">
<h1>Add Posts</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	

	<div class="form-group">
		<label >Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label >Author</label>
		<input type="text" name="author" class="form-control">
	</div>
	<div class="form-group">
		<label >Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
</div>
<?php include('inc/footer.php');?>