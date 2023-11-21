<?php

    use ReallySimpleJWT\Token;
    $config = include(dirname(__DIR__, 2) . '/configvars.php');

    class Config {

        protected $db;
        protected $DB_HOST;
        protected $DB_NAME;
        protected $DB_CHARSET;
        protected $DB_USER;
        protected $DB_PASS;

        public function __construct() {
            global $config;

            $this->DB_HOST = $config['DB_HOST'];
            $this->DB_NAME = $config['DB_NAME'];
            $this->DB_CHARSET = $config['DB_CHARSET'];
            $this->DB_USER = $config['DB_USER'];
            $this->DB_PASS = $config['DB_PASS'];

            try {
                $this->db = new PDO(
                    'mysql' .
                    ':host=' . $this->DB_HOST .
                    ';dbname='  . $this->DB_NAME .
                    ';charset=' . $this->DB_CHARSET ,
                    $this->DB_USER ,
                    $this->DB_PASS
                );
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        // admin validation 
        public function routeRequireValidation() {

            global $config;
            
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
            $this->SECRET = $config['SECRET_PASS'];
            
            $isValid = Token::validate($token, $this->SECRET);
            
            if ($isValid) {
                $admin = Token::getPayload($token, $this->SECRET);
            }
            
            if (isset($admin)) { 
                return $admin["adminId"];
            }

            return 0;
        }
    }
