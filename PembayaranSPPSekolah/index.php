<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <title>Login</title>
    <link rel="icon" href="assets/images/logo-smk.png">
</head>
<body>
    <div class="container">
        <div class="mt-3 text-center">
            <h1>Halaman Login</h1>
            <img src="assets/images/logo-smk.png" width="250px" title="logo.png">
            <div class="row mt-4">
                <div class="col-4"></div>
                <div class="col-6">
                    <table>
                        <form action="proses.php" method="post">
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><input type="text" name="username" autofocus required placeholder="Username" autocomplete="off" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="left">Password</td>
                                <td>:</td>
                                <td><input type="password" name="password" required placeholder="example123" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="left"><br><input type="submit" value="Log In" class="btn btn-primary"></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>