<?php
require './validate.class.php';
require './sanitize.class.php';


$datums=[
    'bool1'=>['boolean','2342423423423'],
    'bool2'=>['boolean','<script>alert("injection")</script>'],
    'bool3'=>['boolean','true'],
    'bool4'=>['boolean',true],
    'bool5'=>['boolean',1],

    'int1'=>['integer','2342423423423'],
    'int2'=>['integer','<script>alert("injection int")</script>'],
    'int3'=>['integer','hello'],
    'int4'=>['integer','5.79'],
    'int5'=>['integer','0'],
    'int5b'=>['integer','10'],
    'int6'=>['integer',''],

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
    'email4b'=>['email','dev.lasellers@gmail.com'],
    'email5'=>['email','<script>alert("injection email")</script>'],

    'url1'=>['url','2342423423423'],
    'url2'=>['url','123-456-7890'],
    'url3'=>['url','http://php.net'],
    'url3s'=>['url','https://php.net'],
    'url4'=>['url','php.net'],
    'url5'=>['url','<script>alert("injection url")</script>'],
    
    'date1'=>['date','2342423423423'],
    'date2'=>['date','http://php.net'],
    'date3'=>['date','1-1-2001'],
    'date4'=>['date','0-0-0'],
    'date4b'=>['date','2009'],
    'date4c'=>['date','2009-10'],
    'date5'=>['date','99-99-9999'],
    'date6'=>['date','1-1-2001'],
    'date7'=>['date','13-1-2069'],
    'date7b'=>['date','1-13-2069'],
    'date8'=>['date','<script>alert("injection date")</script>'],

    'post'=>['postInteger',
        ['a'=>'2342342','b'=>'safdsdfdsf','c'=>'<script>alert("injection post integer")</script>']
        ],

];

$sanitize=new sanitize();
$validate=new validate();

echo "<table>\n";
echo "<tr><th>Type</th><th>Key</th><th>Value</th><th>validate</th><th>New Value</th></tr>";
foreach($datums as $key=>$datum ) {
    list($type,$value)=$datum;
    $newvalue= $sanitize->byType($type,$value);
    $bool= $validate->byType($type,$value)?"VALID":"<i>invalid</i>";
if($type=="postInteger") {
    echo "<tr><td>$type</td><td>$key</td><td style='display: block; max-width: 100%; overflow-x: auto'><b>".var_export($sanitize->forDisplayArray($value),true)."</b></td><td>$bool</td><td style='display: block; max-width: 100%; overflow-x: auto'><i>".var_export($newvalue,true)."</i></td><td>";
    echo "</td></tr>\n";
} else {
    echo "<tr><td>$type</td><td>$key</td><td><b>".$sanitize->forDisplay($value)."</b></td><td>$bool</td><td><i>$newvalue</i></td><td>";
   // var_dump($newvalue);
    echo "</td></tr>\n";
}

}
echo "</table>\n";

