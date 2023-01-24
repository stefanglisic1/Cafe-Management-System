<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        #myInput {
            margin: auto 30px;
        }

        nav {
            display: flex;
            justify-content: space-between;
        }

        #nazad {
            position: absolute;
            left: 90%;
        }
    </style>
   
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <input id="myInput" class="form-control mr-sm-2" type="search" placeholder="Pretraži.."
                    aria-label="Search">

            </form>
            <button onclick="parent.location.reload();" id="nazad" type="submit" name="" class="btn btn-danger btn-sm">Zavrsi narudžbinu</button>
        </div>
    </nav>
    <?php include('message.php'); ?>

    <br><br>

    <table>
        <thead>
            <tr>
                <th style="visibility: hidden ;"></th>
                <th>Naziv</th>
                <th>Vrsta</th>
                <th>Stanje </th>
                <th>Cena (din)</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php
            $query = "SELECT * FROM kafic";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $kafic) {
            ?>
            <tr>
                <td style="visibility: hidden;"> <input type="hidden" name="kafic_id" value="<?= $kafic['id']; ?>"></td>
                <td>
                    <?= $kafic['naziv']; ?>
                </td>
                <td>
                    <?= $kafic['vrsta']; ?>
                </td>
                <td name="stanje">
                    <?= $kafic['stanje']; ?>
                </td>
                <td>
                    <?= $kafic['cena']; ?>
                </td>
                <td>


                    <form action="pretragacode.php" method="POST" class="d-inline">
                        <button type="submit"  name="naruci" value="<?= $prijava['id']; ?>"
                            class="btn btn-success btn-sm">Naruči</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<h5> No Record Found </h5>";
            }
            ?>
        </tbody>
    </table>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>