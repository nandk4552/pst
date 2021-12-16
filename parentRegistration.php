<?php include "partials/_header.php"?>
<div class="conatainer shadow-md m-5">
    <form>
        <h1 class="display-6 text-center">Student Registration Form</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full Name*</label>
            <input type="text" class="form-control" placeholder="Enter student name .." required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date Of Birth*</label>
            <input type="date" class="form-control"  required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Class*</label>
            <select class="form-select" aria-label="Default select example" required>
                <option selected>select class</option>
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
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Parent Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter parent name here" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Parent Mobile Number*</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Eg: 989949XXXX" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">School Name*</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="enter school name" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <textarea type="text" class="form-control" placeholder="enter your current address" id="exampleInputPassword1"> </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>


</div>
<?php include "partials/_footer.php"?>
