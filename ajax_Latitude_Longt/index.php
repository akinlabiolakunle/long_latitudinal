<?php
include('db.php');
?>
<html>
<head>
    <title> Depdences</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<script>

    function initialize() {
        var mapProp = {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);



    function getMap(val) {
        $.ajax({
            type: 'POST',
            url: 'ajax/get_map.php',
            data: 'local_id='+val,
            success: function (data){
               $('#map').html(data);
            }
        })

    }

    function getState(val) {
        $.ajax({
            type:'POST',
            url:'ajax/get_state.php',
            data:'state_id='+val,
            success: function (data) {
                    $('#local_list').html(data);
            }
        })
    }

</script>

<body>
<div class="overlay"></div>

<div class="container">
    <div class="row">
        <section>

            <div class="header">
                <h2> Find the the longitude and latitude of your local govt.</h2>
            </div>

            <div id="map"></div>

            <form action="" role="form">
                <p>
                    <label for="select" class="control-label">State:</label><br/>
                    <select name="country"  onChange="getState(this.value);" class="form-control">
                        <option value="">Select State</option>

                        <?php
                        $sql = "SELECT * FROM states";
                        $run = mysqli_query($con,$sql);
//                        while( $row = mysqli_fetch_assoc($run)) {
                            foreach($run as $state) {
                                ?>
                                <option value=" <?php echo $state['state_id']?>"> <?php  echo $state["name"] ?> </option>
                                <?php
//                            }

                        }
                        ?>
                    </select>
                </p>

                <p>
                    <label for="local" class="control-label">Local Govt:</label> <br>
                    <select name="" id="local_list" onchange="getMap(this.value);" class="form-control">

                    </select>

                </p>



            </form>
        </section>

    </div>
</div>


    <script src="jquery.js"></script>
    </body>
</html>