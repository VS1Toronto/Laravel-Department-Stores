<?php
$db_conx = mysqli_connect("leedavidsoncontentmanagementsystem1.com.mysql", "leedavidsoncontentmanagementsystem1_com_nn4mdatabase", "ReclarLaravelApp2Stores", "leedavidsoncontentmanagementsystem1_com_nn4mdatabase");
// Evaluate the connection
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
	exit();
}
$returnValue = "0";
settype($returnValue, "integer"); // $returnValue is now 5   (integer)
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Home Page</title>

        <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}" >
        <link rel="stylesheet" type="text/css" href="{!! asset('css/mainPage.css') !!}" >
        <link rel="stylesheet" type="text/css" href="{!! asset('css/searchBar.css') !!}" >

        <link rel="stylesheet" type="text/css" href="{!! asset('php_additions/php_includes/db_conx.php') !!}" >

        <script src="{!! asset('js/jquery-3.1.0.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/databaseButtonFunctions.js') !!}"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

        </style>

<script type="text/javascript">
	function active(){
		var searchBar = document.getElementById('searchBar');

		if(searchBar.value == 'Search...'){
			searchBar.value = ''
			searchBar.placeholder = 'Search...'
		}
	}
	function inactive(){
		var searchBar = document.getElementById('searchBar');

		if(searchBar.value == ''){
			searchBar.value = 'Search...'
				searchBar.placeholder = ''
		}
	}
</script>

</head>
<body>

<div class="content">
    
        </div>
</body>
</html>