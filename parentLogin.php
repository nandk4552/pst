<?php include "partials/_header.php"; ?>
<?php


session_start();

if (isset($_SESSION['useremail']) && isset($_SESSION['usertoken'])) {
    header('location:index.php');
}

?>
<style>
    .con {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<div class="text-center con">

    <div class="form-signin">
        <h1 class="h3 mb-3 fw-normal">Parent Login</h1>
        <hr>
        <!-- <form>

            <div class="form-floating ">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email </label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">login</button>
            <a href="<?php echo SITEURL; ?>parentRegistration.php">Register an account</a>
            <br>
            <a href="#">Forget password?</a>
        </form> -->
        <form method="post" id="contact-form" autocomplete="off">
            <div class="form-group form-floating">
                <label class="text-cu-1"><i class="far fa-envelope"></i> Email *</label>
                <input type="email" class="form-control" id="u_email" name="u_email" value="<?php echo @$_COOKIE['useremail']; ?>" placeholder="name@example.com">
            </div>
            <div class="form-group form-floating">
                <label class="text-cu-1"><i class="fas fa-key"></i> Password *</label>
                <input type="password" class="form-control" id="u_password" name="u_password" value="<?php echo @$_COOKIE['userpass']; ?>" placeholder="*************">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="s_cookie" id="s_cookie" value="111">
                <label class="form-check-label text-cu-1">Save Login Info !</label>
            </div>
            <div class="border-cus err-msg " id="msg_status">

            </div>
            <div class="form-group">
                <input type="submit" class="my-btn" value="Login">
                <div class="spinner-border text-light" role="status" id="loader">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

        $('#loader').hide();

        $.validator.addMethod("regex", function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        }, "Invalid Validation Expression");

        $('#contact-form').validate({
            rules: {
                u_email: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 100
                },
                u_password: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,50}$/
                }
            },
            messages: {
                u_email: {
                    required: 'Please Enter Email ID',
                    regex: 'Please Enter Valid Email',
                    maxlength: 'Please Enter Valid Email'
                },
                u_password: {
                    required: 'Please Enter Password',
                    regex: 'Password Must Be at least uppercase & lowercase & number & special character & (between 8 - 50 charater Longer). '
                }
            },
            highlight: function(element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function() {
                $.ajax({
                    type: 'POST',
                    url: 'ajax-process/login-verify.php',
                    data: $('#contact-form').serialize(),
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    success: function(response) {
                        var get_status = JSON.parse(response);
                        if (get_status.status == 200) {
                            window.location.href = "page1.php";
                            console.log(get_status.msg);
                        } else if (get_status.status == 200 || get_status.status == 202 || get_status.status == 203 || get_status.status == 204 || get_status.status == 205) {
                            $('#msg_status').text(get_status.msg);
                        } else {
                            console.log(get_status.msg);
                        }
                    }
                });
                return false;
            }
        });

    });
</script>

<?php include "partials/_footer.php"; ?>