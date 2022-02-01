<?php

require 'db.php';
require 'Ljubimac.php';

$db = new DB();
$upit = "select * from ljubimac where id=" . $_POST['id'];

$data_set = $db->connection->query($upit);

while ($red = mysqli_fetch_array($data_set)) {
    $ljubimac = new Ljubimac($red['id'], $red['tip'], $red['rasa'], $red['ime'], $red['godine'], $red['boja'], $red['vlasnik_id']);
}

echo json_encode($ljubimac);
