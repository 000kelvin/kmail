<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 01/11/2017
 * Time: 12:15 AM
 */
spl_autoload_register(function ($c){
    include '_classes/'.$c.'.php';
});
class insert extends pdo_dbconnections
{
    public function insertData($table, $params=array()){
        date_default_timezone_set("Africa/Lagos");
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
}