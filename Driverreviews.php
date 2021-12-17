<style>
    .checked {
        color: orange;
    }
</style>
<div class="container">
    <h1 class="text-center">Driver Reviews</h1>
    <div class="row gap-2">
        <div class="text-center col-md-6 card d-flex align-items-center" style="width: 18rem;">
            <img src="images/user.jpeg" style="width: 60px;" class="mt-3 card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sujeeth</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, facere.</p>
                <ul>
                    <li>History</li>
                    <li>Behaviour</li>
                    <li>Work experence</li>
                </ul>
                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>

        <div class="card text-center col-md-6  d-flex align-items-center" style="width: 18rem;">
            <img src="images/user.jpeg" style="width: 60px;" class="mt-3 card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sujeeth</h5>
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, eaque</p>
                <ul>
                    <li>History</li>
                    <li>Behaviour</li>
                    <li>Work experence</li>
                </ul>
                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>

        <div class="card text-center col-md-6  d-flex align-items-center" style="width: 18rem;">
            <img src="images/user.jpeg" style="width: 60px;" class="mt-3 card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sujeeth</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, natus.</p>
                <ul>
                    <li>History</li>
                    <li>Behaviour</li>
                    <li>Work experence</li>
                </ul>
                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>

        <div class="card text-center col-md-6  d-flex align-items-center" style="width: 18rem;">
            <img src="images/user.jpeg" style="width: 60px;" class="mt-3 card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sujeeth</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, natus.</p>
                <ul>
                    <li>History</li>
                    <li>Behaviour</li>
                    <li>Work experence</li>
                </ul>
                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>
<?php
// get the id from url
if (isset($_GET['category_id'])) {
    // get all other iformation using id
    $category_id = $_GET['category_id'];

    // get the Details based on category id
    // $sql = "SELECT * FROM tbl_model WHERE category_id=$category_id";
    $sql = "SELECT * FROM `tbl_model` WHERE `category_id` = $category_id";

    // Execute the query 
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count > 0) {

        // We have data a   nd Get the value from Database
        while ($row = mysqli_fetch_assoc($result)) {

            // get the title based on category id
            $category_title = $row['title'];
            $image_name = $row['image_name'];
            $model_id = $row['id'];
            echo '
          
                        <a href="' . SITEURL . 'issues.php?category_id=' . $category_id . '&&model_id=' . $model_id . '" style="text-decoration: none !important;" class="col">
                            <div class="p-1 border bg-light  shadow-sm" style="border-radius: 10px; display: flex; align-items: center; flex-direction: column;">
                                <img src=' . SITEURL . '/images/model/' . $image_name . ' alt="">
                                <p>' . $category_title . '</p>
                            </div>
                        </a>
                
                    ';
        }
    }
} else {
    $_SESSION['select'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Select Your Mobile Brand.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    // redirect the user to categories page to select mobile
    header('location:' . SITEURL . 'categories');
    die();
}
?>