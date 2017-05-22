<?php
class validate {

public function boolean(string $string) {
        return is_bool(filter_var ( $string, FILTER_VALIDATE_BOOLEAN));
}

public function integer(string $string) {
    return is_int(filter_var ( $string, FILTER_VALIDATE_INT));
}

public function number(string $string) {
    return is_numeric(filter_var ( $string, FILTER_VALIDATE_FLOAT));     
}

public function email(string $string) {
    return (preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $string));
}

public function phone(string $string) {
    return (preg_match("/\d{3}[^\d]{0,2}\d{3}[^\d]{0,2}\d{4}/", $string));    
}

public function string(string $string) {
    return (preg_match("/(.*)(\r|\n)(.*)/", $string));    
}

public function text(string $string) {
    return is_string($string); 
}

public function postInteger(array $array) {
     $matches = array_filter($array, function ($haystack) {
           
        });
}


  public function byType($type,$value) {
        switch($type) {
            case 'boolean':
            return self::boolean($value);

            case 'integer':
            return self::integer($value);

            case 'number':
            return self::number($value);

            case 'email':
            return self::email($value);

            case 'phone':
            return self::phone($value);

            case 'string':
            return self::string($value);

            case 'text':
            return self::text($value);

          case 'postInteger':
            return self::postInteger($value);

        }
    }

}