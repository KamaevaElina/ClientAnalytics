<?php
?>
<!doctype html>
<html lang="en">
<head>
    <script src="./jquery-3.5.1.min.js"></script>
    <script src="load_filter_option.js"></script>
    <script src="get_clients.js"></script>
    <script>
        load_filter_options("CitySelect");
        load_filter_options("NicheSelect");
        load_filter_options("TagSelect");
    </script>

    <title>Clients analytics</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="container-fluid">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="row">
        <form class="col-3" id="FiltersForm">
            <div class="form-group">
                <select class="form-control" id="CitySelect">
                    <option value="">Все города</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="NicheSelect">
                    <option value="">Все ниши</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="TagSelect">
                    <option value="">Все теги</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="SearchButton">Найти</button>
        </form>
        <div class="col-9">
            <div class="d-flex flex-wrap" id="Clients">

            </div>
        </div>
    </div>
    <script>
        let form  = document.getElementById('FiltersForm');
        form.addEventListener('submit', getClients);
    </script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>