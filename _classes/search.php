<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 27/10/2017
 * Time: 05:00 PM
 */
    //require ("../_autoloader/manage.php");
    spl_autoload_register(function ($c){
        include '_classes/'.$c.'.php';
    });
    class search extends pdo_dbconnections
    {
        public $numrows;
        public function searchs($table, $search, $rows = '*', $join = null, $order = null, $limit = null){
            if ($this->tableExists($table)) {
                $q = "SELECT $rows FROM $table WHERE post_title LIKE :word OR post_cat LIKE :word OR post_cont LIKE :word ";
                if ($join != null)
                    $q .= " JOIN $join";
                if ($order != null)
                    $q .= " ORDER BY $order";
                if ($limit != null)
                    $q .= " LIMIT $limit";
//                $this->myQuery = $q;
                $stmt = $this->conn->prepare($q);
                $stmt->bindValue(':word', '%'.$search.'%', PDO::PARAM_STR);
                $stmt->execute();
                $data = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                //array_push($this->result, $stmt);
                return $data;
            }else throw new Exception('That table does not exist');

        }

        public function page($table, $search, $rows = '*', $join = null, $order = null, $page, $no){
            if ($this->tableExists($table)) {
                $q = "SELECT count(id) FROM $table WHERE post_title LIKE :word OR post_cat LIKE :word OR post_cont LIKE :word ";
                if ($join != null)
                    $q .= " JOIN $join";
                if ($order != null)
                    $q .= " ORDER BY $order";

                $stmt = $this->conn->prepare($q);
                $stmt->bindValue(':word', '%'.$search.'%', PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetch();
                $tot_rec = $row[0];
                $tot_page = ceil($tot_rec / $no);

                if ($tot_page > 1) {
                    if ($page != 1){
                        $prev = $page - 1;
                        echo "<div class='col-lg-1'><a style='text-decoration:none;' href='index.php?page=1&search=$search'><input type='button' value='First'></a></div>";
                    echo "<div class='col-lg-1'><a style='text-decoration:none;' href='index.php?page=" . $prev . "&search=$search'><input type='button' value='Prev'></a></div>";
                    }

//                    for ($i = 1; $i <= $tot_page; $i++) {
//                        echo "<a style='text-decoration:none;' href='index.php?page=" . $i . "'><input type='button' value='".$i."'";
//                        if ($page == $i) {
//                            echo "style='color:#E68374; font-weight:bold;'";
//                        }
//                        echo "></a>";
//                    }

                    if ($page != $tot_page){
                        $next = $page + 1;
                        echo "<div class='col-lg-1'><a style='text-decoration:none;' href='index.php?page=" . $next . "&search=$search'><input type='button' value='Next'></a></div>";
                        echo "<div class='col-lg-1'><a style='text-decoration:none;' href='index.php?page=" . $tot_page . "&search=$search'><input type='button' value='Last'></a></div>";
                    }
                    echo '<div class="col-lg-6"></div>';
                    echo '<div class="col-lg-2"><b>Page '.$page.' of '.$tot_page.'</b></div>';
                }


            }else throw new Exception('That table does not exist');

        }

        function bg($post_cat)
        {
            if ($post_cat == 'Headline') {
                return 'bg-primary';
            } elseif ($post_cat == 'Hot') {
                return 'bg-danger';
            } elseif ($post_cat == 'Gossip') {
                return 'bg-danger';
            } elseif ($post_cat == 'Fashion') {
                return 'bg-success';
            } elseif ($post_cat == 'Sport') {
                return 'bg-warning';
            } elseif ($post_cat == 'Science') {
                return 'bg-info';
            } elseif ($post_cat == 'Health') {
                return 'bg-info';
            } elseif ($post_cat == 'Financial') {
                return 'bg-warning';
            } else{
                return 'bg-success';
            }
        }

        function chard($string, $limit=308){
            $res = "";
            for ($i=0; $i<$limit; $i++){
                $res .= $string[$i];
            }
            return $res;
        }
    }