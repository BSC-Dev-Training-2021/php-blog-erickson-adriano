<!DOCTYPE html>

<!-- Responsive navbar-->
<?php include_once 'header.php';?>
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">Add Category</h1>
            </header>
            <!-- Submitted messages -->
            <section>
                <form action="" method="post">
                    <input type="text" name="category">
                    <button class="btn btn-primary" id="button-search" type="submit" name="addcategory">Add</button>
                    <!-- insert a new category -->  
                </form>
            </section>
        </div>
        <!-- Side widgets-->
        <?php include_once 'sidewidgets.php';?>
    </div>
</div>
<!-- Footer-->
<?php include_once 'footer.php';?>