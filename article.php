
<!DOCTYPE html>
<!-- Responsive navbar-->
 <?php include_once 'header.php';?>
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
               <?php
                 $id_article = $_GET['id'];
                    require_once 'model/view_post_blog.php';
                    $obj = new view(); 
                    $result = $obj->findById($id_article); 
                    foreach ($result as $row):
                        $id_blog = $row['id'];
                ?>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo $row['title'];?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?php echo $row['created_date'];?></div>
                    <!-- Post categories-->
                    <?php  
                        require_once 'model/blog_post_categories.php';
                        $obj = new postcat(); 
                        $result = $obj->findIdcat("blog_post_id",$id_blog); 
                        foreach ($result as $catid){
                           $cat_id = $catid['category_id'];

                            require_once 'model/view_category.php';
                            $obj = new categories(); 
                            $result = $obj->findById($cat_id); 
                            foreach ($result as $catname){
                             $name = $catname['name'];?>
                        <a class="badge bg-secondary text-decoration-none link-light" href="index.php?id=<?php echo $catname['id'];?>"><?php echo $name;?></a>
                             <?php
                            };
                        };
                    ?>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?php echo $row['content'];?></p>
                    <p class="fs-5 mb-4"><?php echo $row['content'];?></p>
                    <p class="fs-5 mb-4"><?php echo $row['content'];?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?php echo $row['content'];?></h2>
                    <p class="fs-5 mb-4"><?php echo $row['content'];?></p>
                    <p class="fs-5 mb-4"><?php echo $row['content'];?></p>
                  <?php  endforeach;?>
                </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form method="post" action="" class="mb-4">
                            <div>
                                <textarea class="form-control mb-2" rows="3" name="comment_post" placeholder="Join the discussion and leave a comment!"></textarea>
                            </div>
                            <input type="hidden" name="id_article" value="<?php echo $id_article?>">
                            <div>
                                <button type="submit" name="comment" class="btn btn-primary">Post Comment</button>
                            </div>
                        </form>
                        <!-- Comment with nested comments-->
                        <?php
                            if (isset($_POST['comment'])){
                                 $userid = "1";
                               $date =  $created_date = date("l jS \of F Y ", time());
                               require_once 'model/model.php';
                                 require_once'model/comment.php';
                                $data = new comment();
                                $insert_comment = array(  
                                'comment'        =>     mysqli_real_escape_string($data->con, $_POST['comment_post']),  
                                'user_id'        =>     mysqli_real_escape_string($data->con, $userid),
                                'article_id'     =>     mysqli_real_escape_string($data->con, $_POST['id_article']),
                                'comment_date'   =>     mysqli_real_escape_string($data->con, $date),
                                        );
                                 $data->insert($insert_comment);    
                                }
                        ?>
                        <!-- Single comment-->
                       
                             <?php  
                                    
                                require_once 'model/user.php';
                                $obj = new user(); 
                                 $user_id ="1";
                                $result = $obj->findById( $user_id); 
                                foreach ($result as $row) {
                                           $name = $row['name'];
                                            $id_author= $row['id'];   
                                 }
                                    require_once 'model/comment.php';
                                    $obj2 = new comment(); 
                                    $result2 = $obj2->findcommentById( $id_author,$id_article); 
                                    foreach ($result2 as $row2) :   
                                    $comments = $row2['comment'];      
                                ?>
                           <div class="d-flex">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold"><?php echo $name;?></div>
                                
                                <?php echo $comments;?>
                            </div>
                        </div>
                        <br>    
                        <?php  endforeach;?>
                    </div>
                </div>
            </section>
        </div>
        <!-- Side widgets-->
     <?php include_once 'sidewidgets.php';?>
    </div>
</div>
<!-- Footer-->
<?php include_once 'footer.php';?>