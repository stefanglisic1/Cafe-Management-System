<?php

require 'dbcon.php';
include 'header.php';
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
            border-collapse:collapse;
            width: 95%;
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
    <hr style="margin:0px auto" >
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <input id="myInput" class="form-control mr-sm-2" type="search" placeholder="Pretraži.."
                    aria-label="Search">

            </form>
            <button onclick="window.location='adminpage.php';" id="nazad" type="submit" name=""
                class="btn btn-danger btn-sm">Zavrsi narudžbinu</button>
        </div>
    </nav>
    <?php include('message.php'); ?>

    <br><br>

    <table style="margin-left: auto;
  margin-right: auto;">
        <thead>
            <tr>
               
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
                        <td style="width:38px">


                            <form action="pretragacode.php" method="POST" class="d-inline">
                            <input type="hidden" name="stanje" value="<?= $kafic['stanje']; ?>">
                                <input type="hidden" name="kafic_id" value="<?= $kafic['id']; ?>">
                                <div class="text-center">
                                <button type="submit" name="naruci" value="<?= $kafic['id']; ?>"
                                    class="btn btn-success btn-sm text" style="width:100%">Dodaj</button></div> 
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