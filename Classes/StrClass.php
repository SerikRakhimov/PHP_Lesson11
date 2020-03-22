<?php
//class Str{
//    static $name = "STRING";
//    public $age = 20;
//}

//echo Str::$name;
class Str
{
    public static function upper($str)
    {
        return mb_strtoupper($str);
    }

    public static function slug($str)
    {
        $str = str_replace(' ', '-', $str);
//      return Str::upper($str);   // эти две строки равноценны
        return self::upper($str);  //
    }
}

//echo Str::upper('hello');
//echo Str::slug('hello world good place');

class MyStatic
{
    public static $counter = 0;

    public function __construct()
    {
        self::incrementCounter();
        //self::$counter++;

    }

    protected static function incrementCounter()
    {
        $file = 'couner.txt';
        if (!file_exists($file) || !is_file($file))
            self::$counter = 0;
        else
            self::$counter = file_get_contents($file);

        self::$counter++;
        file_put_contents($file, self::$counter);
    }
}

class MyStatic2{
    const name = "John";
    static $name = "Bob";
}

// Сколько раз вызвался конструктор

//new MyStatic();
//new MyStatic();

//echo MyStatic::$counter;

//echo MyStatic2::$name;