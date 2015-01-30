<?php
require_once "Model/User.php";
require_once "Controller/Notification.php";

session_start();
$infp = '';

class UserController extends User
{

    public $login;

    public $name;

    public $last_name;

    public $email;

    public $password;

    public $firm;


    public $number_firm;


    public function createEmail($email, $name, $last_name)
    {
        $token_user = md5($email.time()); // email + timestamp
        $message = "
                <html>
                <head>
                  <title></title>
                </head>
                <body>
                    <a href='http://localhost/News/View/registrationStep2.php?key=$token_user'>сылка</a>
                </body>
                </html>
                ";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $result = User::setUser($name,$last_name,$email,$token_user);
        if($result === true ){
            mail($email, "My Subject","Пожалуйста перейдите по ссылке для завершения второго этапа регистрации ".$message, $headers);
            echo Notification::create("Вы успешно зарегестрировались вам на почту было отправленно письмо на $email", "green");

        }else{
            echo Notification::create("Не удалось отправить письмо на $email <br/>
            Пожалуйста попробуйте позже , просим прощение за неудобство ", "red");
        }
    }


    public function createLog($login,$password,$token,$firm=null,$number_firm=null)
    {
        $user_id = User::getUserId($token);
        $result = User::setInfo($login,$password,$user_id[0],$firm,$number_firm);
        if($result === true ){
            echo Notification::create("Вы успешно зарегестрировались", "green");
        }else{
            echo Notification::create("Не удалось зарегестрироватся, у вас уже сушествует акаунт на эту почту", "red");
        }

    }


    public function update($email, $name, $last_name,$login,$password,$firm=null,$number_firm=null)
    {
        $result = User::changeInfo($email, $name, $last_name,$login,$password,$firm,$number_firm);
        if($result){
            echo "Данные успешно обновлены";
            $_SESSION["USER"] = User::getUserInfo($GLOBALS["_SESSION"]["USER"][4]);
        }else{
            echo "Ошибка обновления данных";
        }
    }

    public function SignIn($email, $password)
    {
            $row = User::login($email);
            $_SESSION["USER"] = User::getUserInfo($row[2]);
            if(password_verify($password,$row[0])) {
                $_SESSION['login'] = $row[1];
                $_SESSION['id_user'] = $row[2];
                if ($row[3] === 'admin') {
                    $_SESSION['admin'] = true;
                }
                if($row[3] === 'moderator') {
                    $_SESSION['moderator'] = true;
                }
                echo "ok";
            }else {
                echo "Не правельно введены данные";
            }
    }

    public function SignOut()
    {
        unset($_SESSION['login']);
        unset($_SESSION['user_id']);
        unset($_SESSION['USER']);
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        if (isset($_SESSION['moderator'])) {
            unset($_SESSION['moderator']);
        }
    }


    public function checkSendEmail($email, $name, $last_name)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo Notification::create("E-mail ($email) указан не верно.", "red");
        }
        if (empty($name)) {
            echo Notification::create("Поле имя не должно быть пусты", "red");
        }
        if (empty($last_name)) {
            echo Notification::create("Поле фамилия не должно быть пустым", "red");
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($last_name)) {
            $result = User::checkUser($email);
            if (empty($result)) {
                $name = mysqli_real_escape_string(User::$sql_connect,$name);
                $last_name = mysqli_real_escape_string(User::$sql_connect,$last_name);
                $this->createEmail($email,$name,$last_name);
            }else{
                echo Notification::create("Пользователь с почтой $email уже существует", "red");
            }
        }

    }

    public function checkLogin($login,$password,$token,$firm=null,$number_firm=null)
    {
        $result = User::checkLog($login);
        if(empty($password)){
            echo "Пароль не может быть пустым";
        }
        if (empty($result)) {
            $login = mysqli_real_escape_string(User::$sql_connect,$login);
            $firm = mysqli_real_escape_string(User::$sql_connect,$firm);
            $number_firm = mysqli_real_escape_string(User::$sql_connect,$number_firm);

            $this->createLog($login,$password,$token,$firm,$number_firm);
        }else{
            echo Notification::create("Пользователь с логином $login уже существует", "red");
        }
    }

    public function checkPass($password){
        $hash = $GLOBALS["_SESSION"]["USER"][0];
        if(!password_verify($password,$hash)){
            echo "Не верный пароль";
        }
    }
}
