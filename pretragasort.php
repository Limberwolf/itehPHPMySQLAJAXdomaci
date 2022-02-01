<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Pretraga/Sortiranje Ljubimaca</title>
</head>

<body>

    <h1 id="sort-naslov">Pretraga / Sortiranje </h1>
    <div id="sort-div">
        <table id="ljubimci-table" class="hover order-column row-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tip</th>
                    <th>Rasa</th>
                    <th>Ime</th>
                    <th>Godine</th>
                    <th>Boja</th>
                    <th>Ime Vlasnika</th>
                    <th>Prezime vlasnika</th>
                </tr>
            </thead>
            <tbody id="sadrzaj">

                <?php
                require 'db.php';

                $db = new DB();
                $upit = "select ljub.id, ljub.tip, ljub.ime, ljub.rasa, ljub.boja, ljub.godine, ljub.boja, vl.imev, vl.prezime 
                    from ljubimac ljub join vlasnik vl on ljub.vlasnik_id = vl.id order by ljub.id asc";

                $rezultat = $db->connection->query($upit);

                while ($ljubimac = mysqli_fetch_array($rezultat)) :
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

                    </tr>

                <?php
                endwhile;
                ?>


            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>

</html>