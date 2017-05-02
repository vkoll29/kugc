<?php
class hello
{
    public function hi()
    {
        echo "Hello people";
    }

    public function __construct()
    {
        echo "Hi everyone";
    }
}

$hi = new hello();
echo $hi->hi();
/**
 * __construct is an automatically called function, as long as an instance of the class is declared
 */