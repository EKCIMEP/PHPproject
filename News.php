<?php header('Content-Type: text/html; charset=utf-8');
require_once "template/headerAdmin.php";
require_once "Controller/NewsController.php";
?>

<?php
    $news = new NewsController();
    $row = $news->littleNews();

echo '
  <span id="AdminUp" style="color:red"></span>
     <table class="table table-bordered">
                    <table class="table">
                        <tbody>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">id</th>

                            <th scope="row" style="font-weight: 800">Title</th>

                            <th scope="row" style="font-weight: 800">Text</th>

                            <th scope="row" style="font-weight: 800">Delete</th>
                        </tr>

';



    if(is_array($row)){
        for($i=0;$i<count($row) ;$i++){
            echo "
                        <tr>
                            <td>
                                <input type='text' style='width: 100%' id=".'id_'.$row[$i]["id"]." value=".$row[$i]["id"]." readonly></input>
                            </td>
                            <td>
                               <textarea onblur='changeAdmin(this)' name='title'  id=".'title_'.$row[$i]["id"]." rows='1' cols='30' style='font-weight: 800; text-align: center'> ".$row[$i]["Title"]."</textarea>
                            </td>
                            <td>
                                <textarea onblur='changeAdmin(this)' name='text'  id=".'text_'.$row[$i]["id"]." rows='5' cols='100' name='text'>".$row[$i]["Text"]."</textarea>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)' type='text' style='width: 100%' name='delete_news'  id=".'deletenews_'.$row[$i]["id"]." value=".$row[$i]["delete"]." ></input>
                            </td>
                        </tr>

            ";
        }
    }else{
        $row_max = $row;
        $page_rows = 10;
        $last = ceil($row_max/$page_rows);
        if($last <1 ){
            $last = 1;
        }
        $pagenum = 1;
        if(isset($_GET["pn"])){
            $pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
        }

        if($pagenum <1){
            $pagenum=1;
        }elseif ($pagenum > $last){
            $pagenum = $last;
        }

        $limit = 'LIMIT '.($pagenum-1)*$page_rows.', '.$page_rows;

        $data = $news->Limit($limit);

        $textline1 = "Testimonials (<b>$row_max</b>)";
        $textline2 = "Page <b$pagenum<b> of <b>$last</b>";

        $paginationCtrls ='';

        if($last != 1){
            if($pagenum > 1){
                $previous = $pagenum - 1;
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp;';
                for($i=$pagenum - 4 ;$i < $pagenum ; $i++){
                    if($i>0){
                        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;';
                    }
                }
            }
            $paginationCtrls .= ''.$pagenum.' &nbsp;';
            for($i=$pagenum +1 ;$i <= $last ; $i++){

                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;';
                if($i >= $pagenum +4){
                    break;
                }
            }
            if($pagenum!=$last){
                $next = $pagenum+1;
                $paginationCtrls .= '&nbsp; &nbsp;  <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> &nbsp;';
            }

        }

        $list = '';
        for($i=0;$i<count($data) ;$i++){
            $list .= "
                        <tr>
                            <td>
                                <input type='text' style='width: 100%' id=".'id_'.$data[$i]["id"]." value=".$data[$i]["id"]." readonly></input>
                            </td>
                            <td>
                               <textarea onblur='changeAdmin(this)' name='title'  id=".'title_'.$data[$i]["id"]." rows='1' cols='30' style='font-weight: 800; text-align: center'> ".$data[$i]["Title"]."</textarea>
                            </td>
                            <td>
                                <textarea onblur='changeAdmin(this)' name='text'  id=".'text_'.$data[$i]["id"]." rows='5' cols='100' name='text'>".$data[$i]["Text"]."</textarea>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)' type='text' style='width: 100%' name='delete_news'  id=".'deletenews_'.$data[$i]["id"]." value=".$data[$i]["delete"]." ></input>
                            </td>
                        </tr>

            ";
        }
    }





?>
    <div class="pag">
        <p><?php echo $list; ?></p>
    </div>
            </tbody>
        </table>

    </table>
    <div id='pagination_controls'><?php echo $paginationCtrls; ?></div>
<?php require_once "template/footerAdmin.php";?>