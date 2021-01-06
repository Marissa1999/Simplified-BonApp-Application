<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        h1 {
            color: darkblue;
            margin-top: 200px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        h4 {
            margin-bottom: 30px;
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

        .login-button {
            margin-top: 30px;
            margin-bottom: 30px;
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
    <h1>Login to Bon App</h1>
    <h4>Get Ready to Eat and Earn Rewards!</h4>
    <form action='' method='post'>
        <div class='form-group'>
            <label style="font-weight: bold">Email <input type='email' name='email' class='form-control' minlength="10" required/></label>
        </div>
        <div class='form-group'>
            <label style="font-weight: bold">Password <input type='password' name='password' class='form-control' minlength="8" required/></label>
        </div>
        <div class='login-button'>
            <input type='submit' name='action' value='&nbsp;&nbsp;Log In&nbsp;&nbsp;' class=' btn btn-dark'/>
        </div>
    <p>
        Don't Have an Account? &nbsp;&nbsp; <a href='/login/register' class='btn btn-primary'>Create an Account</a>
    </p>
    </form>
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