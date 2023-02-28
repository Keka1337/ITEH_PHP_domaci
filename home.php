<?php

require "dbBroker.php";
require "models/usluga.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
$podaci = Usluga::getAll($conn);

if (!$podaci) {
    echo "Nastala je greška pri preuzimanju podataka";
    die();
}
if ($podaci->num_rows == 0) {
    echo "Nema zakazanih intervencija";
    die();
} else {

?>

    <style>
        body {
            background-image: url("https://img.freepik.com/free-vector/diagonal-motion-lines-white-background_1017-33198.jpg?w=2000");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style/home.css">
        <link rel="stylesheet" type="text/css" href="style/global.css">
        <title>Stomatološka ordinacija</title>
    </head>

    <body>
        <div id="zaglavlje">
            <h1>Stomatološka ordinacija</h1>
            <h3>-SPISAK ZAKAZANIH PREGLEDA-</h3>
        </div>

        <div id="podZaglavlje">
            <input type="text" class="form-control" id="myInput" onkeyup="funkcijaZaPretragu()" placeholder="Pretrazi po nazivu....">
            <button id="btnPrikaz" class="btn btn-primary">SAKRIJ / PRIKAZI</button>
        </div>

        <div id="pregled">


            <table id="tabela" class="table table-hover">

                <thead class="thead">
                    <tr>
                        <th>Vrsta usluge</th>
                        <th>Ambulanta</th>
                        <th>Cena</th>
                        <th>Datum</th>
                        <th>ID pacijenta</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    while ($red = $podaci->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["naziv"] ?></td>
                            <td><?php echo $red["ambulanta"] ?></td>
                            <td><?php echo $red["cena"] ?></td>
                            <td><?php echo $red["datum"] ?></td>
                            <td><?php echo $red["pacijentId"] ?></td>
                            <td>
                                <label class="custom-radio-btn">
                                    <input type="radio" name="checked-donut" value=<?php echo $red["id"] ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </td>

                        </tr>
                <?php
                    endwhile;
                } ?>

                </tbody>
            </table>

            <div id="dugmici">
                <button id="-zakazivanje" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-lg">Zakazi novu intervenciju</button>
                <button id="dugme-izmeni" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#izmeniModal">Izmeni zakazanu intervenciju</button>
                <button id="btn-obrisi" formmethod="post" class="btn btn-primary btn-lg">Obrisi intervenciju</button>
                <button id="btn-sortiraj" class="btn btn-primary btn-lg" onclick="sortTable()">Sortiraj po ambulantama</button>
            </div>

        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container prijava-form">
                            <form action="#" method="post" id="dodajForm">
                                <h3>Zakazi intervenciju</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-11 ">
                                        <div class="form-group">
                                            <label for="">Vrsta intervencije</label>
                                            <input type="text" style="border: 1px solid black; width: 350px;" name="naziv" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ambulanta</label>
                                            <input type="text" style="border: 1px solid black;width: 350px; " name="sala" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="ambulanta">Cena</label>
                                            <input type="number" style="border: 1px solid black; width: 350px; " name="cena" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="ambulanta">ID pacijenta</label>
                                            <input type="number" style="border: 1px solid black; width: 350px; " name="pacijentId" class="form-control" />
                                        </div>
                                        <!-- <div class="col-md-12"> -->
                                        <div class="form-group">
                                            <label for="">Datum</label>
                                            <input type="date" style="border: 1px solid black; width: 350px; " name="datum" class="form-control" />
                                        </div>
                                        <!-- </div> -->
                                        <div class="form-group">
                                            <button id="Dodaj" type="submit" class="btn btn-primary btn-lg">Zakazi intervenciju</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Zatvori</button>
                    </div>
                </div>

            </div>



        </div>
        <div class="modal fade" id="izmeniModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container prijava-form">
                            <form action="#" method="post" id="izmeniForm">
                                <h3 style="color:rgb(83, 10, 10);">Izmeni zakazanu intervenciju</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="id" type="text" name="id" style="border: 1px solid black; width: 350px; " class="form-control" placeholder="Id *" value="" readonly />
                                        </div>
                                        <div class="form-group">
                                            <input id="naziv" type="text" name="naziv" style="border: 1px solid black; width: 350px; " class="form-control" placeholder="naziv*" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input id="ambulanta" type="text" name="ambulanta" style="border: 1px solid black; width: 350px; " class="form-control" placeholder="ambulanta *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input id="cena" type="number" name="cena" style="border: 1px solid black; width: 350px; " class="form-control" placeholder="cena(min) *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input id="datum" type="date" name="datum" style="border: 1px solid black; width: 350px; " class="form-control" placeholder="Datum *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input id="pacijentId" type="number" name="pacijentId" style="border: 1px solid black; width: 350px; " class="form-control" placeholder="id pacijenta(1, 2 ili 3) *" value="" />
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button id="btnIzmeni" type="submit" class="btn btn-primary btn-lg"> Izmeni intervenciju
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Zatvori</button>
                    </div>
                </div>



            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/pregledi.js"></script>

    </body>

    </html>