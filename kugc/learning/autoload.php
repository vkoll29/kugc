<?php
/**include "dog.php";
*include "cat.php";
*include "bunny.php";           //this the redundant code i.e what it would look like without autoload
*
 */

function __autoload($anyName)
{
    include "classes/$anyName.php";
}
$dog = new dog();
$cat = new cat();
$bunny = new bunny();

echo "<br />" .$dog->name ."<br />". $dog->price;
echo "<br />" . $cat->name ."<br />". $cat->price;
echo "<br />" . $bunny->name ."<br />". $bunny->price;


