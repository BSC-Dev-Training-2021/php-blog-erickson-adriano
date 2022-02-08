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
                                
                                         <?php  
                                            require_once("model/model.php");
                                            require_once("model/view_category.php");
                                            $obj = new categories(); 
                                            $result = $obj->findAll(); 
                                            foreach ($result as $row) :
                                               
                                               
                                      ?>
                                    <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="index.php?id=<?php echo $row['id'];?>"><?php echo  $row['name']; ?></a></li>
                                        
                                    </ul>
                                    </div>
                                <?php endforeach;?>
                                 </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>