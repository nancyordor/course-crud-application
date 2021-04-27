<?php
class PDOConfig extends PDO
{

    private $host = 'localhost';
    private $user  = 'root';
    private $database = 'course_crud_application';

   public $con =null;
    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->database = 'course_crud_application';
        $dsn = 'mysql:host=' . $this->host . ';database=' . $this->database;
        parent::__construct($dsn, $this->user);
    


    }

   
}
