<?php

    use ReallySimpleJWT\Token;

    class Config {

        protected $db;
        protected $DB_HOST;
        protected $DB_NAME;
        protected $DB_CHARSET;
        protected $DB_USER;
        protected $DB_PASS;
        protected $SECRET_KEY;
        protected $MAIL_HOST;
        protected $MAIL_PORT;
        protected $MAIL_USERNAME;
        protected $MAIL_PASS;

        public function __construct() {
            $this->DB_HOST = getenv('DB_HOST');
            $this->DB_NAME = getenv('DB_NAME');
            $this->DB_CHARSET = getenv('DB_CHARSET');
            $this->DB_USER = getenv('DB_USER');
            $this->DB_PASS = getenv('DB_PASS');
            $this->SECRET_KEY = getenv('SECRET_KEY');
            $this->MAIL_HOST = getenv('MAIL_HOST');
            $this->MAIL_PORT = getenv('MAIL_PORT');
            $this->MAIL_USERNAME = getenv('MAIL_USERNAME');
            $this->MAIL_PASS = getenv('MAIL_PASS');
            
            $this->db = new PDO( 
                'mysql' . 
                ':host=' . $DB_HOST . 
                ';dbname='  . $DB_NAME .
                ';charset=' . $DB_CHARSET ,
                $DB_USER ,  
                $DB_PASS
            );
        }

        // admin validation 
        public function routeRequireValidation() {
            
            $headers = apache_request_headers();

            foreach($headers as $header => $value) {
                if( strtolower($header) === "x-auth-token" ) {
                    $token = trim( $value );
                }
            }

            if( empty($token) ) {
                http_response_code(401);
                die('{"message":"User not authenticated. Not allowed to perform this action"}');
            }

            // Token validation
            $secret = $SECRET_KEY;
            
            $isValid = Token::validate($token, $secret);
            
            if($isValid) {
                $admin = Token::getPayload($token, $secret);
            }
            
            if( isset($admin) ) { 
                return $admin["adminId"];
            }

            return 0;
        }

    }
