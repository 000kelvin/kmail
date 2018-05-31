<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 26/10/2017
 * Time: 05:29 PM
 */
class pdo_dbconnections
{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $charset = 'utf8';
    protected $conn;

    private $myQuery = "";
    private $result = array();


    public function __construct($db_host, $db_user, $db_pass, $db_name){
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->db_user, $this->db_pass);
        }catch (PDOException $exception){
            echo 'Connection error: '.$exception->getMessage();
        }
        return $this->conn;
    }

    public function disconnect(){
        return $this->conn = false;
    }

    public function tableExists($table)
    {

        $tablesInDb = $this->conn->query("SHOW TABLES FROM $this->db_name LIKE '%$table'");
        if ($tablesInDb->rowCount()>0) {
            return true;
        } else {
            return false;
        }


    }

    public function getById($table, $id){
        if ($this->tableExists($table)) {
            $q = "SELECT * FROM $table WHERE id = :id";
            $this->myQuery = $q;
            $stmt = $this->conn->prepare($q);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $data = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            //array_push($this->result, $stmt);
            return $data;
        }else throw new Exception('That table does not exist');
    }

    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
        if ($this->tableExists($table)) {
            $q = "SELECT $rows FROM $table";
            if ($join != null)
                $q .= " INNER JOIN $join";
            if ($where != null)
                $q .= " WHERE $where";
            if ($order != null)
                $q .= " ORDER BY $order";
            if ($limit != null)
                $q .= " LIMIT $limit";
            $this->myQuery = $q;
            $stmt = $this->conn->prepare($q);
            $stmt->execute();
            $data = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            //array_push($this->result, $stmt);
            return $data;
        }else throw new Exception('That table does not exist');

    }

    public function insert($table, $params=array()){
        if ($this->tableExists($table)) {
            $first_var = implode(',', array_keys($params));
            $second_var = implode("','", $params);
            $q = "INSERT INTO $table($first_var) VALUES('$second_var')";
            $query = $this->conn->prepare($q);
            foreach ($params as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }
            $insert = $query->execute();
            return $insert ? $this->conn->lastInsertId() : false;

        }else throw new Exception('That table does not exist');
    }

    public function delete($table, $where=null){
        if ($this->tableExists($table)) {
            if ($where == null) {
                $q = "DROP TABLE $table";
            } else {
                $q = "DELETE FROM $table WHERE $where";
            }
            $delete = $this->conn->exec($q);
            return $delete ? $delete : false;
        }else throw new Exception('That table does not exist');
    }

    public function update($table, $params = array(), $where){
        if ($this->tableExists($table)) {
            $args = array();
            foreach ($params as $field => $value) {
                $args[] = $field . '="' . $value . '"';
            }
            $vars = implode(',', $args);
            $sql = "UPDATE $table SET $vars WHERE $where";
            $query = $this->conn->prepare($sql);
            $update = $query->execute();
            return $update ? $query->rowCount() : false;
        }else throw new Exception('That table does not exist');
    }

    public function getResults(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function escapeString($data){
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    public function escapeStrings($string){
        $string = htmlspecialchars($string);
        return $string;
    }

    public function time(){
        return date_default_timezone_set('Africa/Lagos');
    }

    public function splitter($category){
        $category = explode(',', $category);
        foreach ($category as $cat){
            return $cat;
        }
    }

}