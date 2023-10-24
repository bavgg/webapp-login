<!DOCTYPE html>
<html>
<head>
    <title>Home | Welcome <?php echo $this->session->account_name; ?></title>
</head>
<body>
    <h1>Welcome <?php echo $this->session->account_name; ?></h1>
    <a href="<?php echo 'http://localhost:8080/logout'; ?>">Log Out</a> <br>
    <em>This page is restricted to unauthorized users. Only logged in users can see/access this page.</em>
</body>
</html>
