<?php
    require_once 'classes/databases/AdminDatabase.php';

    class AdminLogInPage
    {
        private static $AdminLogInPage;

        private $badData = false;
        private $loginError;
        private $passwordError;
        private $credentialsError;

        private $login;
        private $password;

        private function __construct()
        {

        }

        public static function instance()
        {
            if (self::$AdminLogInPage === null)
            {
                self::$AdminLogInPage = new AdminLogInPage();
            }

            return self::$AdminLogInPage;
        }


        public function authorize_credentials($login, $password)
        {
            $this->set_login($login);
            $this->set_password($password);

            if($this->badData)
            {
                return false;
            }

            if(!AdminDatabase::authorize_login_credentials($login, $password))
            {
                $this->credentialsError = "Podany login lub hasło jest niepoprawne.";
                return false;
            }

            return true;
        }


        public function get_login()
        {
            return $this->login;
        }

        public function set_login($login)
        {
            if($login === null || $login === '')
            {
                $this->badData = true;
                $this->loginError = "Pole nazwy administratora nie może być puste.";
                return false;
            }

            $this->login = $login;
            return true;
        }

        public function set_password($password)
        {
            if($password === null || $password === '')
            {
                $this->badData = true;
                $this->passwordError = "Pole hasła nie może być puste.";
                return false;
            }

            $this->password = $password;
            return true;
        }

        public function get_login_error()
        {
            return $this->loginError;
        }

        public function get_password_error()
        {
            return $this->passwordError;
        }

        public function get_credentials_error()
        {
            return $this->credentialsError;
        }
    }
?>