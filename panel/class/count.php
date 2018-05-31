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
    class count extends pdo_dbconnections
    {
        public function counts($table, $login, $join = null, $order = null){
            if ($this->tableExists($table)) {
                $q = "SELECT count(*) FROM $table WHERE post_ad_name='$login'";
                if ($join != null)
                    $q .= " JOIN $join";
                if ($order != null)
                    $q .= " ORDER BY $order";

                $stmt = $this->conn->prepare($q);
                $stmt->execute();
                $row = $stmt->fetch();
                if ($row == 0){
                    return 0;
                }
                return $row[0];
            }else throw new Exception('That table does not exist');

        }

        public function countss($table, $login, $date, $join = null, $order = null){
            if ($this->tableExists($table)) {
                $q = "SELECT count(*) FROM $table WHERE post_ad_name='$login' AND post_date LIKE '$date%'";
                if ($join != null)
                    $q .= " JOIN $join";
                if ($order != null)
                    $q .= " ORDER BY $order";

                $stmt = $this->conn->prepare($q);
                $stmt->execute();
                $row = $stmt->fetch();
                if ($row == 0){
                    return 0;
                }
                return $row[0];
            }else throw new Exception('That table does not exist');

        }
    }