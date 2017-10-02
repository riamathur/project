<?php

$obj = new main();
$text = "my text";
$obj->printthis($text);
        
$array = array(1,2,3,4,5,6,7);
$obj->printArray($array);
$obj -> array_sum();
$obj -> areverse($array);
$obj -> length($text);
$obj -> ssplit($text);
$obj -> scount($text);
$obj -> compare();
$obj -> replace();
$obj -> strim();
$obj -> srev($text);
$obj -> sbinhex($text);
$obj -> sub();
$obj -> acount($array);
$obj-> adiff();
$obj-> amerge();
$obj->amultisort($array);
$obj->aintersect();
$obj->apush($array);
$obj->apop($array);




class main{ 
public function __construct() {

	echo 'hello i\'m an Object </br>';
	}

public function printthis($text) {
	echo '<h1>print function demo </h1>';

	print($text);
	echo '<hr>';
	}

public function length($text){
echo '<h1>length of an array </h1>';
echo strlen($text);
echo '<hr>';
}

public function ssplit($text){
echo '<h1>splitting an array  </h1>';
print_r(str_split($text));
echo '<hr>';
}

public function scount($text){
echo '<h1>word count </h1>';
echo str_word_count($text);
echo '<hr>';
}

public function compare(){
echo strcmp("My Text","my text");
echo '<hr>';
}

public function replace(){
echo str_replace("text","file","my text");
echo '<hr>';
}

public function sub(){
echo substr("my text",4);
echo '<hr>';
}

public function strim(){
$str = "welcome to web systems";
echo $str . "<br>";
echo trim($str,"tem");
echo '<hr>';
}

public function srev($text){
echo strrev($text);
echo '<hr>';
}

public function sbinhex($text){
$str1 = bin2hex($text);
echo($str1); 
echo '<hr>';
}

public function printArray($array){
echo '<h1>array print function</h1>';
print_r($array);
echo '<hr>';
}

public function acount($array){
print_r(array_count_values($array));
echo '<hr>';

}
public function adiff(){

$a1=array("a"=>"apple","b"=>"orange","c"=>"fish","d"=>"banana");
$b1=array("e"=>"apple","f"=>"orange","g"=>"banana");

$r=array_diff($a1,$b1);
print_r($r);
echo '<hr>';

}
public function amerge(){
$a1=array("hello","world");
$b1=array("Hi","welcome");
print_r(array_merge($a1,$b1));
echo '<hr>';
}

public function amultisort($array){
array_multisort($array);
print_r($array);
echo '<hr>';

}
public function aintersect(){
$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("a"=>"red","c"=>"blue","d"=>"pink");

$result=array_intersect_key($a1,$a2);
print_r($result);
echo '<hr>';

}

public function apush($array){
array_push($array,"57","58");
print_r($array);
echo '<hr>';

}

public function apop($array){
array_pop($array);
print_r($array);
echo '<hr>';

}

public function areverse($array){
echo '<h1>reversing the elements of an array </h1>';
print_r(array_reverse($array));
echo '<hr>';

}

public function array_sum(){
echo '<h1>sum </h1>';
$a = array(10,20,30);
echo "The sum is: " . array_sum($a);
echo '<hr>';
}

public function __destruct() {
echo '</br> I\'m Done';

}
}
?>
