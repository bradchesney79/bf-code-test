<?php
class BattlefaceTestUtility {
    private  $output;

    public function __construct()
    {
        $this->output = new stdClass();
        $this->output->success = false;
        $this->output->error = '';
    }

    public static function setApiHeader(): void
    {
        header('Content-type:application/json;charset=utf-8');
    }

    public static function setAuthCookie($authToken): void
    {
        setcookie('auth-token', $authToken);
    }

    public function setOrUpdateOutputProperty(string $propertyName, string $value): void
    {
        // there should be safety and error handling stuff here, don't have time
        $this->output->{$propertyName} = $value;
    }

    public function deleteOutputProperty(string $propertyName): void
    {
        unset($this->output->{$propertyName});
    }

    // stolen, lift & shift style
    private function getAuthorizationHeader() {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    // stolen, lift & shift style
    public function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    public function getOutputObjectAsJson(): string
    {
        return json_encode($this->output, JSON_PRETTY_PRINT);
    }
}