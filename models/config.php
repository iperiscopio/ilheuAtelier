<?php

    use ReallySimpleJWT\Token;
    require("config-vars.php");

    class Config {

        protected $db;

        public function __construct() {
            
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
            $secret = CONFIG['$SECRET_KEY'];
            
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
