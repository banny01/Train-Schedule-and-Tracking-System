<!doctype html>
<html lang="en">
<head>
    <?php

        if(isset($_POST['submit'])){
            $trackID = $_POST['trackID'];
            $train = $_POST['train'];
        }

    ?>
    <meta charset="UTF-8">
    <title><?php echo $train; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maps.google.com/maps/api/js"></script>
    <script src="js/maps.js"></script>
    <script src="js/leaflet-0.7.5/leaflet.js"></script>
    <script src="js/leaflet-plugins/google.js"></script>
    <script src="js/leaflet-plugins/bing.js"></script>
    <link rel="stylesheet" href="js/leaflet-0.7.5/leaflet.css">
    <!-- 
        to change themes, select a theme here:  http://www.bootstrapcdn.com/#bootswatch_tab 
        and then change the word after 3.2.0 in the following link to the new theme name
    -->    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
            
</head>

<body>
    <div class="container-fluid">
        <div>
            <h2><?php echo $train; ?> Live Location</h2>
        </div>
        <div class="row">
            <div class="col-sm-12" id="mapdiv">
                <div id="map-canvas"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" id="selectdiv">
                <select id="routeSelect" tabindex="1" class="routeSelectDark" hidden>
                    <option value="<?php echo $trackID; ?>"></option>
                </select>
            </div>
        </div>
        <div class="row">
            
            <div class="col-sm-3 autorefreshdiv" hidden>
                <input type="button" id="autorefresh" value="Auto Refresh Off" tabindex="3" class="btn btn-primary">
            </div>
            <div class="col-sm-3 refreshdiv">
                <input type="button" id="refresh" value="Refresh" tabindex="4" class="btn btn-primary">
            </div>
            <div class="col-sm-3 viewalldiv" hidden>
                <input type="button" id="viewall" value="View All" tabindex="5" class="btn btn-primary">
            </div>
        </div>
    </div>       
</body>
</html>
    