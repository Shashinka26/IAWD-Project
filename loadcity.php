<?php

// echo("plll");


require "connection.php";

if (isset($_GET["d"])) {
    $distirc = $_GET["d"];
    // echo($province_id);

    $city_rs = Database::search("SELECT * FROM `city` WHERE `district_id`='" . $distirc . "'");
    $city_num = $city_rs->num_rows;


    // echo($city_num);

    if ($city_num > 0) {


        for ($x = 0; $x < $city_num; $x++) {

            $city_data = $city_rs->fetch_assoc();

?>

            <option value="<?php echo $city_data["id"]; ?>"><?php echo $city_data["city_name"]; ?></option>


        <?php
        }
    } else {


        $city_rs = Database::search("SELECT * FROM `city`");
        $city_num = $city_rs->num_rows;



        for ($x = 0; $x < $city_num; $x++) {

            $city_data = $city_rs->fetch_assoc();
        ?>
            <option value="<?php echo ($city_data["id"]); ?>"><?php echo ($city_data["city_name"]); ?></option>

<?php
        }
    }
}



?>