<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        h1 {
            color: darkblue;
            margin-top: 160px;
            margin-bottom: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h2 {
            margin-top: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        h3 {
            margin-top: 25px;
            display: flex;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        li {
            display: inline-block;
        }


        li:last-child {
            border-right: none;
        }

        li a {
            font-size: 20px;
            display: block;
            color: darkblue;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #d1d1f6;
        }

        a:link {
            text-decoration: none;
        }

        body {
            background-color: yellowgreen;
            font-family: Helvetica, sans-serif;
        }

        html, body {
            width: 100%;
        }

        dl {
            text-align: center;
        }

        label,
        input {
            height: 100%;
            display: block;
            text-align: center;
        }
    </style>
    <title>Home Page</title>
</head>
<body>
<div class='container' style="overflow: auto;">
    <h1>Welcome to Bon App!</h1>
    <ul>&nbsp;&nbsp;
        <li><a href='/home/updateProfile'  align="center" class="btn btn-info">Modify Profile</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li><a href='/login/logout' align="center" class="btn btn-danger">Logout</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </ul>
    <br/>
    <dl>
        <br/>
        <table class='table table-striped' style="width:60%" align="center">
            <tr>
                <td>
                    <dt>First Name:</dt><dd><?= $data->first_name ?></dd>
                </td>
                <td>
                    <dt>Last Name:</dt>
                    <dd><?= $data->last_name ?></dd>
                </td>
                <td>
                    <dt>Email:</dt>
                    <dd><?= $data->email ?></dd>
                </td>
            </tr>
            <tr>
                <td>
                    <dt>Phone Number:</dt>
                    <dd><?=$data->phone_number == null ? 'None' : $data->phone_number ?></dd>
                </td>
                <td>
                    <dt>Postal Code:</dt>
                    <dd><?=$data->postal_code == null ? 'None' : $data->postal_code ?></dd>
                </td>
                <td>
                    <dt>Birthday:</dt>
                    <dd><?=$data->birthday == null ? 'Not Set Yet' : $data->birthday ?></dd>
                </td>
            </tr>
            <tr>
                <td>
                    <dt>Gender:</dt>
                    <dd><?=$data->gender == null ? 'Not Set Yet' : $data->gender ?></dd>
                </td>
                <td>
                    <dt>Language:</dt>
                    <dd><?=$data->user_language == null ? 'Not Set Yet' : $data->user_language ?></dd>
                </td>
                <td>
                    <dt>Subscribed to Newsletter?</dt>
                    <dd><?= $data->newsletter ?></dd>
                </td>
            </tr>
        </table>
    </dl>
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