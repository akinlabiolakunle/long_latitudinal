<?php
/**
 * Created by PhpStorm.
 * User: AKIN
 * Date: 2017-08-15
 * Time: 07:43 PM
 */

   include('../db.php');

    if (!empty($_POST['state_id'])) {

        $query = " SELECT * FROM  locals WHERE state_id = ' " . $_POST['state_id'] . "'";

        $result = mysqli_query($con, $query);

        ?>
        <option value=""> Select Local govt.</option>

        <?php
        foreach ($result as $local) {
            ?>
            <option value="<?php echo $local['local_id']; ?>"> <?php echo $local['local_name'] ?></option>
            <?php
        }

    }
?>
