<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Verify Email</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        h1 {
            color: darkblue;
            margin-top: 200px;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .form-group {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .verification-button {
            margin-bottom: 60px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        p {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body {
            background-color: yellowgreen;
            font-family: Helvetica, sans-serif;
        }

        label,
        input {
            height: 100%;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
<div class='container'>
    <?php
    if (!is_array($data)) {
        echo $data;
    }
    ?>

    <?php
    $user_id = (string)$_SESSION['user_id'];
    $theUser = $this->model('User')->find($user_id);

    if (isset($_POST['action']) && $_POST['token'] == $theUser->token)
    {
       echo "<h1>Email Verification Complete!</h1>
      <form action='' method='post'>
        <div class='form-group' >
            <label style='font-weight: bold'> Access Code <input type='text' name='token' class='form-control' length='10' value='$theUser->token' disabled /></label >
        </div >
        <div class='verification-button'>
            <input type='submit' name='action' value = '&nbsp;&nbsp;Verify Token&nbsp;&nbsp;' class='btn btn-dark' disabled />
        </div>
      </form>
       <p>
           You May Access Your Account... &nbsp;&nbsp;<a href='/home/index' class='btn btn-primary'>Go to the Home Page</a>
       </p>";
    }

    else {
        echo "<h1> Validate Your Email with Token </h1>
    <form action='' method='post'>
        <div class='form-group' >
            <label style='font-weight: bold' > Access Code <input type='text' name='token' class='form-control' length='10' required /></label >
        </div >
        <div class='verification-button'>
            <input type='submit' name='action' value = '&nbsp;&nbsp;Verify Token&nbsp;&nbsp;' class='btn btn-dark' />
        </div>
    </form>
    <p>
        Wish to Go Back to the Login Page? &nbsp;&nbsp; <a href = '/login/index' class='btn btn-primary' >Return to Login </a >
    </p>";
    }
    ?>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</body>
</html>