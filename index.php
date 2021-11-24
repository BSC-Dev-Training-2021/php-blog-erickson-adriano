
<!DOCTYPE html>
<?php include_once 'header.php';?>        <!-- Responsive navbar-->
         
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4"> 
                <div class="row">
                 <?php
             // filtering blog post
                    if(isset($_GET['id'])){

                        $id= $_GET['id'];
                             require_once 'model/model.php';
                               require_once("model/blog_post_categories.php");
                                $obj = new postcat(); 
                                $res = $obj->findId( $id);
                                foreach ($res as $blog_id) {
                                                $id_blog = $blog_id['blog_post_id']; 
                                        require_once("model/blogpost.php");
                                        $obj = new post(); 
                                        $result = $obj->findById($id_blog); 
                                    foreach ($result as $row) :?>
                                <a href="#!">
                                    <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." />
                                </a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo $row['created_date'];?></div>
                                        <h2 class="card-title"><h2><?php echo $row['title'];; ?></h2>
                                        <p class="card-text"><?php echo $row['description'];?></p>
                                        <a   class="btn btn-primary" href="article.php?id=<?php echo $row['id']; ?>">Read more →</a>
                                    </div>
                            <?php endforeach;} ?>
                        <?php
                    }
                    else{
                        require_once("model/view_post_blog.php");
                        $obj = new view(); 
                        $result = $obj->findAll(); 
                        foreach ($result as $row) :
                            ?>
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                      
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $row['created_date'];?></div>
                            <h2 class="card-title"><h2><?php echo $row['title'];; ?></h2>
                            <p class="card-text"><?php echo $row['description'];?></p>
                            <a   class="btn btn-primary" href="article.php?id=<?php echo $row['id']; ?>">Read more →</a>
                        </div>
                    <?php endforeach; } ?>
                </div>
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
       <?php include_once 'sidewidgets.php';?>
    </div>
</div>
<!-- Footer-->
<?php include_once 'footer.php';?>