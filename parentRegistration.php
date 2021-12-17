<?php include "partials/_header.php" ?>
<div class="conatainer shadow-md m-5">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="display-6 text-center">Student Registration Form</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full Name*</label>
            <input type="text" name="s_name" class="form-control" placeholder="Enter student name .." required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="col-auto my-1">
            <label for="exampleInputEmail1" class="form-label">Gender*</label>
            <select name="s_gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="1">male</option>
                <option value="2">female</option>
                <option value="3">others</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date Of Birth*</label>
            <input type="date" name="s_dob" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Class*</label>
            <select name="s_class" class="form-select" aria-label="Default select example" required>
                <option>select class</option>
                <option value="1">1st class</option>
                <option value="2">2nd class</option>
                <option value="3">3rd class</option>
                <option value="4">4th class</option>
                <option value="5">5th class</option>
                <option value="6">6th class</option>
                <option value="7">7th class</option>
                <option value="8">8th class</option>
                <option value="9">9th class</option>
                <option value="10">10th class</option>
                <option value="10">Intermidiate 1st year</option>
                <option value="10">Intermidiate 2nd year</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Parent Name*</label>
            <input type="text" name="p_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter parent name here" required>
            <span class="error"><?php echo $nameErr;?></span>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Parent Mobile Number*</label>
            <input type="number" name="p_number" class="form-control" id="exampleInputEmail1" placeholder="Eg: 989949XXXX" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">School Name*</label>
            <input type="text" name="school_name" class="form-control" id="exampleInputEmail1" placeholder="enter school name" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address (pickup)*</label>
            <textarea type="text" name="pickup_address" class="form-control" id="exampleInputEmail1" placeholder="enter pickup address..." aria-describedby="emailHelp" required></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address (Drop)*</label>
            <textarea type="text" name="drop_address" class="form-control" placeholder="enter drop address..." id="exampleInputPassword1"></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>

</div>
<?php include "partials/_footer.php" ?>

<?php
// define variables and set to empty values
// $name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "clicked!";die();
    // validating user name
    if (empty($_POST["s_name"])) {
        $nameErr = "Name is required";
      } else {
        $s_name = val_data($_POST["s_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$s_name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
    //   validating school name
      if (empty($_POST["school_name"])) {
        $nameErr = "Name is required";
      } else {
        $school_name = val_data($_POST["school_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$school_name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
    // $s_name = val_data($_POST["s_name"]);
    $s_gender = val_data($_POST["s_gender"]);
    $s_dob = val_data($_POST["s_dob"]);
    $s_class = val_data($_POST["s_class"]);
    $p_name = val_data($_POST["p_name"]);
    $p_number = val_data($_POST["p_number"]);
    $school_name = val_data($_POST["school_name"]);
    $pickup_address = val_data($_POST["pickup_address"]);
    $drop_address = val_data($_POST["drop_address"]);
}

// function to validate the data we are getting from the register form
function val_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

