<?php
spl_autoload_register(function ($name) {

    //$parts = explode('\\', $name);
//    $basename = $parts[count($parts)-1];
    //$basename = array_pop($parts);


    //$path = implode(DIRECTORY_SEPARATOR, $parts);
    // PSR-4
    $path = str_replace('\\', DIRECTORY_SEPARATOR,$name);

//    echo $name;die;
//  $file = "classes" . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . "{$basename}.php";
    $file = "classes" . DIRECTORY_SEPARATOR . "{$path}.php";
    if (!file_exists($file) || !is_file($file)) {
        die("File $file not found");
    }
    include_once $file;

//    if (!class_exists($name))
//        die("Class $name not found");
//    elseif (!trait_exists($name))
//        die("Trait $name not found");
//    elseif (!interface_exists($name))
//        die("Interface $name not found");
    if (!class_exists($name)
        and  !trait_exists($name)
        and !interface_exists($name))
                die("Object $name not found");
});