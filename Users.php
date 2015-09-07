<?php header('Content-Type: text/html; charset=utf-8');
require_once "template/headerAdmin.php";
require_once "Controller/AdminController.php";
?>
<?php

$admin = new AdminController();

$array = $admin->SortInfo();

echo '
    <h1>That's just test</h1>
     <span id="AdminUp" style="color:red"></span>
     <table class="table table-bordered">
                    <table class="table">
                        <tbody>
                        <tr class="active">
                            <th scope="row" style="font-weight: 800">id</th>

                            <th scope="row" style="font-weight: 800">Name</th>

                            <th scope="row" style="font-weight: 800">Last Name</th>

                            <th scope="row" style="font-weight: 800">Email</th>
                            

                            <th scope="row" style="font-weight: 800">Delete</th>

                            <th scope="row" style="font-weight: 800">Role</th>

                            <th scope="row" style="font-weight: 800">Login</th>

                            <th scope="row" style="font-weight: 800">Firm</th>

                            <th scope="row" style="font-weight: 800">Number Firm</th>
                        </tr>
';


for($i=0;$i<count($array);$i++){{
            echo "
                        <tr>
                            <td>
                                <input type='text' style='width: 100%' id=".'id_'.$array[$i]["id"]." value=".$array[$i]["id"]." readonly></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='name' id=".'name_'.$array[$i]["id"]." value=".$array[$i]["name"]." ></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)' type='text' style='width: 100%' name='last_name'  id=".'lastname_'.$array[$i]["id"]." value=".$array[$i]["last_name"]." ></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='email'  id=".'email_'.$array[$i]["id"]." value=".$array[$i]["email"]." ></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='delete_user'  id=".'delete_'.$array[$i]["id"]." value=".$array[$i]["delete"]." ></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='role'  id=".'role_'.$array[$i]["id"]." value=".$array[$i]["role"]." ></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='login'  id=".'login_'.$array[$i]["id"]." value=".$array[$i]["login"]." /></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='firm'  id=".'firm_'.$array[$i]["id"]." value=".$array[$i]["firm"]."  ></input>
                            </td>
                            <td>
                                <input onblur='changeAdmin(this)'  type='text' style='width: 100%' name='number_firm'  id=".'numberfirm_'.$array[$i]["id"]." value=".$array[$i]["number_firm"]."  ></input>
                            </td>
                        </tr>

            ";

}

}



echo '
                        </tbody>
                    </table>
            </table>
';
?>

<?php require_once "template/footerAdmin.php"; ?>
