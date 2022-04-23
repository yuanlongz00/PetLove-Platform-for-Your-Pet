<?php


class db
{

    protected static $host;

    protected static $user;

    protected static $pwd;

    protected static $db;

    protected static $char;

    protected static $conn;


    public function __construct()
    {

        self::$host = 'pet';
        self::$user = 'petlove';
        self::$pwd  = '123456';
        self::$db   = 'petlove';
        self::$char = 'utf8';

        self::connect(self::$host,self::$user,self::$pwd,self::$db);
        self::setChar(self::$char);

    }

    protected static function connect($host,$user,$pwd,$db)
    {

        $conn = mysqli_connect($host,$user,$pwd,$db,3307);
        self::$conn = $conn;

    }

    protected function setChar($char)
    {
        $sql = 'set names' .$char;
        $this->query($sql);
    }

    public function query($sql)
    {
        return mysqli_query(self::$conn,$sql);
    }

    public function select($sql)
    {

        $list = [];
        $arr = self::query($sql);
        if(!$arr){
            return [];
        }
        while ($row = mysqli_fetch_assoc($arr)){
            $list[] = $row;
        }
        return $list;

    }

    public function find($sql)
    {
        $arr = self::query($sql);
        if(!$arr){
            return [];
        }
        return mysqli_fetch_assoc($arr);
    }



}