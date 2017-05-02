<?php
class countries
{
    public $pk = "Pakistan";
    public $us = "United States";
    public $uk = "United Kingdom";
    public $ind = "India";
    public $gr = "Germany";
    public $au = "Australia";
}

class players extends countries
{
    public $player1 = "Enock Gonte";
    public $player2 = "Eliakim Maribe";
    public $player3 = "Mobutu Mafinto";

    public function player()
    {
        return $this->player2." is from ". $this->ind;
    }
}
$p = new players();
echo $p->player();
