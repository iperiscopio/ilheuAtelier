<?php

    use ReallySimpleJWT\Token;
    require_once 'pdoconfig.php';

    class Config {

        protected $db;
        protected $DB_CONNECTION;
        protected $DB_HOST;
        protected $DB_NAME;
        protected $DB_CHARSET;
        protected $DB_USER;
        protected $DB_PASS;

        public function __construct() {

            try {
                $this->db = new PDO( 
                    $DB_CONNECTION . 
                    ':host=' . $DB_HOST . 
                    ';dbname='  . $DB_NAME .
                    ';charset=' . $DB_CHARSET ,
                    $DB_USER ,  
                    $DB_PASS
                );
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        // admin validation 
        public function routeRequireValidation() {
            
            $headers = apache_request_headers();

            foreach ($headers as $header => $value) {
                if (strtolower($header) === "x-auth-token") {
                    $token = trim( $value );
                }
            }

            if (empty($token)) {
                http_response_code(401);
                die('{"message":"User not authenticated. Not allowed to perform this action"}');
            }

            // Token validation
            $secret = getenv('SECRET_KEY');;
            
            $isValid = Token::validate($token, $secret);
            
            if ($isValid) {
                $admin = Token::getPayload($token, $secret);
            }
            
            if (isset($admin)) { 
                return $admin["adminId"];
            }

            return 0;
        }
    }
