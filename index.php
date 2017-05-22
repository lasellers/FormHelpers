<?php
require './validate.class.php';
require './sanitize.class.php';


$datums=[
    'bool1'=>['bool','2342423423423'],
    'bool2'=>['bool','<script>alert("injection")</script>'],

    'int1'=>['integer','2342423423423'],
    'int2'=>['integer','<script>alert("injection int")</script>'],

    'number1'=>['number','2342423423423'],
    'number2'=>['number','<script>alert("injection number")</script>'],

    'string1'=>['string','2342423423423'],
    'string2'=>['string','<script>alert("injection string")</script>'],

    'text1'=>['text','2342423423423'],
    'text2'=>['text','<script>alert("injection text")</script>'],

    'phone1'=>['phone','2342423423423'],
    'phone2'=>['phone','123-456-7890'],
    'phone3'=>['phone','dadgfdg sdgdfgdf'],
    'phone4'=>['phone','123 1234'],
    'phone5'=>['phone','<script>alert("injection phone")</script>'],

    'email1'=>['email','2342423423423'],
    'email2'=>['email','lasellers@'],
    'email3'=>['email','l @g'],
    'email3'=>['email','l @g.c'],
    'email4'=>['email','lasellers@gmail.com'],
    'email5'=>['email','<script>alert("injection email")</script>'],

  /*  'post'=>['postInteger',
        ['a'=>'2342342','b'=>'safdsdfdsf','c'=>'<script>alert("injection")</script>']
        ],*/

];

$sanitize=new sanitize();
$validate=new validate();

echo "<table>\n";
echo "<tr><th>Type</th><th>Key</th><th>Value</th><th>New</th><th>validate</th></tr>";
foreach($datums as $key=>$datum ) {
    list($type,$value)=$datum;
    $newvalue= $sanitize->byType($type,$value);
    $bool= $validate->byType($type,$value)?"+VALID+":"-INVALID-";

    echo "<tr><td>$type</td><td>$key</td><td><b>".$sanitize->forDisplay($value)."</b></td><td><i>$newvalue</i></td><td>$bool</td><td>";
    var_dump($newvalue);
    echo "</td></tr>\n";
   // var_dump($newvalue); echo "<br>\n";
}
echo "</table>\n";

