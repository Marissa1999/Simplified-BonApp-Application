<?php

class LoginController extends Controller
{

    public function index()
    {
        if (isset($_POST['action'])) {
            $theUser = $this->model('User')->findUser($_POST['email']);

            if ($theUser != null && password_verify($_POST['password'], $theUser->password)) {
                if ($theUser->status == 'Inactive') {
                    $_SESSION['user_id'] = $theUser->user_id;
                    $_SESSION['first_name'] = $theUser->first_name;
                    $_SESSION['last_name'] = $theUser->last_name;
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['password'] = $_POST['password'];
                    header('location:/home/tokenVerification');
                } else {
                    $_SESSION['user_id'] = $theUser->user_id;
                    header('location:/home/index');
                }
            } else {
                $this->view('login/index', '<div class="alert alert-danger" align="center" role="alert">
                    Error: Incorrect Email/Password Combination!</div>');
            }
        } else {
            $this->view('login/index');
        }
    }

    public function register()
    {
        if (isset($_POST['action'])) {
            $newUser = $this->model('User');
            $theUser = $newUser->findUser($_POST['email']);

            if ($theUser == null && $_POST['password'] == $_POST['password_confirm']) {
                $newUser->first_name = $_POST['first_name'];
                $newUser->last_name = $_POST['last_name'];
                $newUser->email = $_POST['email'];
                $newUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $newUser->phone_number = null;
                $newUser->birthday = null;
                $newUser->postal_code = null;
                $newUser->gender = null;
                $newUser->user_language = null;
                if (isset($_POST['newsletter'])) {
                    $newUser->newsletter = 'Yes';
                } else {
                    $newUser->newsletter = 'No';
                }
                $newUser->status = 'Inactive';
                $newUser->token = $this->getToken();

                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $first_name = $_REQUEST['first_name'];
                $last_name = $_REQUEST['last_name'];

                require 'PHPMailerAutoload.php';

                $mail = new PHPMailer;
                $mail->isSMTP();
                $domain = explode('@', $email);

                switch ($domain[1]) {
                    case 'yahoo.com':
                        $mail->Host = 'smtp.mail.yahoo.com';
                        break;
                    case 'outlook.com':
                    case 'hotmail.com':
                    case 'live.com':
                        $mail->Host = 'smtp.live.com';
                        break;
                    case 'icloud.com':
                        $mail->Host = 'smtp.mail.me.com';
                        break;
                    default:
                        $mail->Host = 'smtp.' . $domain[1];
                }

                $mail->SMTPAuth = true;
                $mail->Username = $email;
                $mail->Password = $password;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('bonapp@mtygroup.com', 'Bon App');
                $mail->addAddress($email, $first_name . ' ' . $last_name);
                $mail->isHTML(true);

                $mail->Subject = 'Bon App - Registration and Newsletter Confirmation';
                $mail->Body = 'Thank you for registering ' . $first_name . ' ' . $last_name . '!<br>
                               Here is the token in order to login to Bon App: ' . $newUser->token . '.<br>
                               Also, it seems that you have said "' . $newUser->newsletter . '" to subscribe to our newsletter.';

                if (!$mail->send()) {
                    $this->view('login/register', '<div class="alert alert-danger" align="center" role="alert">
                    Did Not Manage to Register and Your Registration and Newsletter Confirmation Email Did Not Send. Error: ' . $mail->ErrorInfo . '</div>');
                    exit;
                } else {
                    $newUser->create();
                    $this->view('login/register', '<div class="alert alert-success" align="center" role="alert">
                    Thank you for Registering! A Message is Successfully Sent to Your Email with an Access Code!</div>');
                    exit;
                }
            }

            $this->view('login/register', '<div class="alert alert-danger" align="center" role="alert">
                     Error: Could Not Register Since Email Already in Use or Passwords Did Not Match!</div>');
        } else {
            $this->view('login/register');
        }

    }


    public function getToken($length = 10)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, strlen($codeAlphabet))];
        }
        return $token;
    }

    public function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 0) return $min;
        $log = log($range, 2);
        $bytes = (int)($log / 8) + 1;
        $bits = (int)$log + 1;
        $filter = (int)(1 << $bits) - 1;
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public function logout()
    {
        session_destroy();
        header('location:/login/index');
    }

}

?>