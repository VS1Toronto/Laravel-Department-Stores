<html>
<head>
    <title> @yield('title') </title>
      
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?fami\ ly=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?fam\ ily=Material+Icons">
      
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/boots\ trap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.\ css">
    <link rel="stylesheet" type="text/css" href="/css/ripples.min.css">
    
    <!-- JQuery -->
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
@include('navbar')
@yield('content')
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\ "></script>
    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>

    <script>
        $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
        });
    </script>
</body>
</html>
