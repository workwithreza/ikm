<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survei</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('Bootstrap/TableCSS/js/jquery.min.js') }}"></script>
    <style>
        .row{
            margin-top: 20px;
        }
    </style>
    @livewireStyles
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <h1>Survei</h1><hr>
                @livewire('multi-step-form')
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>
