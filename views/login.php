<?php require '/../partials/_header.php';?>

<div class="container" style="padding-top: 70px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if(isset($_SESSION['flash'])): ?>
                <div class="alert alert-success">
                    <?= registerFlash() ?>
                </div>
            <?php endif ?>
            <?php if(isset($_SESSION['errorLog'])): ?>
                <div class="alert alert-danger">
                    <?= registerErrorForLogin() ?>
                </div>
            <?php endif ?>
            <h2 class="text-center">Je me connecte</h2>
            <form action="login.php" method="post" autocomplete="off" class="well">
                <div class="form-group">
                    <label for="name" class="control-label">Votre Nom ou Email:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Votre mot de pass:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Se connecte</button>
                </div>
                </form>
        </div>
    </div>
</div>
