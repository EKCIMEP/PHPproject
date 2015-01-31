<?php header('Content-Type: text/html; charset=utf-8');
require_once "template/headerAdmin.php";
require_once "Controller/AdminController.php";
?>

<div>
    <span id="AdminUp" style="color:red"></span>
    <table class="table table-bordered">
        <table class="table">
            <tbody>
            <tr class="active">
                <th scope="row" style="font-weight: 800">Title</th>
                <td>
                    <input type='text' style='width: 100%' id="Title" value="" />
                </td>
            </tr>
            <tr class="active">

                <th scope="row" style="font-weight: 900">Text</th>

                <td>
                    <textarea type='text' rows='10' cols='200' id="Text"></textarea>
                </td>
            </tr>
            <tr>
            </tbody>
        </table>
    </table>
    <button class="btn btn-lg btn-primary btn-block" id="AddNews" style="width: 10%">Add</button>
</div>

<?php require_once "template/footerAdmin.php"; ?>