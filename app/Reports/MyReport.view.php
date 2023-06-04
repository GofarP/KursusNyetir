<?php
use \koolreport\widgets\koolphp\Table;
?>
<html>
    <head>
    <title>Laporan Mobil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    </head>
    <body>
        <h1 class="text-center mt-3">Laporan Mobil CV.Sumber Rezeki</h1>
        <h3 class="text-center">Kursus Mengemudi</h2>
        <p class="text-center">Jl.ir Sutami No.5A/TANJAKAN PERLA Telp. (0771) 27579 Tanjungpinang</p>
        <p class="text-center">Hp. 0812 774 7700 -0812 75009199 e-mail:sumberrezeki999@yahoo.com</p>
        <?php

        Table::create([
            "dataSource"=>$this->dataStore("mobil")
        ]);
        ?>
    </body>
</html>
