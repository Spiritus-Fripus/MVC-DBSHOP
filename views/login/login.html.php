<h2 class="text-center mt-5">Admin login</h2>
<div class="d-flex justify-content-center">
    <form action="?controller=security&action=login" method="POST">
        <div class="form-group mt-2">
            <label class="form-label" for="login">login
                <input class="form-control" type="text" name="login" placeholder="ex : username">
            </label>
        </div>
        <div class="form-group mt-2">
            <label class="form-label" for="password">password
                <input class="form-control" type="password" name="password" placeholder="*****">
            </label>
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