<?php
    require_once 'classes/session/SessionManager.php';
?>
<?php
    $session = SessionManager::get_currently_running_session_object();

    if($session !== null)
    {
        header('Location: admin-panel.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logowanie jako administrator</title>
        <link rel="stylesheet" href="css/uniform-style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="css/color-classes.css?v=<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <?php
            require_once 'classes/pages/AdminLoginPage.php';
            require_once 'functions/logInAdmin.php';

            $AdminLogInPage = AdminLogInPage::instance();
        ?>
    </head>
    <body>
        <div class="container ps-bg-darker-white rounded shadow">
            <div class="row mt-5 align-items-center justify-content-center">
                <div class="row text-center">
                    <h1>Zaloguj się do PlantShop jako administrator</h1>
                </div>
                <div class="col-lg-3 col-md-5 mt-2 p-4">
                    <form action="admin-log-in-page.php" method="POST">
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label">Login</label>
                            <input type="text" class="form-control shadow-sm <?php if(!empty($AdminLogInPage->get_login_error())){echo "is-invalid";}?>" id="inputLogin" name="login" value="<?php echo $AdminLogInPage->get_login(); ?>">
                            <div id="validationFeedback_inputLogin" class="invalid-feedback">
                                <?= $AdminLogInPage->get_login_error() ?? ""; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Hasło</label>
                            <div class="input-group">
                                <input type="password" class="form-control shadow-sm <?php if(!empty($AdminLogInPage->get_password_error())){echo "is-invalid";}?>" id="inputPassword" name="password">      
                                <div class="input-group-text togglePaassword rounded shadow-sm ps-button" title="Pokaż hasło"><i class="fa-regular fa-eye ps-white"></i></div>
                                <div id="validationFeedback_inputPassword" class="invalid-feedback">
                                    <?= $AdminLogInPage->get_password_error() ?? ""; ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <div class="input-group">
                                <input type="text" class="is-invalid" style="visibility: collapse">
                                <div id="validationFeedback_authorizationInfo" class="invalid-feedback">
                                    <?= $AdminLogInPage->get_credentials_error() ?? ""; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn col-6 mx-auto shadow ps-button" name="logInAdmin">Zaloguj się</button>
                        </div>              
                    </form>
                </div>         
            </div>  
        </div>  

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/09b95ca3a3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script type="text/javascript" src="javascript/togglePasswordVisibility.js"></script>
    </body>
</html>