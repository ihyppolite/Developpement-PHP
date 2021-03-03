<?php
spl_autoload_register(function ($class_name) {
    if(file_exists('models/'.$class_name . '.class.php')){
        require 'models/'.$class_name . '.class.php';
    }
    if(file_exists('class/'.$class_name . '.class.php')){
        require 'class/'.$class_name . '.class.php';
    }
});