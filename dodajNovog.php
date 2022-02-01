<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Strana za dodavanje novog ljubimca</title>
</head>

<body>

    <form method="POST" id="forma-novi-ljubimac">
        <div class="mb-3">
            <label class="form-label">Tip ljubimca: </label>
            <input type="text" class="form-control text-center" name="tip">
        </div>
        <div class="mb-3">
            <label class="form-label">Rasa: </label>
            <input type="text" class="form-control text-center" name="rasa">
        </div>
        <div class="mb-3">
            <label class="form-label">Ime: </label>
            <input type="text" class="form-control text-center" name="ime">
        </div>
        <div class="mb-3">
            <label class="form-label">Godine: </label>
            <input type="number" class="form-control text-center" name="godine">
        </div>
        <div class="mb-3">
            <label class="form-label">Boja: </label>
            <input type="text" class="form-control text-center" name="boja">
        </div>
        <div class="mb-3">
            <label class="form-label">Vlasnik: </label>
            <select class="form-select text-center" name="select-vlasnik">

                <?php
                require 'db.php';

                $db = new DB();
                $upit = "select * from vlasnik";
                $result_set = $db->connection->query($upit);

                while ($vlasnik = mysqli_fetch_array($result_set)) :
                ?>
                    <option value="<?php echo $vlasnik['id'] ?>"><?php echo $vlasnik['ime'] . " " . $vlasnik['prezime']; ?></option>
                <?php
                endwhile;
                ?>

            </select>
        </div>
        <button type="submit" class="btn btn-lg btn-success mt-2" name="dodaj_ljubimca_btn">Submit</button>
    </form>


    <?php
    require 'Ljubimac.php';

    if (isset($_POST["dodaj_ljubimca_btn"])) {
        $ljubimac = new Ljubimac(NULL, $_POST['tip'], $_POST['rasa'], $_POST['ime'], $_POST['godine'], $_POST['boja'], $_POST['select-vlasnik']);
        if ($ljubimac->dodajNovog($ljubimac)) {
            echo 'Ljubimac uspešno dodat!';
        } else {
            echo 'Doslo je do greške! Ljubimac nije sačuvan!';
        }
    }
    ?>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>