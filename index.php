<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <link rel="stylesheet" type="text/css" href="style/global.css">
    <title>Stomatološka ordinacija</title>
</head>


<body>
    <h1 class="h1">Stomatološka ordinacija</h1>
    <div class="login-form">
        <h2>Log-in</h2>
        <p>Unesite korisnicko ime i lozinku</p>
        <div class="container">
            <form method="POST" action="#">
                <div class="forma">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="korisnickoIme" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Korisnicko ime</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="password" name="lozinka" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Lozinka </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" id="dugme" name="submit" class="btn btn-primary btn-lg">Uloguj se</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>