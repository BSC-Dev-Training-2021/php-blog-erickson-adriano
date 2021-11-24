<?php  
  require_once 'model/model.php'; 
  require_once 'controller/controller.php'
 ?>  
<!DOCTYPE html>

<!-- Responsive navbar-->
<?php include_once 'header.php';?>
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 align-self-start">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Contact Us header-->
                    <header class="mb-8">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Create a new blog entry</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-3">Express your mind!</div>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <?php  if(isset($success_message)){ echo   $success_message ;} //sucess message  ?>  
                        <form method="post" action="">
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">select photo</small></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"  class="mb-1">Title</label>
                                <input type="text" name="title" class="form-control mb-1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="mb-1">Description</label>
                                <textarea class="form-control mb-1" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="mb-1">Content</label>
                                <textarea class="form-control mb-1" name="content" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mb-1 mt-3">Categories</label>
                                <div class="row">
                                    
                                         <?php  
                                        require_once 'model/view_category.php' ;
                                        $obj = new categories; 
                                        $result = $obj->findAll();  
                                          foreach($result as $row)  
                                          : 
                                          ?>
                                       <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="checkboxvar[]" type="checkbox" value="<?php  echo $row['id'];?>" id="defaultCheck1" >
                                            <label class="form-check-label" for="defaultCheck1">
                                            <?php echo$row['name'];?>
                                            </label>
                                        </div> 
                                    </div>
                                    <?php endforeach; ?>
                                    
                                </div>
                            </div>
                            
                            <button type="submit" name="post_blog" class="btn btn-primary mt-5">Post</button>
                        </form>
                    </section>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
        <!-- Side widgets-->
        
       <?php include_once 'sidewidgets.php';?>
    </div>
</div>
<!-- Footer-->
<?php include_once 'footer.php';?>
