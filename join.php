<?php include 'register-header.php'?>

<script>
var check = function() {

    var pswd1val = document.getElementById('pswd1').value;
    var pswd2val = document.getElementById('pswd2').value;

    var element = document.getElementById("button");
    if (document.getElementById('pswd2').value == document.getElementById('pswd1').value) {
        var passw = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if (document.getElementById('pswd1').value.match(passw) && document.getElementById('pswd2').value.match(
                passw)) {
            element.classList.remove("disabled");
        } else {
            element.classList.add("disabled");

        }
    }
}
</script>

<?php if($_SESSION['state']=='existRecord') { ?>

<div class="alert alert-danger" role="alert">
    <?php echo$_SESSION['info']?> already registered</div>

<?php 
unset($_SESSION['info']); 
unset($_SESSION['state']); 
} ?>

<?php if($_SESSION['state']=='success') { ?>

<div class="alert alert-success" role="alert">
    <?php echo$_SESSION['info']?> successfully registered.</div>

<?php 
unset($_SESSION['info']); 
unset($_SESSION['state']); 
} ?>

<?php if($_SESSION['state']=='fail') { ?>

<div class="alert alert-danger" role="alert"> An error ocured. Please contact system owner.</div>

<?php 
unset($_SESSION['info']); 
unset($_SESSION['state']); 
} ?>


<div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" name="admin_name" placeholder="Your name here">
    <label for="floatingInput">Name</label>
</div>

<div class="form-floating">
    <input type="email" class="form-control" id="floatingInput" name="admin_mail" placeholder="name@example.com"
        required>
    <label for="floatingInput">Email address</label>
</div>
<div class="form-floating" id="form_password">
    <input type="password" class="form-control pswd1" id="pswd1" name="admin_password" placeholder="Password" required
        onkeyup='check();'>
    <label for="floatingPassword">Password</label>
</div>
<div class="form-floating">
    <input type="password" class="form-control pswd2" id="pswd2" name="admin_password_confirm" placeholder="Password"
        required onkeyup='check();'>
    <label for="floatingPassword">Password</label>
    <span id='message'></span>

</div>
<button class="w-100 mb-5 btn btn-lg btn-primary disabled" id="button" name="admincreate" type="submit">Sign Up</button>
</form>

<p>Have an account? <a href="login.php">Log in</a></p>
<p class="mt-5 mb-3 text-muted">&copy; 2023</p>

</main>



</body>

</html>