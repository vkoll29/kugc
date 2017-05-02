<?php
class door{
    public static $name = "John Doe";

    /**
     * @return string
     */
    public static function fullName()
    {
        return self::$name = "Vkoll29";
    }
}
class window extends door
{
    public static function newName()
    {
       return parent::$name ="vicor ochieng";
    }
}
echo window::newName();
 /**
  * static funcions can be accessed without creating a class instance/ object
  */
