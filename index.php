<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Ljubimci i Vlasnici - ITEH Prvi domaći</title>
</head>

<body>

    <h1 id="naslov" class="text-primary text-center">Kućni ljubimci i njihovi vlasnici</h1>

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
            <tbody class="text-center">

                <?php
                include 'db.php';

                $db = new DB();
                $upit = "select ljub.id, ljub.tip, ljub.ime, ljub.rasa, ljub.ime, ljub.godine, ljub.boja, vl.ime, vl.prezime 
                from ljubimac ljub join vlasnik vl on ljub.vlasnik_id = vl.id";
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
                    <td><?php echo $ljubimac['ime'] ?></td>
                    <td><?php echo $ljubimac['prezime'] ?></td>
                    <td>
                        <button class="btn btn-info">Izmeni</button>
                        <button class="btn btn-danger">Obriši</button>
                    </td>
                </tr>

                <?php
                endwhile;
                ?>

            </tbody>

            <tfoot>
            </tfoot>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>