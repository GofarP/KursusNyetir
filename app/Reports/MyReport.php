<?php
namespace App\Reports;
class MyReport extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    use \koolreport\bootstrap4\Theme;
    // By adding above statement, you have claim the friendship between two frameworks
    // As a result, this report will be able to accessed all databases of Laravel
    // There are no need to define the settings() function anymore
    // while you can do so if you have other datasources rather than those
    // defined in Laravel.
    function setup () {
        // Let say, you have "sale_database" is defined in Laravel's database settings.
        // Now you can use that database without any futher setitngs.


        //Laporan semua data mobil
        $this->src("mysql") // use any of your preferred connection type in config/database.php
        ->query("SELECT * FROM mobil")
        ->pipe(new \koolreport\processes\Map(array(
            "{value}" => function($row) {
                $row["foto"]="<img width='100' src='../../storage/".$row["foto"]."'/>";
                return $row;
            }
        )))
        ->pipe($this->dataStore("mobil"));




        //Laporan semua data pelatih
        $this->src("mysql") // use any of your preferred connection type in config/database.php
        ->query("SELECT * FROM pelatih")
        ->pipe(new \koolreport\processes\Map(array(
            "{value}" => function($row) {
                $row["foto"]="<img width='100' src='../../storage/".$row["foto"]."'/>";
                return $row;
            }
        )))
        ->pipe($this->dataStore("pelatih"));



        //Laporan semua data peserta
        $this->src("mysql") // use any of your preferred connection type in config/database.php
        ->query("SELECT * FROM peserta")
        ->pipe(new \koolreport\processes\Map(array(
            "{value}" => function($row) {
                $row["foto"]="<img width='100' src='../../storage/".$row["foto"]."'/>";
                return $row;
            }
        )))
        ->pipe($this->dataStore("peserta"));

    }
}

?>
