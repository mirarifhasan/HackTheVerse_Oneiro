<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Add a default marker</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibWlyYXJpZmhhc2FuIiwiYSI6ImNrNW1xNXpvbTEyZGsza28wamdvNDdtcngifQ.Sgf8Pt0ig7HpCXcfNJMMYg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [90.426679, 23.741549],
            zoom: 13
        });
        <?php
        include 'zzz-dbConnect.php';

        $sql = 'SELECT lng, lat FROM patient';

        $res1 = mysqli_query($link, $sql);
        while ($row1 = mysqli_fetch_assoc($res1)) {
        ?>
            var marker = new mapboxgl.Marker()
                .setLngLat([<?php echo $row1['lng'] ?>, <?php echo $row1['lat'] ?>])
                .addTo(map);

        <?php } ?>
    </script>
</body>

</html>