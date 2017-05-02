<?php
class house
{
    public $name = "John Doe";
    public $age = 25;

    public function  hello()
    {
        echo "Hello World";
    }
}
$h = new house();
$k = new house();
echo $k->name = "Jane Doe";
echo $k->age ="22";
echo $h->name. $h->age;
echo $h->hello();
?>