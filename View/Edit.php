<?php header('Content-Type: text/html; charset=utf-8');
require_once "../template/header.php";
?>
<?php
if(isset($_SESSION['login']))
{
    echo  '
     <span id="up" style="color:red"></span>
     <table class="table table-bordered">
                    <table class="table">
                        <tbody>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">Login</th>
                            <td>
                                <input type="text" style="width: 100%" id="updateLogin" value="'.$GLOBALS["_SESSION"]["USER"][1].'"/>
                            </td>
                        </tr>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">Email</th>
                            <td>
                               <input style="width: 100%" id="updateEmail" value="'.$GLOBALS["_SESSION"]["USER"][5].'" readonly/>
                            </td>
                        </tr>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">Name</th>
                            <td>
                                <input type="text" style="width: 100%" id="updateName" value="'.$GLOBALS["_SESSION"]["USER"][6].'"/>
                            </td>
                        </tr>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">LastName</th>
                            <td>
                                <input type="text" style="width: 100%" id="updateLastName" value="'.$GLOBALS["_SESSION"]["USER"][7].'"/>
                            </td>
                        </tr>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">Frim</th>
                            <td>
                                <input type="text" style="width: 100%" id="updateFirm" value="'.$GLOBALS["_SESSION"]["USER"][2].'"/>
                            </td>
                        </tr>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">Number Firm</th>
                            <td>
                                <input type="text" style="width: 100%" id="updateNumFirm" value="'.$GLOBALS["_SESSION"]["USER"][3].'"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
            </table>
            <input type="checkbox" name="multi_note" value="1" onclick="showMe(this)"> Change password
                        <div id="passwordHide" style="display:block; display:none;">
                            <tr class="active">
                                <th scope="row" style="font-weight: 800">Password</th>
                                <td>
                                    <input type="password" style="width: 100%" id="inputPass"/>
                                </td>
                            </tr>
                            <tr class="active">
                                <th scope="row" style="font-weight: 800">News Password</th>
                                <td>
                                    <input onblur="updatePassword()" type="password" style="width: 100%" id="updatePassword"/>
                                </td>
                            </tr>
                            <tr class="active">
                                <th scope="row" style="font-weight: 800">Repeat Password</th>
                                <td>
                                    <input onblur="updatePassword1()" type="password" style="width: 100%" id="updatePassword2"/>
                                </td>
                            </tr>
                        </div>
        <button class="btn btn-lg btn-primary btn-block" id="Edit">Edit</button>
        ';
}
?>
<?php require_once "../template/footer.php"; ?>
