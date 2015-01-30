<?php header('Content-Type: text/html; charset=utf-8');
require_once "template/headerAdmin.php";
require_once "Controller/NewsController.php";
?>

<?php
    $news = new NewsController();
    $row = $news->littleNews();

echo '
  <span id="AdminNews" style="color:red"></span>
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



    if($row){
        for($i=0;$i<count($row) ;$i++){


            echo "
                        <tr>
                            <td>
                                <input type='text' style='width: 100%' id=".'id_'.$row[$i]["id"]." value=".$row[$i]["id"]." readonly></input>
                            </td>
                            <td>
                               <textarea rows='1' cols='30' name='text' style='font-weight: 800; text-align: center'> ".$row[$i]["Title"]."</textarea>
                            </td>
                            <td>
                                <textarea rows='5' cols='100' name='text'>".$row[$i]["Text"]."</textarea>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)' type='text' style='width: 100%' name='delete_news'  id=".'lastname_'.$row[$i]["id"]." value=".$row[$i]["delete"]." ></input>
                            </td>
                        </tr>

            ";
        }
    }else{
        $rows_max = $news->sortNews();

    }


echo '
                        </tbody>
                    </table>
            </table>
';
?>

<?php require_once "template/footerAdmin.php";?>