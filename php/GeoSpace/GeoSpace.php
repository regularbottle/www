<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Stylesheet -->
    <link href="../../php/GeoSpace/style.css" rel="stylesheet" type="text/css">
    <!-- Include -->

    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet">
    <title>Geo Space</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-3">
        <section class="col-12 col-md-5 col-sm text-center">
            <label class="control-label" for="inputTextCity"></label>
            <input type="text" name="inputTextCity" id="inputTextCity">
            <p>Town Name</p>
            <p>Latitudine: </p>
            <p>Longitudine: </p>
            <?php
            include './cityList.php';
            include '../libreria.php';
            $cities = new CityList();
            print_as_table_Cities($cities->getCityList()); ?>
        </section>
        <section class="col-12 col-md-2 col-sm text-center">
            <input class="btn btn-primary" type="button" value="Calcola Distanza" onclick="calculateDistance()">
            <p>Distanza Lossodromica</p>
            <p id="distanzaLossodromica">88,02Km </p>
            <p>Distanza Ortodromica</p>
            <p>98,02Km </p>
        </section>
        <section class="col-12 col-md-5 col-sm text-center">
            <label class="control-label" for="inputTextCityRight"></label>
            <input type="text" name="inputTextCity" id="inputTextCityRight">
            <p>Town Name</p>
            <p>Latitudine: </p>
            <p>Longitudine: </p>
            <?php
            $cities = new CityList();
            print_as_table_Cities($cities->getCityList()); ?>
        </section>
    </div>
</div>
<!-- JavaScript -->
<script>
    function calculateDistance() {
        document.getElementById("distanzaLossodromica").innerHTML = (40 + 34) + "Km";
    }
</script>
<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>