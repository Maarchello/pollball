<?php

function __autoload($class){
    require 'classes/' . $class . '.php';
}