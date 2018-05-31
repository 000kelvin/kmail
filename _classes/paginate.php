<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 27/10/2017
 * Time: 10:38 PM
 */
class paginate extends pdo_dbconnections
{
    public function pagelink($query, $rec_per_page){
        $self = $_SERVER['PHP_SELF'];
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_records = $stmt->rowCount();

        if ($total_records > 0){
            ?><tr><td colspan="3">

            <?php
            $total_pages = ceil($total_records/$rec_per_page);
            $cur_page = 1;
            if (isset($_GET['page_no'])){
                $cur_page = $_GET['page_no'];
            }
            if ($cur_page != 1){
                $prev = $cur_page-1;
                echo '<a href="'.$self.'?page_no=1">First</a>&nbsp; &nbsp;';
                echo '<a href="'.$self.'?page_no='.$prev.'">Previous</a>&nbsp; &nbsp;';
            }
            for ($i=1; $i<=$total_pages; $i++){
                if ($i == $cur_page){
                    echo "<strong><a href='".$self."?page_no=".$i."' style='color:red; text-decoration:none;'>".$i."</a></strong>&nbsp; &nbsp;";
                }else{
                    echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp; &nbsp;";
                }
            }
            if ($cur_page != $total_pages){
                $next = $cur_page + 1;
                echo '<a href="'.$self.'?page_no='.$next.'">Next</a>&nbsp; &nbsp;';
                echo '<a href="'.$self.'?page_no='.$total_pages.'">Last</a>&nbsp; &nbsp;</td></tr>';
            }
        }
    }
}