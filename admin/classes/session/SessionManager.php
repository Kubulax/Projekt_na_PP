<?php
    require_once 'classes/databases/AdminDatabase.php';
    require_once 'classes/session/Session.php';

    class SessionManager
    {
        public static function build_admin_session($login)
        {
            if($sessionData = AdminDatabase::get_session_data_from_admin_with_given_login($login))
            {
                $session = new Session($sessionData->admin_id, "admin");
            }
            else
            {
                trigger_error("Failed to aquire session data.", E_USER_ERROR);
            }       

            return $session;
        }

        public static function start_session($session)
        {
            if(isset($_SESSION) && count($_SESSION) === 4)
            {
                trigger_error("Failed to start session because one has already been started.", E_USER_ERROR);
            }
            
            if(!session_start())
            {
                return false;
            }
 
            $_SESSION['accountId'] = $session->get_accountId();
            $_SESSION["type"] = $session->get_type();
            $session->set_startedOn(time());
            $session->set_timeout(time());
            $_SESSION["startedOn"] = $session->get_startedOn();
            $_SESSION["timeout"] = $session->get_timeout();

            if(session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION))
            {
                return false;
            }
            
            return true;
        }

        public static function stop_session()
        {
            $_SESSION = array();
            session_destroy();
                 

            if(session_status() !== PHP_SESSION_DISABLED)
            {
                return false;
            }

            return true;
        }

        public static function get_currently_running_session_object()
        {
            if(session_status() !== PHP_SESSION_ACTIVE)
                session_start();
            if(!isset($_SESSION) || count($_SESSION) !== 4 || !isset($_COOKIE['PHPSESSID']))
            {
                self::stop_session();
                return null;
            }

            $session = new Session($_SESSION['accountId'], $_SESSION["type"]);
            $session->set_startedOn($_SESSION["startedOn"]);
            $session->set_timeout($_SESSION["timeout"]);

            return $session;
        }
    }
?>