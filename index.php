<?php
ini_set('error_reporting', 0);

require_once('pujar.php');
require_once('calcul.php');
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>M3 IBC</title>
</head>

<body>
    <h1 class="text-center mt-3">M3 IBC</h1>
    <br />

    <div class="container col-md-6">
        <form enctype="multipart/form-data" action="#" method="POST">
            <div class="form-group">
                <label class="form-label" for="customFile">Pujar fitxer (sol s'accepta csv)</label>
                <input type="file" name="arxiu" class="form-control" />
                <input type="hidden" name="upload" value="1" />
            </div>
            <button type="submit" class="btn btn-primary" id="cerca">Pujar</button>
        </form>
    </div>
    <?php 
    if($error){
        echo '<h5 class="text-danger"><center>Error amb la pujada de fitxers</center></h5>';
    }

    if($generat){
        echo '<h5 class="text-success"><center>S\' generat correctament amb el fitxer pujat</center></h5>';
    } else {
        echo '<h5 class=""><center>Auto generat amb el fitxer proporcionat</center></h5>';
    }
    ?>
    

    <div class="container col-md-6 mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Comarca</th>
                    <th scope="col">Nombre famílies professionals</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($retorn as $comarca => $families_prof) {
                    echo "<tr>";
                    echo "<td>" . $comarca . "</td>";
                    echo "<td>" . sizeof($families_prof) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3">
            <a class="text-dark" href="https://www.ciber.cat">David Torrell Román</a>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>