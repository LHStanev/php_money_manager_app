<div class="col-sm-6">
    <h3>Login to your account</h3>
    <?php if(isset($_SESSION['success'])) {echo '<p id="success">' . $_SESSION['success'] . '</p>';} ?>
    <?php if(isset($_SESSION['error'])) {echo '<p id="error">' . $_SESSION['error'] . '</p>';} ?>
    <form method="POST">

        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Username: </label>
            <div class="col-sm-6">
                <input type="text" name="username" class="form-control" placeholder="e.g. John Doe" required="required">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password: </label>
            <div class="col-sm-6">
                <input type="password" name="password" class="form-control" placeholder="**********" required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <input type="submit" name="login" value="Login" class=" btn btn-primary form-control">
            </div>
        </div>

    </form>

    <p>Don't have an account yet? You can register <a href="register.php">here</a>.</p>
</div>