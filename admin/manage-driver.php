<?php
include('partials/_dbconnect.php');
include('partials/_header.php');

?>


<?php
// if success to add category show message 
if (isset($_SESSION['add-category'])) {
    // Displaying message
    echo $_SESSION['add-category'];
    // removing after showing message once
    unset($_SESSION['add-category']);
}
if (isset($_SESSION['remove'])) {
    // Displaying message
    echo $_SESSION['remove'];
    // removing after showing message once
    unset($_SESSION['remove']);
}
if (isset($_SESSION['delete'])) {
    // Displaying message
    echo $_SESSION['delete'];
    // removing after showing message once
    unset($_SESSION['delete']);
}
if (isset($_SESSION['no-category-found'])) {
    // Displaying message
    echo $_SESSION['no-category-found'];
    // removing after showing message once
    unset($_SESSION['no-category-found']);
}
if (isset($_SESSION['update-category'])) {
    // Displaying message
    echo $_SESSION['update-category'];
    // removing after showing message once
    unset($_SESSION['update-category']);
}
if (isset($_SESSION['upload'])) {
    // Displaying message
    echo $_SESSION['upload'];
    // removing after showing message once
    unset($_SESSION['upload']);
}
if (isset($_SESSION['failed-remove'])) {
    // Displaying message
    echo $_SESSION['failed-remove'];
    // removing after showing message once
    unset($_SESSION['failed-remove']);
}

?>


<div class="container mt-5 py-5">
    <h1 class="text-center">Manage Drivers</h1>
    <div id="main-content" class="py-3">
        <div id="wrapper">
            <div class="col-lg-12">
                <div>
                    <!-- add category section starts -->
                    <a href="<?php echo SITEURL; ?>admin/add-driver.php" class="btn btn-primary btn-sm">Add Driver</a>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>sno</th>
                            <th>Driver Name</th>
                            <th>Driver Photo</th>
                            <th>Driving License no</th>
                            <th>Aadhar No</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                        // Query to get all driver from database 
                        $sql = "SELECT * FROM `tbl_category`";

                        // Execute the query
                        $result = mysqli_query($conn, $sql);

                        // Count the rows
                        $count = mysqli_num_rows($result);

                        // Create serial number variable
                        $sno = 0;


                        // Check whether we have data in database or not
                        if ($count > 0) {
                            // we have data in database
                            // get the data and display
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $license = $row['license'];
                                $aadhar = $row['aadhar'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                $sno++;
                        ?>
                                <tr>
                                    <td><?php echo $sno ?>.</td>
                                    <td><?php echo $title ?></td>


                                    <td>
                                        <?php
                                        // check whether image name is available or not
                                        if ($image_name != "") {
                                            // Display the image
                                        ?>

                                            <img src="<?php echo SITEURL; ?>images/driver/<?php echo $image_name ?>" alt="" width="100px">

                                        <?php
                                        } else {
                                            // Display the message
                                            echo '
                                        <div class="text-danger">
                                         Image Not Added
                                      </div>
                                            ';
                                        }
                                        ?>
                                    </td>

                                        
                                    <td><?php echo $license ?></td>
                                    <td><?php echo $aadhar ?></td>
                                    <td><?php echo $featured ?></td>
                                    <td><?php echo $active ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-driver.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">Update Driver</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-driver.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger btn-sm">Delete Driver</a>
                                    </td>
                                </tr>
                            <?php


                            }
                        } else {
                            // we donot have data
                            // We'll display message inside table
                            ?>

                            <tr>
                                <td>
                                    <div class="text-danger" role="alert">
                                        No driver Added
                                    </div>
                                </td>
                            </tr>

                        <?php


                        }

                        ?>


                    </table>

                    <!-- add driver section ends -->
                </div>
            </div>
        </div>


        <?php
        include('partials/_footer.php');
        ?>