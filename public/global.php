<?php header('Content-Type: text/html; charset=utf-8'); 
require_once "../template/header.php";
require_once "../conf.php";
?>

<?php

$sql = "SELECT COUNT(id) FROM news WHERE delete_news <> '1'";
$sql_connect = Conf::connect();
$db = mysqli_select_db($sql_connect,"first_project");
$query = mysqli_query($sql_connect, $sql);

$row = mysqli_fetch_row($query);
$rows = $row[0];
$page_rows = 10;
$last = ceil($rows/$page_rows);
if($last < 1){ $last = 1; }
$pagenum = 1;
if(isset($_GET['pn'])){ $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']); }
if ($pagenum < 1) { $pagenum = 1; } else if ($pagenum > $last) { $pagenum = $last; }
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$sql = "SELECT title,text FROM news WHERE delete_news<>'1' ORDER BY id DESC $limit";
$query = mysqli_query($sql_connect, $sql);



$paginationCtrls = '';
if($last != 1){
if ($pagenum > 1) {
$previous = $pagenum - 1; $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';

for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
}
}

}
$paginationCtrls .= ''.$pagenum.' &nbsp; ';
for($i = $pagenum+1; $i <= $last; $i++){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
if($i >= $pagenum+4){ break; } }
if ($pagenum != $last) {
$next = $pagenum + 1; $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
}
}
$list = '';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
$title = $row["title"];
$text = $row["text"];
$list .=
'
<div class="rpad">
    <h1 class="title">'.$title.'</h1>

    <p>'.$text.'</p>
    ____________________________________________________________________________________________________________________________________________________
</div>
';
}
mysqli_close(Conf::connect());


?>


<div>
    <p><?php echo $list; ?></p>
    <div>
        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>




<?php require_once "../template/footer.php"; ?>
