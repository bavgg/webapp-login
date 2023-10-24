<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <?php
    echo validation_errors();
    echo form_open('login/verify');
    echo form_label('Username', 'txtuser');
    echo form_input('txtuser', '', 'id="txtuser"').'<br>';
    echo form_label('Password', 'txtpass');
    echo form_password('txtpass', '', 'id="txtpass"').'<br>';
    echo form_submit('btnlogin', 'Log in');
    echo form_close();
    ?>
</body>

</html>