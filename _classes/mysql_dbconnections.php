<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 23/10/2017
 * Time: 05:36 PM
 */
class mysql_dbconnections
{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'testDb';

    private $con = false;
    private $result = array();
    private $myQuery = "";
    private $numResults = "";

    public function mysql_safe_query($query){
        $args = array_slice(func_get_args(), 1);
        $args = array_map('mysql_safe_string', $args);
        return vsprintf($query, $args);
        //mysqli_query($conn, $this->mysql_safe_query(""))
    }

    public function connect()
    {
        if (!$this->con) {
            global $myconn;
            $myconn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            @mysqli_set_charset('utf8', $myconn);
            if ($myconn) {
                $seldb = mysqli_select_db($myconn, $this->db_name);
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    array_push($this->result, mysqli_error($myconn));
                    return false;
                }
            } else {
                array_push($this->result, mysqli_error($myconn));
                return false;
            }
        } else {
            return true;
        }
    }

    public function disconnect()
    {
        global $myconn;
        if ($this->con) {
            if (@mysqli_close($myconn)) {
                $this->con = false;
                return true;
            } else {
                return false;
            }
        }
    }

    public function tableExists($table)
    {
        global $myconn;
        $tablesInDb = mysqli_query($myconn, "SHOW TABLES FROM $this->db_name LIKE '%$table'");
            if (mysqli_num_rows($tablesInDb) == 1) {
                return true;
            } else {
                array_push($this->result, $table. " does not exist in this database");
                return false;
            }


    }

    /**
     * @return string
     */
    public function sql($sql)
    {
        global $myconn;
        $query = mysqli_query($myconn, $sql);
        $this->myQuery = $sql;
        if ($query){
            $this->numResults = mysqli_num_rows($query);

            for ($i = 0; $i < $this->numResults; $i++){
                $r = mysqli_fetch_array($query, $this->numResults);
                $key = array_keys($r);
                for ($x = 0; $x < count($key); $x++){
                    if(!is_int($key[$x])){
                        if (mysqli_num_rows($query) >= 1){
                            $this->result[$i][$key[$x]] = $r[$key[$x]];
                        }else{
                            $this->result = null;
                        }
                    }
                }
            }
            return true;
        }else{
            array_push($this->result, mysqli_error($myconn));
            return false;
        }
    }

    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null)
    {
        global $myconn;
        $q = "SELECT $rows FROM $table";
        if ($join != null)
            $q .= " JOIN $join";
        if ($where != null)
            $q .= " WHERE $where";
        if ($order != null)
            $q .= " ORDER BY $order";
        if ($limit != null)
            $q .= " LIMIT $limit";
        $this->myQuery = $q;
        if ($this->tableExists($table)) {
            $query = mysqli_query($myconn, $q);
            if ($query) {
                $this->numResults = mysqli_num_rows($query);
                for ($i = 0; $i < $this->numResults; $i++) {
                    $r = mysqli_fetch_array($query);
                    $key = array_keys($r);
                    for ($x = 0; $x < count($key); $x++) {
                        if (!is_int($key[$x])) {
                            if (mysqli_num_rows($query) >= 1) {
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            } else {
                                $this->result = null;
                            }
                        }
                    }
                }
                return true;
            } else {
                array_push($this->result, mysqli_error($myconn));
                return false;
            }
        } else {
            return false;
        }
    }

    public function insert($table, $params = array())
    {
        global $myconn;
        $first_var = implode(',', array_keys($params));
        $second_var = implode("','", $params);
        if ($this->tableExists($table)) {
            $sql = "INSERT INTO $table($first_var) VALUES('$second_var')";
            $this->myQuery = $sql;
            if ($ins = mysqli_query($myconn, $sql)) {
                array_push($this->result, mysqli_insert_id($myconn));
                echo 'passed';
                return true;
            } else {
                echo 'failed';
                array_push($this->result, mysqli_error($myconn));
                return false;
            }
        }else {
            echo 'Table does not exist';
            return false;
        }
    }

    public function delete($table, $where = null)
    {
        global $myconn;
        if ($this->tableExists($table)) {
            if ($where == null) {
                $delete = "DROP TABLE $table";
            } else {
                $delete = "DELETE FROM $table WHERE $where";
            }
            $del = mysqli_query($myconn, $delete);

            if ($del) {
                array_push($this->result, mysqli_affected_rows($myconn));
                $this->myQuery = $delete;
                return true;
            } else {
                array_push($this->result, mysqli_error($myconn));
                return false;
            }
        } else {
            return false;
        }
    }

    public function update($table, $params = array(), $where)
    {
        global $myconn;
        if ($this->tableExists($table)) {
            $args = array();
            foreach ($params as $field => $value) {
                $args[] = $field . '="' . $value . '"';
            }

        $vars = implode(',', $args);
        $sql = "UPDATE $table SET $vars WHERE $where";
        $this->myQuery = $sql;
        if ($query = mysqli_query($myconn, $sql)) {
            array_push($this->result, mysqli_affected_rows($myconn));
            return true;
        } else {
            array_push($this->result, mysqli_error($myconn));
            return false;
        }
        }else{
        return false;
        }
    }


    public function getResults(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function getSql(){
        $val = $this->myQuery;
        $this->myQuery = array();
        return $val;
    }

    public function numRows(){
        $val = $this->numResults;
        $this->numResults = array();
        return $val;
    }

    public function escapeString($data){
        global $myconn;
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data, ENT_QUOTES, 'UTF-8');
        return mysqli_real_escape_string($myconn, $data);
    }

    public function time(){
        return date_default_timezone_set('Africa/Lagos');
    }
}