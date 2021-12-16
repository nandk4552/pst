<?php
include('partials/_header.php');
?>
<?php
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if (isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if (isset($_SESSION['unauthorize'])) {
    echo $_SESSION['unauthorize'];
    unset($_SESSION['unauthorize']);
}
if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
?>


<div class="container mt-5 py-5">
    <h1 class="text-center">Manage Students</h1>
    <div id="main-content" class="py-3 shadow-lg ">
        <div id="wrapper" class="p-3 m-3">

            <!-- add driver section starts -->
            <a href="<?php echo SITEURL; ?>admin/add-student.php" class="btn btn-primary btn-sm my-3">Add Student</a>

            <table class="tbl-full my-3 table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Class</th>
                        <th scope="col">Parent Name</th>
                        <th scope="col">Parent Mobile Number</th>
                        <th scope="col">school</th>
                        <th scope="col">address</th>
                        <th scope="col">Actions</th>
                    </tr>

                </thead>

                <?php
                // create sql query to get all the food
                $sql = "SELECT * FROM tbl_student";
                // INSERT INTO `tbl_student` (`id`, `full_name`, `dob`, `class`, `parent_name`, `parent_number`, `school_name`, `address`) VALUES ('1', 'sujeeth', '2015-12-08', '', 'd uncle', '01234567897', 'ma school ', 'ma illu');
                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Count the rows to check whether we have food or not
                $count = mysqli_num_rows($result);
                // Create serial number variable
                $sno = 1;

                if ($count > 0) {
                    //  We have food in Database
                    // Get the Foods from Database and Display
                    while ($row = mysqli_fetch_assoc($result)) {
                        // get the values from Individual columns
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $dob = $row['dob'];
                        $class = $row['class'];
                        $parent_name = $row['parent_name'];
                        $parent_number = $row['parent_number'];
                        $school_name = $row['school_name'];
                        $address = $row['address'];
                ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?php echo $sno++; ?>.</td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $dob; ?></td>
                                <td><?php echo $class; ?></td>
                                <td><?php echo $parent_name; ?></td>
                                <td><?php echo $parent_number; ?></td>
                                <td><?php echo $school_name; ?></td>
                                <td><?php echo $address; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-student.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">Update student</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-student.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger btn-sm">Delete student</a>
                                </td>

                            </tr>
                        </tbody>


                <?php
                    }
                } else {
                    // Food not Added in Database
                    echo "<tr>
                            <td colspan='7' class='text-danger'>student not Added Yet.</td>
                          </tr>";
                }


                ?>


            </table>

        </div>
    </div>
</div>



<?php
include('partials/_footer.php');
?>