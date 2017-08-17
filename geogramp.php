<?php
    if(!empty($_GET['location'])){
        $maps_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($_GET['location']);
        $maps_json = file_get_contents($maps_url);
        $maps_array = json_decode($maps_json, true);
        $lat = $maps_array['results'][0]['geometry']['location']['lat'];
        $long = $maps_array['results'][0]['geometry']['location']['lng'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Geogramp</title>
    </head>
    <body>
        <form action="">
            <input type="text" name="location" placeholder="Enter City">
            <button type="submit">Submit</button>
        </form>
        <?php
            if(isset($lat) && isset($long)){
                echo "The coordinates for " . $_GET['location'] . " are:<br>";
                echo "Latitude: " . $lat . "<br>";
                echo "Longitude: " . $long;
            }
        ?>
    </body>
</html>
