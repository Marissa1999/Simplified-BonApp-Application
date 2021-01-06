<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        h1 {
            color: darkblue;
            margin-top: 130px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .form-group {
            margin-bottom: 20px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .save-button {
            margin-top: 30px;
            margin-bottom: 30px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        label {
            height: 100%;
            display: inline;
            text-align: center;
        }

        select {
            height: 100%;
            display: inline;
            text-align: center;
        }

        input[type=text] {
            text-align: center;
        }

        input[type=date] {
            text-align: center;
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

    </style>
    <title>Update My Profile</title>
</head>
<body>
<div class='container'>
    <h1>Update My Profile</h1>
    <form action='' method='post'>
        <div class='form-group'>
            <label style="font-weight: bold">First Name <input type='text' name='first_name'
                                                               value='<?= $data->first_name ?>' minlength="2"
                                                               class='form-control' required/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Last Name <input type='text' name='last_name'
                                                              value='<?= $data->last_name ?>' minlength="2"
                                                              class='form-control' required/></label>
        </div>
        <div class='form-group'>

            <label style="font-weight: bold">Phone Number <input type='text' name='phone_number' pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                                                 value='<?= $data->phone_number ?>'
                                                                 class='form-control' placeholder="Ex: 123-456-7890"/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Postal Code <input type='text' name='postal_code'  value='<?= $data->postal_code ?>' placeholder="Ex: H5J 4Y9"
                                      pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" class='form-control'
                                      minlength="7" required/></label>
        </div>
        <div class='form-group'>
            <label style="font-weight: bold">Birthday <input type='date' name='birthday' placeholder='YYYY-MM-DD' min="1920-01-01" max="<?php echo date('Y-m-d') ?>"
                                                           value='<?= $data->birthday ?>'class='form-control' required/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Gender
                <select name="gender" class='form-control' required>
                    <option value=""></option>
                    <option value="Male" <?=$data->gender == 'Male' ? ' selected="selected"' : '' ?>>Male</option>
                    <option value="Female" <?=$data->gender == 'Female' ? ' selected="selected"' : '' ?>>Female</option>
                    <option value="Other" <?=$data->gender == 'Other' ? ' selected="selected"' : '' ?>>Other</option>
                </select>
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Language
                <select name="language" class='form-control' required>
                    <option value=""></option>
                    <option value="English" <?=$data->user_language == 'English' ? ' selected="selected"' : '' ?>>English</option>
                    <option value="French" <?=$data->user_language == 'French' ? ' selected="selected"' : '' ?>>French</option>
                </select>
            </label>
        </div>
        <div class='form-group'>
            <label style="font-weight: bold">Subscribe to the Newsletter<input type='checkbox' name='newsletter' <?= $data->newsletter == 'Yes' ? 'checked' : 'No' ?> class='form-control'/></label>
        </div>



        <div class="save-button">
            <input type='submit' name='action' value='&nbsp;&nbsp;Save Changes&nbsp;&nbsp;' class='btn btn-dark'/>
        </div>
        <p>
            <a href='/home/index' class='btn btn-primary'>Back to the Home Page</a>
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
