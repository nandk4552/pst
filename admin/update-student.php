<?php
include('partials/_dbconnect.php');
include('partials/_header.php');
?>

<?php
// check whether the id is set or not
if (isset($_GET['id'])) {
    // get all the details
    $id = $_GET['id'];

    // sql query to get the selected food 
    $sql2 = "SELECT * FROM tbl_student WHERE id=$id";

    // Execute the query 
    $result2 = mysqli_query($conn, $sql2);

    // get the value based on query executed 
    $row2 = mysqli_fetch_assoc($result2);

    // get the individual values of selected student 
    $full_name = $row2['full_name'];
    $dob = $row2['dob'];
    $price = $row2['price'];
    $class = $row2['class'];
    $parent_name = $row2['parent_name'];
    $parent_number = $row2['parent_number'];
    $school_name = $row2['school_name'];
    $address = $row2['address'];
} else {
    // Redirect to Manage student
    header('location:' . SITEURL . 'admin/manage-student.php');
    die();
}
?>


<div class="container my-5">
    <div id="main-content" class="zindex-2" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,0.3);">

        <div id="wrapper">
            <h1 class="text-center py-3">Update student</h1>

            <form action="" class="was-validated" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Student Name </label>
                    <input type="text" value="<?php echo $full_name; ?>" class="form-control" value="" name="title" id="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" value="<?php echo $dob; ?>" class="form-control" name="dob" id="dob">
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">class</label>
                    <input type="text" value="<?php echo $class; ?>" class="form-control" name="class" id="class">
                </div>
                <div class="mb-3">
                    <label for="parent_name" class="form-label">Parent Name</label>
                    <input type="text" value="<?php echo $parent_name; ?>" class="form-control" name="parent_name" id="parent_name">
                </div>
                <div class="mb-3">
                    <label for="parent_number" class="form-label">Parent Mobile Number</label>
                    <input type="text" value="<?php echo $parent_number; ?>" class="form-control" name="parent_number" id="parent_number">
                </div>
                <div class="mb-3">
                    <label for="school_name" class="form-label">School name</label>
                    <input type="text" value="<?php echo $school_name; ?>" class="form-control" name="school_name" id="school_name">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="<?php echo $address; ?>" type="text" class="form-control" name="address" id="address">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Select New Image </label>
                    <input type="file" class="form-control" name="image" id="image" aria-label="file example">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                    <select class="form-select" name="category" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <?php
                        // Create PHP Code to Display Categories from database
                        // 1. Create a SQL query to get all active categories from database
                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                        // Execute the query 
                        $result = mysqli_query($conn, $sql);

                        // Count Rows to check whether we have categories
                        $count = mysqli_num_rows($result);

                        // If count is greater than zero we have categories else we don't have categories 
                        if ($count > 0) {
                            //  categories available
                            while ($row = mysqli_fetch_assoc($result)) {
                                // get the details of categories
                                $category_title = $row['title'];
                                $category_id = $row['id'];
                        ?>
                                <option <?php if ($current_category == $category_id) {
                                            echo 'selected';
                                        } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

                            <?php
                            }
                        } else {
                            //  categories not available
                            ?>
                            <option value="0">driver Not Available</option>

                        <?php
                        }


                        // 2. Display on Dropdown

                        ?>
                    </select>
                </div>


                <div class="mb-2 d-flex align-items-center">
                    <label for="exampleInputEmail1" class="form-label">Featured: </label>
                    <div class="form-check">

                        <input <?php if ($featured == "Yes") {
                                    echo "checked";
                                } ?> class="form-check-input mx-1" name="featured" type="radio" value="Yes" id="featured">
                        <label class="form-check-label" for="featured">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if ($featured == "No") {
                                    echo "checked";
                                } ?> class="form-check-input mx-2" type="radio" name="featured" value="No" id="featured">
                        <label class="form-check-label" for="featured">
                            No
                        </label>
                    </div>
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="exampleInputEmail1" class="form-label">Active: </label>
                    <div class="form-check">

                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> class="form-check-input mx-1" type="radio" name="active" value="Yes" id="active">
                        <label class="form-check-label" for="active">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> class="form-check-input mx-2" type="radio" name="active" value="No" id="active">
                        <label class="form-check-label" for="active">
                            No
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <button class="btn btn-primary" type="submit" name="submit">Add Food</button>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                // echo " Button Clicked!";

                // 1. Get all the details from the form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $description = $_POST['description'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // 2. Upload the image if selected
                if (isset($_FILES['image']['name'])) {
                    // Upload button clicked 
                    // New Image Name 
                    $image_name = $_FILES['image']['name'];

                    // check whether the file is available or not
                    if ($image_name != "") {
                        // image is available 
                        // A. Uploading New Image

                        // Rename the image
                        $ext = end(explode('.', $image_name));
                        $image_name = "Food-Name-" . rand(0000, 9999) . '.' . $ext;

                        // get the src path and destination path
                        // source path
                        $src_path = $_FILES['image']['tmp_name'];
                        // destination path
                        $dest_path = "../images/food/" . $image_name;

                        // upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        // check whether the image is uploaded or not
                        if ($upload == false) {
                            // Failed to upload
                            $_SESSION['upload'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>Failed to upload new Image.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                            //   redirect to manage food 
                            header('location:' . SITEURL . 'admin/manage-food.php');
                            die();
                        }
                        // 3.Remove the image if new image is uploaded and current image exists

                        // B. Remove current Image if available
                        if ($current_image != "") {
                            // Current Image is Available
                            // remove the image 
                            $remove_path = "../images/food/" . $current_image;

                            $remove = unlink($remove_path);

                            // check whether the image is removed or not
                            if ($remove == false) {
                                // failed to remove current Image
                                $_SESSION['remove-failed'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Failed to remove current image.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';

                                //   redirect to manage food
                                header('location:' . SITEURL . 'admin/manage-food.php');
                                die();
                            }
                        }
                    } else {
                        // default image when image is not selected 
                        $image_name = $current_image;
                    }
                } else {
                    // default image when button is not clicked
                    $image_name = $current_image;
                }


                // 4. Update the Food in Database
                $sql3 = "UPDATE tbl_food SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        image_name = '$image_name',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'
                        WHERE id=$id
                ";

                // execute the sql query
                $result3 = mysqli_query($conn, $sql3);

                // check whether the query is executed or not
                // Redirect to Manage Food with Session message
                if ($result3 == true) {
                    // query executed and food updated
                    $_SESSION['update'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Food Updated Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    header('location:' . SITEURL . 'admin/manage-food.php');
                    die();
                } else {
                    // Failed to Update food
                    $_SESSION['update'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Failed to update food.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    header('location:' . SITEURL . 'admin/manage-food.php');
                    die();
                }
            }
            ?>

        </div>
    </div>
</div>




<?php
include('partials/_footer.php');
?>