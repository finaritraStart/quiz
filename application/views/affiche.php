<!DOCTYPE html>
<html>
    <head>
        <title>CRUD codeigniter 3 - belajarphp.net</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <table class="table table-bordered">
            <tr><th>reponse</th><th>id_question</th><th>statut</th><th colspan="2">e</th></tr>
            <?php
            foreach ($reponses->result() as $reponse) {
           
            echo "<tr>
            <td>$reponse->reponse</td>
            <td>$reponse->id_question</td>
            <td>$statut</td>
            <td></td>
            </tr>";
            }
            ?>
        </table>
    </body>
</html>