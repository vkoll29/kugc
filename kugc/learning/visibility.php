<?php
class house
{
    protected $name = "Jane Doe";
    public $age = "25";

    public function hello()
    {
        echo "Hello World";
    }
}
class door extends house
{
    /**
     * @return string
     */
    public function fullname()
    {
        return $this->name;
    }
}

$h = new door();
echo $h->fullname();

/**
 * Public can be accessed in and out of the class
 * Protected can only be accessed within a class or in a class that extends the class that contains the protected member
 * Private can only be accessed within the class it is declared in.
 */