<?php

// echo("okk");

require "connection.php";

if (isset($_GET["p"])) {
    $province_id = $_GET["p"];
    // echo($province_id);

    $distirc_rs = Database::search("SELECT * FROM `district` WHERE `province_id`='" . $province_id . "'");
    $distirc_num = $distirc_rs->num_rows;
    

    // echo($distirc_num);

    if ($distirc_num > 0) {


        for ($x = 0; $x < $distirc_num; $x++) {

            $distirc_data = $distirc_rs->fetch_assoc();

?>

            <option value="<?php echo $distirc_data["id"]; ?>"><?php echo $distirc_data["distric_name"]; ?></option>


<?php
        }
        

    }else{


        $distric_rs = Database::search("SELECT * FROM `district`");
        $distric_num = $distric_rs->num_rows;


        for ($x = 0; $x < $distric_num; $x++) {

            $distric_data = $distric_rs->fetch_assoc();
        ?>
            <option value="<?php echo ($distric_data["id"]); ?>"><?php echo ($distric_data["distric_name"]); ?></option>

        <?php
        }


        

    }
}



?>