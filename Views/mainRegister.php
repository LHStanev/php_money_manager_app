<div class="col-sm-6">
    <h3>Create a new account</h3>
    <p id="message"><?php if(isset($_SESSION['message'])) {echo $_SESSION['message'];} ?></p>
<form method="POST">

    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username: </label>
        <div class="col-sm-6">
            <input type="text" name="username" class="form-control" placeholder="e.g. JohnDoe" required="required">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password: </label>
        <div class="col-sm-6">
            <input type="password" name="password" class="form-control" placeholder="**********" required="required">
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirm" class="col-sm-3 control-label">Confirm password: </label>
        <div class="col-sm-6">
            <input type="password" name="confirm_password" class="form-control" placeholder="**********"  required="required">
        </div>
    </div>

    <div class="form-group">
        <label for="first_name" class="col-sm-3 control-label">First name: </label>
        <div class="col-sm-6">
            <input type="text" name="first_name" class="form-control" placeholder="e.g. John" required="required">
        </div>
    </div>

    <div class="form-group">
        <label for="last_name" class="col-sm-3 control-label">Last name: </label>
        <div class="col-sm-6">
            <input type="text" name="last_name" class="form-control" placeholder="e.g. Doe"  required="required">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6">
            <input type="submit" name="register" value="Register" class=" btn btn-primary form-control">
        </div>
    </div>

</form>
    <p>Already have an account? You can login from <a href="login.php">here</a>.</p>
</div>