<?php
class house
{
    public $name = "Victor Ochieng";
    function fullname()
    {
        return $this->name = "Eli Pope";
    }
}
$house = new house();
echo $house->fullname();

/**
 * used within methods and access values in the same class as the method
 */
?>