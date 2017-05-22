<?php
class sanitize {

    public function boolean(string $string): boolean  {
        return (bool)filter_var ( $string, FILTER_SANITIZE_BOOLEAN);     
    }

    public function integer(string $string) {
        return (int)filter_var ( $string, FILTER_SANITIZE_NUMBER_INT); 
    }

    public function number(string $string)  {
        return (float)filter_var ( $string, FILTER_SANITIZE_NUMBER_FLOAT );
    }

    public function email(string $string): string { 
        return (string)preg_replace("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", '', filter_var ( $string, FILTER_SANITIZE_STRING));
    }

    public function phone(string $string): string {
         return (string)preg_replace("/\d{3}[^\d]{0,2}\d{3}[^\d]{0,2}\d{4}/", '', filter_var ( $string, FILTER_SANITIZE_STRING));
    }

    public function string(string $string): string {
        return (string)filter_var ( $string, FILTER_SANITIZE_STRING); 
    }

    public function text(string $string): string {
        return (string)filter_var ( $string, FILTER_SANITIZE_STRING);     
    }

    public function postInteger(array $array): array {
        $matches = array_map(function ($item) {
            return $this->integer($item);
        },$array);
        return $matches;
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

    public function forDisplay(string $string): string {
        return $this->text($string);     
    }

    public function forDisplayArray(array $array): array {
        $newArray = array_map(function ($item) {
            return $this->text($item);
        },$array);
        return $newArray;   
    }

}