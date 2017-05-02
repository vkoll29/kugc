<?php
class database
{
//     public $host = DB_HOST;
//     public $user = DB_USER;
//     public $pass = DB_PASS;
//     public $db_name = DB_NAME;

//     public $link;

//     public function __construct()
//     {
//         $this->connect();
//     }

//     private function connect()
//     {
//         $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
//     }

    private $link;

        public function __construct() {
            // Notice that private connection information is *NOT* part of the source
            // and therefore does not end up in public repos, etc.
            $connectionString = getenv("MYSQLCONNSTR_defaultConnection");
            $varsString = str_replace(";","&", $connectionString);
            parse_str($varsString);

            $host = $Data_Source;
            $user = $User_Id;
            $pass = $Password;
            $db = $Database;

            try{
                $this->link = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
                $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
            catch (PDOException $e){
                echo "Error: Unable to connect to MySQL: ". $e->getMessage();
                die;
            }

//             $this->InitializeImageTable();
        }   

        public function __destruct() {
            $this->link = null;
        }
    
    
    public function select($query)
    {
        $result = $this->link->query($query);
        if(!$result)
        {
            return false;
        }

        if($result->num_rows > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function insert($query)
    {
        $insert = $this->link->query($query);

        if($insert)
        {
            header('location: index.php?msg= Post inserted...');
        }
        else
        {
            echo "Sorry. Cannot post right now. Please try again later.";
        }
    }

    public function update($query)
    {
        $update = $this->link->query($query);

        if($update)
        {
            header('location: index.php?msg= Post updated...');
        }
        else
        {
            echo "Sorry. Cannot update post right now. Please try again later.";
        }
    }

    public function delete($query)
    {
        $delete = $this->link->query($query);

        if($delete)
        {
            header('location: index.php?msg= Post deleted...');
        }
        else
        {
            echo "Sorry. Cannot delete post right now. Please try again later.";
        }
    }
}
