
<?php
//include connection file
include_once("f_dbconfig.php");

$db = new dbObj();
$connString =  $db->getConnstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$empCls = new Employee($connString);

switch($action) {
    case 'add':
        $empCls->insertEmployee($params);
        break;
    case 'edit':
        $empCls->updateEmployee($params);
        break;
    case 'delete':
        $empCls->deleteEmployee($params);
        break;
    default:
        $empCls->getEmployees($params);
        return;
}

class Employee {
    protected $conn;
    protected $data = array();
    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getEmployees($params) {

        $this->data = $this->getRecords($params);

        echo json_encode($this->data);
    }
    function insertEmployee($params) {
        $data = array();;
        $sql = "INSERT INTO `second_segment` (image, title, news) VALUES('" . $params["name"] . "', '" . $params["title"] . "','" . $params["news"] . "');  ";

        echo $result = mysqli_query($this->conn, $sql) or die("error to insert employee data");

    }


    function getRecords($params) {
        $rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

        if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

        $sql = $sqlRec = $sqlTot = $where = '';

        if( !empty($params['searchPhrase']) ) {
            $where .=" WHERE ";
            $where .=" ( title LIKE '".$params['searchPhrase']."%' ";
            $where .=" OR news_content LIKE '".$params['searchPhrase']."%' ";

            $where .=" OR p_name LIKE '".$params['searchPhrase']."%' )";
        }
        if( !empty($params['sort']) ) {
            $where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
        }
        $requiredUserLevel = array(2,3,4);
        $cfgProgDir = '../';
        include($cfgProgDir . "secure.php");
        $up_id = uniqid();
        // getting total number records without any search
        $sql = "SELECT * FROM `second_segment` WHERE second_segment.p_name = '$login'";
        $sqlTot .= $sql;
        $sqlRec .= $sql;

        //concatenate search sql if value exist
        if(isset($where) && $where != '') {

            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        if ($rp!=-1)
            $sqlRec .= " LIMIT ". $start_from .",".$rp;


        $qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
        $queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");

        while( $row = mysqli_fetch_assoc($queryRecords) ) {
            $data[] = $row;
        }

        $json_data = array(
            "current"            => intval($params['current']),
            "rowCount"            => 10,
            "total"    => intval($qtot->num_rows),
            "rows"            => $data   // total data array
        );

        return $json_data;
    }
    function updateEmployee($params) {
        $data = array();
        //print_R($_POST);die;
        $sql = "Update `second_segment` set name = '" . $params["edit_name"] . "', title='" . $params["edit_title"]."', news_content='" . $params["edit_news"] . "' WHERE id='".$_POST["edit_id"]."'";

        echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
    }

    function deleteEmployee($params) {
        $data = array();
        //print_R($_POST);die;
        $sql = "delete from `second_name` WHERE id='".$params["id"]."'";

        echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
    }
}
?>
	