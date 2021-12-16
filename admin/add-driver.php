<?php
include('partials/_dbconnect.php');
include('partials/_header.php');
?>

<?php
// when ever failed to add category display this below message
if (isset($_SESSION['add-category'])) {
    // Display the message
    echo $_SESSION['add-category'];
    // remove the message after showing once 
    unset($_SESSION['add-category']);
}
if (isset($_SESSION['upload'])) {
    // Display the message
    echo $_SESSION['upload'];
    // remove the message after showing once 
    unset($_SESSION['upload']);
}
?>

<div class="container my-5">
    <div id="main-content">

        <div id="wrapper">
            <h1 class="text-center hl1 py-3">Add Driver</h1>

            <form action="" class="was-validated" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Driver Name </label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="license" class="form-label">Driverving license no </label>
                    <input type="text" class="form-control" name="license" id="license" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="aadhar" class="form-label">Aadhar Card No </label>
                    <input type="number" class="form-control" name="aadhar" id="aadhar" aria-describedby="emailHelp">
                </div>



                <div class="mb-2 d-flex align-items-center">
                    <label for="exampleInputEmail1" class="form-label">Featured: </label>
                    <div class="form-check">
                        <input class="form-check-input mx-1" name="featured" type="radio" value="Yes" id="featured">
                        <label class="form-check-label" for="featured">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mx-2" type="radio" name="featured" value="No" id="featured" checked>
                        <label class="form-check-label" for="featured">
                            No
                        </label>
                    </div>
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="exampleInputEmail1" class="form-label">Active: </label>
                    <div class="form-check">

                        <input class="form-check-input mx-1" type="radio" name="active" value="Yes" id="active">
                        <label class="form-check-label" for="active">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mx-2" type="radio" name="active" value="No" id="active" checked>
                        <label class="form-check-label" for="active">
                            No
                        </label>
                    </div>
                </div>



                <div class="mb-3">
                    <label for="image" class="form-label">Select Driver Profile Picture </label>
                    <input type="file" class="form-control" name="image" id="image" aria-label="file example">
                    <div class="invalid-feedback">Invalid Field</div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="submit">Add Driver</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
//Check whether the button is clicked or not
if (isset($_POST['submit'])) {
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo " Clicked";

    // 1.Get the data from Category Form
    $title = $_POST['title'];
    $license = $_POST['license'];
    $aadhar = $_POST['aadhar'];

    // For featured radio input , we need to check whether the button is selected or not
    if (isset($_POST['featured'])) {
        // Get the value from form 
        $featured = $_POST['featured'];
    } else {
        // Set the default value
        $featured = "No";
    }

    // For active radio input , we need to check whether the button is selected or not
    if (isset($_POST['active'])) {
        // Get the value from form 
        $active = $_POST['active'];
    } else {
        // Set the default value
        $active = "No";
    }

    // check whether the image is selected or not and set the value for image name accordingly
    // print_r($_FILES['image']);
    // die();

    if (isset($_FILES['image']['name'])) {
        // Upload the image
        // To Upload Image we need the image name, source path and destination path
        $image_name = $_FILES['image']['name'];

        // Upload the image only if image is selected 
        if ($image_name != "") {



            // Auto rename the image
            $ext = end(explode('.', $image_name));

            // Rename the image
            $image_name = "driver_" . rand(1000000000000000, 10000000000000000) . '.' . $ext;
            // $image_name = "driver_" . rand(0000, 9999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/driver/" . $image_name;

            // Finally upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            // check whether the image is uploaded or not
            // And if the image is not uploaded then we will stop the process redirect the user with error message
            if ($upload == false) {
                // Set sesssion message
                session_start();
                $_SESSION['upload'] = '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Image Failed to Upload.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                // Redirect the user to add driver page
                // header("Location:".SITEURL."admin/add-driver.php");
                // exit;
?>
                <!-- redirecting the user to add driver page -->
                <script type="text/javascript">
                    window.location = "<?php echo SITEURL; ?>admin/add-driver.php";
                </script>
        <?php
            }
        }
    } else {
        // Don't upload the image and set the image_name value as blank
        $image_name = "";
    }

    // 2.Create a SQL query to insert Category into Database
    // $sql = "INSERT INTO `tbl_category` (`title`, `image_name`, `featured`, `active`) VALUES ('$title', '$image_name', '$featured', '$active')";
    $sql = "INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `license`, `aadhar`, `featured`, `active`) VALUES (NULL, '$title', '$image_name', '$license', '$aadhar', '$featured', '$active')";


    // 3. Execute the Query and Save the data into database
    $result = mysqli_query($conn, $sql);

    // 4. Check whether the query executed or not and data added or not

    if ($result == true) {
        //query executed and driver added   
        session_start();
        $_SESSION['add-category'] = '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Driver Added Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';

        // redirect the user to manage driver page

        ?>
        <script type="text/javascript">
            window.location = "<?php echo SITEURL; ?>admin/manage-driver.php";
        </script>
    <?php
    } else {
        // Failed to add driver
        session_start();
        $_SESSION['add-category'] = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to Add driver.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';

        // redirect the user to add driver page
    ?>
        <script type="text/javascript">
            window.location = "<?php echo SITEURL; ?>admin/add-driver.php";
        </script>
<?php
    }
}

?>



<?php
include('partials/_footer.php');
?>