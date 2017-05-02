<?php
class db
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db_name = "oop";
    public $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
    }

    public function insert($query)
    {
        $result = $this->link->query($query);
        if($result)
        {
            echo "<center><h2> Registration Successful</h2></center>";
        }
        else
        {
            echo "<center><h2>Cannot register now. Please try again later</h2></center>".mysqli_error($this->link);
        }
    }
}