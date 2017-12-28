<?php
/**
 * Created by PhpStorm.
 * User: AKIN
 * Date: 2017-08-16
 * Time: 07:45 PM
 */
include('../db.php');
if (!empty($_POST['local_id'])){

$query = " SELECT  * FROM locals WHERE local_id =' " . $_POST['local_id'] . " ' ";

$run = mysqli_query($con, $query);

foreach ($run as $map){ ?>
    <h3> This is the Geolocation Longitude and Latitude of your Area... (<?php
            echo $map['local_name']
        ?> Local Govt. Area)</h3>
    <h3 class="map"> The Latitude is:  <?php echo $map['LAT']?></h3>
    <h3 class="map"> The  Longitude is: <?php echo $map['LON']?></h3>


    <?php



}















}
?>