<?php
    class AdminDatabase
    {
        public static function get_session_data_from_admin_with_given_login($login)
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $filteredLogin = filter_var($login, FILTER_SANITIZE_EMAIL);

            $query = "SELECT admin_id FROM `admins` WHERE UPPER(login) LIKE UPPER(?);";
            $statement = $connect->prepare($query);
            $statement->bind_param("s", $filteredLogin);
            $statement->execute();
            $result = $statement->get_result();
            $row = $result->fetch_object();
            if($row === null || empty($row))
            {
                $result->free_result();
                $connect->close();

                return false;
            }

            $result->free_result();
            $connect->close();

            return $row;
        }

        public static function authorize_login_credentials($login, $password)
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                trigger_error("Connection to database has failed.", E_USER_ERROR);
            }

            $sterileLogin = htmlspecialchars($login, ENT_QUOTES);
            $sterilePassword = htmlspecialchars($password, ENT_QUOTES);

            $query = "SELECT password_hash FROM `admins` WHERE UPPER(login) LIKE UPPER(?)";
            $statement = $connect->prepare($query);
            $statement ->bind_param("s", $login);
            $statement ->execute();
            $result = $statement ->get_result();
            $row = $result->fetch_object();
            if($row === null || empty($row))
            {
                $result->free_result();
                $connect->close();

                return false;
            }

            $operationStatus = false;
            if(password_verify($password, $row->password_hash))
            {
                $operationStatus = true;
            }

            $result->free_result();
            $connect->close();

            return $operationStatus;
        }   
    }
?>