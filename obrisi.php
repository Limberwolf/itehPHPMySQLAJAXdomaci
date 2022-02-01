<?php
    include 'db.php';

    $db = new DB();
    $upit = "delete from ljubimac where id=" . $_POST['id'];
    $db->connection->query($upit);

    $upit2 = "select ljub.id, ljub.tip, ljub.ime, ljub.rasa, ljub.ime, ljub.godine, ljub.boja, vl.ime, vl.prezime 
                    from ljubimac ljub join vlasnik vl on ljub.vlasnik_id = vl.id order by ljub.id asc";

    $result_set = $db->connection->query($upit2);

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
             <button class="btn btn-danger" value="<?php echo $ljubimac['id']; ?>" id="obrisi_dugme">Obriši</button>
         </td>
     </tr>

 <?php
    endwhile;
    ?>