<?php
// echo __FILE__;

//include_once "dbhelpers.php";

//$rows = db_select('lesson06.books', 'id',['id'=> 1]);


//db_insert('lesson06.books',
//    ['name' => 'asd']
//);
//
//db_update('lesson06.books',['id'=> 3],
//    ['name' => '123']
//);
//$rows = db_select('lesson06.books', '*');
//print_r($rows);

//error_reporting(E_ALL);
//
//class MyClass{
//    private $name = "John";
//    public  function __construct($name = "")
//    {
//        $this->setName($name);
//
//    }
//    //public function  foo(){
//    //    return 'bar';
//    //}
//    public function getName(){
//        return $this->name;
//    }
//    public function setName($name){
//        $this->name = $name;
//    }
//
//}
//
////$myClass = new MyClass();
//$myClass = new MyClass('John');
////echo $myClass->foo();
////$myClass->name = 'Bob';
////echo $myClass->name;
////$myClass->setName('Sarah');
////echo $myClass->getName()."\n";
//
//class Number1{
//    private $num;
//    public  function __construct($num)
//    {
//        $this->setNumber($num);
//    }
//    public function setNumber($num){
//        $this->num = $num;
//    }
//    public function getNumber(){
//        if ($this->num % 2 == 0)
//            return $this->num * 3;
//        else
//            return $this->num * 2;
//    }
//}
//
//$num = new Number1(4);
////echo $num->getNumber();
//
//class Number2{
//    private $number;
//    public function __construct($number)
//    {
//        $this->Set($number);
//
//    }
//    public function add($number){
//        return $this->number += $number;
//    }
//
//    public function sub($number){
//        return $this->number -= $number;
//    }
//    public function mult($number){
//        return $this->number *= $number;
//    }
//    public function div($number){
//        if ($number != 0)
//            return $this->number = $this->number / $number;
//        else
//            return $this->number;
//    }
//    public function mod($number){
//        return $this->number = $this->number % $number;
//    }
//    public function set($number){
//        $this->number = $number;
//    }
//    public function get(){
//        return $this->number;
//    }
//
//}
//
//$num = new Number2(4);
//$num->add(10);
//echo $num->get();
//// Инкапсуляция
//// Наследование
//// Полиморфизм  // способы вызова
//
//class Number3{
//
//    // Alt-Insert "Getter and Setters"
//
//    private $number;
//
//    /**
//     * @return mixed
//     */
//    public function getNumber()
//    {
//        return $this->number;
//    }
//
//    /**
//     * @param mixed $number
//     */
//    public function setNumber($number): void
//    {
//        $this->number = $number;
//    }
//
//}

//include_once "Classes/Tag.php";
//$tag = new Tag('div');
//$tag->addClass('first');
//$tag->addClass('second');
//$tag->removeClass('first');
////$tag->appendBody('body');
////echo $tag->__toString();
////print_r($tag->classesAsArray());
//echo $tag;

//include_once "Classes/StrClass.php";
//
//new MyStatic();
//new MyStatic();
//new MyStatic();
//
//echo MyStatic::$counter;


include_once "Classes/BaseTag.php";
//$link = Tag::make('a');
//$link = new Tag('a');
//$link->disabled();
//$link->href('google.com');
//$link->id('main')
//    ->disabled();
//echo $link;
//echo Tag::html()->start();
//echo Tag::a();
///**
// *
// */
//echo Tag::form()->start();
//echo Tag::input();
//echo Tag::form()->end();

//@tag = Tag::input(['class' => 'hello', 'disabled'=>null]);

// __call($name, $attributes) - вызывается приотсутствии метода
// __callStatic($name, $attributes) - вызывается приотсутствии Static метода

//echo Tag::table()
//->appendBody('hello')
//-> prependBody(['asd','123']);

$items = ['first','second','last'];
$html = BaseTag::html(['lang'=>'ru']);
$head = BaseTag::head()->appendTo($html);
$body = BaseTag::body()->appendTo($html);
$ul = BaseTag::ul()->appendTo($body);
foreach ($items as $item){
    BaseTag::li()
        ->appendBody($item)
        ->appendTo($ul);
}
$body->addClass('clear');
echo $ul; die;

$tag = BaseTag::div();
$link = BaseTag::a()->appendTo($tag)->appendTo($tag);
$link->addClass('same link');
echo $tag;


class Test{
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        var_dump($name); echo "\n";
        var_dump($arguments);
    }
}

//$test = new Test();
//$test->hello('world', 'school');


// __call ->
