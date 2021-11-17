<?php
if(isset($_POST['post_blog'])){

$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];

	if (isset($_POST['checkboxvar'])) 
{
   $category = implode(' ', $_POST['checkboxvar']) ;
   echo $category;
}
else {
	$error = 'you need to select category';
}
echo ' '. $title . ' ' . $description . ' ' . $content;


include 'connection.php';
$data = new blogpost;

$insert_array = array(
     'content'=> $content;
     'title' => $title;
     'description' => $description;

)




}

?>