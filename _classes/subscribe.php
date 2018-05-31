<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 18/11/2017
 * Time: 06:19 PM
 */


class subscribe extends pdo_dbconnections
{
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
}