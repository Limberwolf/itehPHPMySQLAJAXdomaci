<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Ljubimci i Vlasnici - ITEH Prvi domaći</title>
</head>

<body>
    <h1 id="naslov" class=" text-center">Kućni ljubimci i njihovi vlasnici</h1>
    <a href="dodajNovog.php"><button type="button" class="btn btn-primary" id="btn_novi_ljubimac">Forma za novog ljubimca</button></a>
    <div id="div-tbl-pocetna">
        <table class="table table-light table-striped table-hover table-bordered">
            <thead class="text-center">
                <tr>
                    <th id="id-col">ID</th>
                    <th id="tip-col">Tip</th>
                    <th id="rasa-col">Rasa</th>
                    <th id="ime-col">Ime</th>
                    <th id="godine-col">Godine</th>
                    <th id="boja-col">Boja</th>
                    <th id="imev-col">Ime Vlasnika</th>
                    <th id="prezime-col">Prezime Vlasnika</th>
                    <th id="izmena-brisanje">Izmeni / Obriši</th>
                </tr>
            </thead>
            <tbody id="content" class="text-center">

                <?php
                include 'db.php';

                $db = new DB();
                $upit = "select ljub.id, ljub.tip, ljub.ime, ljub.rasa, ljub.boja, ljub.godine, ljub.boja, vl.imev, vl.prezime 
                    from ljubimac ljub join vlasnik vl on ljub.vlasnik_id = vl.id order by ljub.id asc";
                $result_set = $db->connection->query($upit);

                while ($ljubimac = mysqli_fetch_array($result_set)) :
                ?>
                    <tr>
                        <td><?php echo $ljubimac['id'] ?></td>
                        <td><?php echo $ljubimac['tip'] ?></td>
                        <td><?php echo $ljubimac['rasa'] ?></td>
                        <td><?php echo $ljubimac['ime'] ?></td>
                        <td><?php echo $ljubimac['godine'] ?></td>
                        <td><?php echo $ljubimac['boja'] ?></td>
                        <td><?php echo $ljubimac['imev'] ?></td>
                        <td><?php echo $ljubimac['prezime'] ?></td>
                        <td>
                            <button class="btn btn-info" value="<?php echo $ljubimac['id']; ?>" id="izmeni_dugme">Izmeni</button>
                            <button class="btn btn-danger" value="<?php echo $ljubimac['id']; ?>" id="obrisi_dugme">Obriši</button>
                        </td>
                    </tr>

                <?php
                endwhile;
                ?>
            </tbody>

            <tfoot>
            </tfoot>
        </table>

        <a href="pretragasort.php"><button type="button" class="btn btn-success" id="btn_pretraga_sort">Pretrazi / Sortiraj</button></a>


    </div>

    <div id="forma-izmena" class="collapse">
        <form method="POST" id="forma-izmena-ljubimac">

            <div class="mb-3">
                <label class="form-label">ID: </label>
                <input type="text" class="form-control text-center" name="izmena_id" id="izmena_id">
            </div>

            <div class="mb-3">
                <label class="form-label">Tip ljubimca: </label>
                <input type="text" class="form-control text-center" name="izmena_tip" id="izmena_tip">
            </div>
            <div class="mb-3">
                <label class="form-label">Rasa: </label>
                <input type="text" class="form-control text-center" name="izmena_rasa" id="izmena_rasa">
            </div>
            <div class="mb-3">
                <label class="form-label">Ime: </label>
                <input type="text" class="form-control text-center" name="izmena_ime" id="izmena_ime">
            </div>
            <div class="mb-3">
                <label class="form-label">Godine: </label>
                <input type="number" class="form-control text-center" name="izmena_godine" id="izmena_godine">
            </div>
            <div class="mb-3">
                <label class="form-label">Boja: </label>
                <input type="text" class="form-control text-center" name="izmena_boja" id="izmena_boja">
            </div>
            <div class="mb-3">
                <label class="form-label">Vlasnik: </label>
                <select class="form-select text-center" name="izmena_select-vlasnik" id="select-izmena">

                    <?php

                    $upit = "select * from vlasnik";
                    $result_set = $db->connection->query($upit);

                    while ($vlasnik = mysqli_fetch_array($result_set)) :
                    ?>
                        <option value="<?php echo $vlasnik['id'] ?>"><?php echo $vlasnik['imev'] . " " . $vlasnik['prezime']; ?></option>
                    <?php
                    endwhile;
                    ?>

                </select>
            </div>
            <button type="submit" class="btn btn-info btn-lg" name="izmeni_ljubimca_button">Izmeni</button>
        </form>
    </div>

    <?php

    if (isset($_POST['izmeni_ljubimca_button'])) {
        $id = $_POST['izmena_id'];
        $tip = $_POST['izmena_tip'];
        $rasa = $_POST['izmena_rasa'];
        $ime = $_POST['izmena_ime'];
        $godine = $_POST['izmena_godine'];
        $boja = $_POST['izmena_boja'];
        $vlasnik_id = $_POST['izmena_select-vlasnik'];

        $upit = "update ljubimac set tip='$tip', rasa='$rasa', ime='$ime', godine='$godine', boja='$boja', vlasnik_id='$vlasnik_id' where id=" . $id;

        if ($db->connection->query($upit)) {
            echo 'Uspešno izmenjen ljubimac!';
        } else {
            echo $upit;
        }
    }

    ?>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>