<?php

require_once __DIR__ . '/../configs/db.php';

class DataBase {

    private $con;
    public function __construct(){
        $this->con = mysqli_connect(HOST, USER, PASSWORD);
        mysqli_select_db($this->con, DBName);
    }

    public function query($sql, $class='stdClass'){
        mysqli_query($this->con, 'set names utf8');
        $res = mysqli_query($this->con, $sql);
        if(false === $res){
            return false;
        }

        $ret = array();
        while($row = mysqli_fetch_object($res, $class)){
            $ret[] = $row;
        }
        return $ret;
    }

    public function insert($sql){
        mysqli_query($this->con, 'set names utf8');
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function forExist($sql){
        return mysqli_query($this->con, $sql);
    }

    public function update($sql){
        return mysqli_query($this->con, $sql);
    }


}