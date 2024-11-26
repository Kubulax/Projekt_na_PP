<?php
    require_once 'classes/pages/AdminLogInPage.php';
    require_once 'classes/session/SessionManager.php';

    if(isset($_POST['logInAdmin']))
    {
        $AdminLogInPage = AdminLogInPage::instance();

        $login = $_POST['login'];
        $password = $_POST['password'];

        if($AdminLogInPage->authorize_credentials($login, $password))
        {
            $session = SessionManager::build_admin_session($login, $password);

            if(!SessionManager::start_session($session))
            {
                trigger_error("Failed to start the session.");
                exit();
            }
                
            header("Location: admin-panel.php");
            exit();  
        }
    } 
?>