<?php
    class Session
    {
        private $accountId;
        private $type;
        private $startedOn;
        private $timeOut;

        public function __construct($accountId, $type) 
        {

            $this->accountId = $accountId;
            $this->type = $type;
        }

        public function get_accountId()
        {
            return $this->accountId;
        }

        public function get_type()
        {
            return $this->type;
        }

        public function get_startedOn()
        {
            return $this->startedOn;
        }

        public function get_timeout()
        {
            return $this->timeout;
        }

        public function set_startedOn($timestamp)
        {
            if(!is_numeric($timestamp) || (int)$timestamp !== $timestamp)
            {
                trigger_error('Invalid startedOn timestamp.', E_USER_ERROR);
                return;
            }
            $this->startedOn = $timestamp;
        }

        public function set_timeout($timestamp)
        {
            if(!is_numeric($timestamp) || (int)$timestamp !== $timestamp)
            {
                trigger_error('Invalid timeout timestamp.', E_USER_ERROR);
                return;
            }
            $this->timeout = $timestamp;
        }
    }
?>