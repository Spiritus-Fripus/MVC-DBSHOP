<h2 class="text-center mt-5">Admin login</h2>
<div class="d-flex justify-content-center">
    <form action="../views/security/login.html.php" method="POST">
        <div class="form-group mt-2">
            <label class="form-label" for="login">login</label>
            <input class="form-control" type="text" name="login" placeholder="ex : username">
        </div>

        <div class="form-group mt-2">
            <label class="form-label" for="password">password</label>
            <input class="form-control" type="password" name="password" placeholder="*****">
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-dark form-control" type="submit" value="ok">Submit</button>
        </div>
        <div class="form-group mt-2 text-center">
            <a href="/signin.php">New user ?</a>
        </div>
        <div class="form-group mt-2 text-center">
            <a href="/password.php">password forgotten ?</a>
        </div>
    </form>
</div>