<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mail</title>
</head>

<body>
    <h1 class="text-center">Hi, {{ $name }}</h1>
    <h1 class="text-center">Here is your Login Credentials.</h1>
    <h5 class="text-center">Email: {{ $email }}</h5>
    <h5 class="text-center">Password: {{ $password }}</h5>

    <!--bootstrap 5 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
