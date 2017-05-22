<?php
require './validate.class.php';
require './sanitize.class.php';


$datums=[
    'bool1'=>['bool','2342423423423'],
    'int1'=>['integer','2342423423423'],
    'number1'=>['number','2342423423423'],
    'string1'=>['string','2342423423423'],
    'text2'=>['text','2342423423423'],

    'phone1'=>['phone','2342423423423'],
    'phone2'=>['phone','123-456-7890'],
    'phone3'=>['phone','dadgfdg sdgdfgdf'],
    'phone4'=>['phone','123 1234'],
];

$sanitize=new sanitize();
$validate=new validate();

foreach($datums as $key=>$datum ) {
    list($type,$value)=$datum;
    $newvalue= $sanitize->byType($type,$value);
    $bool= $validate->byType($type,$value)?"+VALID+":"-INVALID-";

    echo " type: $type \t key: $key \t value: $value \t new value: $newvalue ==>  $bool<br>\n";
    var_dump($newvalue); echo "<br>\n";
}

