
<?php
	//include connection file
	include_once("dbconfig.php");

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
		$this->data = json_encode($this->data);
//        $this->data = html_entity_decode($this->data, ENT_XML1, 'UTF-8');
//        $this->data = htmlspecialchars_decode($this->data);

		echo $this->data;
	}
//	function insertEmployee($params) {
//		$data = array();;
//		$sql = "INSERT INTO `subscribers` (post_cat, post_title, post_cont) VALUES('" . $params["name"] . "', '" . $params["title"] . "','" . $params["news"] . "');  ";
//
//		echo $result = mysqli_query($this->conn, $sql) or die("error to insert employee data");
//
//	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = '';

//		if( !empty($params['searchPhrase']) ) {
//			$where .=" WHERE post_cat LIKE '".$params['searchPhrase']."%' ";
//            $where .=" (post_cat LIKE '".$params['searchPhrase']."%' ";
//			$where .=" OR post_title LIKE '".$params['searchPhrase']."%' ";
//			$where .=" OR post_cont LIKE '".$params['searchPhrase']."%' ";
//			$where .=" OR post_date LIKE '".$params['searchPhrase']."%' )";
//	   }

	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
        $requiredUserLevel = array(2,3,4);
        $cfgProgDir = '../';
        include($cfgProgDir . "secure.php");
        $up_id = uniqid();
	   // getting total number records without any search
		$sql = "SELECT * FROM `subscribers`";
		$sqlTot .= $sql;
		$sqlRec .= $sql;

		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;

		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch total data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch data");

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
		$sql = "Update `subscribers` set email = '" . addslashes($params["edit_email"]) ."' WHERE id='".$_POST["edit_id"]."'";
		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}

	function deleteEmployee($params) {
		$data = array();
		$sql = "delete from `subscribers` WHERE id='".$params["id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
	}
}
?>
