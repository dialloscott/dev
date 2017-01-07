<?php require __DIR__ . '/../partials/_header.php' ?>
<div class="container" style="padding-top: 70px">

    <div class="starter-template">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php if(isset($_SESSION['errors'])): ?>
                    <div class="alert alert-danger">
                        <p><?= registerError() ?></p>
                    </div>
                <?php  endif ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <p><?= registerSuccess() ?></p>
                    </div>
                <?php  endif ?>
                <h2>Inscriptions</h2>
                <form action="register.php" method="post" autocomplete="on" class="well">
                    <div class="form-group">
                        <label for="name" class="control-label">Votre Nom:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Votre Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Votre Mot de pass:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm" class="control-label">Confirmation de mot de pass:</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                    </div>
                    <div class="form-group">
                       <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php require __DIR__ . '/../partials/footer.php' ?>


