

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/app.js"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="messages.php"><i class="fa fa-envelope-o"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
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
                        ?>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $row['title'];?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2"><?php echo $row['created_date'];?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
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
                                    <!-- Parent comment-->
                                    
                            
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



                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
