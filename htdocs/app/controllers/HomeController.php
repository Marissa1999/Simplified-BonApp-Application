<?php

/**
 * @accessFilter:{LoginFilter}
 */

class HomeController extends Controller
{
    public function index()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theUser = $this->model('User')->find($user_id);
        $this->view('home/index', $theUser);
    }

    public function tokenVerification()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theUser = $this->model('User')->find($user_id);

        if (isset($_POST['action'])) {

            if ($_POST['token'] == $theUser->token) {
                $theUser->status = 'Active';
                $theUser->updateStatus();

                $first_name = (string)$_SESSION['first_name'];
                $last_name = (string)$_SESSION['last_name'];
                $email = (string)$_SESSION['email'];
                $password = (string)$_SESSION['password'];

                require 'PHPMailerAutoload.php';

                $notification = new PHPMailer;
                $notification->isSMTP();
                $domain = explode('@', $email);

                switch ($domain[1]) {
                    case 'yahoo.com':
                        $notification->Host = 'smtp.mail.yahoo.com';
                        break;
                    case 'outlook.com':
                    case 'hotmail.com':
                    case 'live.com':
                        $notification->Host = 'smtp.live.com';
                        break;
                    case 'icloud.com':
                        $notification->Host = 'smtp.mail.me.com';
                        break;
                    default:
                        $notification->Host = 'smtp.' . $domain[1];
                }


                $notification->SMTPAuth = true;
                $notification->Username = $email;
                $notification->Password = $password;
                $notification->SMTPSecure = 'tls';
                $notification->Port = 587;

                $notification->setFrom('bonapp@mtygroup.com', 'Bon App');
                $notification->addAddress($email, $first_name . ' ' . $last_name);
                $notification->isHTML(true);

                $notification->Subject = 'Bon App - Profile Update Notification';
                $notification->Body = 'Thank you for confirming your email, ' . $first_name . ' ' . $last_name . '! Now, you have access to update your profile!<br>';

                if (!$notification->send()) {
                    $this->view('home/tokenVerification', '<div class="alert alert-danger" align="center" role="alert">
                    Your Profile Update Notification Email Did Not Send. Error: ' . $notification->ErrorInfo . '</div>');
                    exit;
                } else {
                    $this->view('home/tokenVerification', '<div class="alert alert-success" align="center" role="alert">
                    Thank You for Confirming Your Account! A Notification is Sent to Your Email to Update Your Profile!</div>');
                    exit;
                }

            } else {
                $this->view('home/tokenVerification', '<div class="alert alert-danger" align="center" role="alert">
                    Incorrect Access Code! Please Recheck the Code and Try Again.</div>');
            }
        } else {
            $this->view('home/tokenVerification');
        }
    }

    public function updateProfile()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theUser = $this->model('User')->find($user_id);

        if (isset($_POST['action'])) {
            $theUser->first_name = $_POST['first_name'];
            $theUser->last_name = $_POST['last_name'];
            $theUser->phone_number = $_POST['phone_number'];
            $theUser->birthday = $_POST['birthday'];
            $theUser->postal_code = $_POST['postal_code'];
            $theUser->gender = $_POST['gender'];
            $theUser->user_language = $_POST['language'];
            if (isset($_POST['newsletter'])) {
                $theUser->newsletter = 'Yes';
            } else {
                $theUser->newsletter = 'No';
            }
            $theUser->updateProfile();
            header('location:/home/index');

        } else {
            $this->view('home/updateProfile', $theUser);
        }
    }
}

?>