<?php
$db_conx = mysqli_connect("leedavidsoncontentmanagementsystem1.com.mysql", "leedavidsoncontentmanagementsystem1_com_nn4mdatabase", "ReclarLaravelApp2Stores", "leedavidsoncontentmanagementsystem1_com_nn4mdatabase");
// Evaluate the connection
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
	exit();
}
$returnValue;
settype($returnValue, "integer"); // $returnValue is now integer
$search_output = "";
$Stores = "";
?>
<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Debenhams Search</a>
</div>
<!-- Navbar Right -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="pages.home">Home</a></li>
        <li><a href="pages.about">About</a></li>
        <li><a href="pages.contact">Contact</a></li>
        <li><a href="pages.results">Results</a></li>
    <ul class="dropdown-menu" role="menu">

<li><a href="/users/register">Register</a></li>
<li><a href="/users/login">Login</a></li> </ul> </li> </ul> </div> </div> </nav>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- This is the line that sets for mobile devices but it messes some features of this app up so its been commented out -->
        <!--  -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

        <title>Store Phone Numbers Page</title>

        <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}" >
        <link rel="stylesheet" type="text/css" href="{!! asset('css/mainPage.css') !!}" >
        <link rel="stylesheet" type="text/css" href="{!! asset('css/searchBar.css') !!}" >

        <link rel="stylesheet" type="text/css" href="{!! asset('php_additions/php_includes/db_conx.php') !!}" >

        <script src="{!! asset('js/jquery-3.1.0.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/databaseButtonFunctions.js') !!}"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
    <div class="title m-b-md">
        Debenhams Search
    </div>

    <div>
        <table>
            <form action="pages.results" method="GET">
                <input name="searchquery" size="44" maxlength="88"  id="searchBar" placeholder="Search..." value="Search..." autocomplete="off" onMouseDown="active();" onBlur="inactive();" />
                <input type="hidden" name="keyword" value="{{{ csrf_token() }}}" />
                <input id="searchBtn" type="submit"   value="Go!" />
            </form>
        </table>
    </div>


        <div class="links">
            <a href="{{action('PagesController@storeNames')}}">All Stores</a>
            <a href="{{action('PagesController@storeAddresses')}}">Store Addresses</a>
            <a href="{{action('PagesController@storePhoneNumbers')}}">Store Phone Numbers</a>
            <a href="{{action('PagesController@storeSites')}}">All Sites</a>
            <a href="{{action('PagesController@storeCfsFlags')}}">All Cfs Flags</a>
        </div>

                <div id="pageMiddle"><h3><span style="color: #636b6f;">
                    </br>
                    </br>
                        <?php
                            $total = DB::table('stores')->count('id');
                        ?>
                        <div class="title2"><h1>Debenhams Sites Registered     <?php echo $total; ?></h1></div>

                    </br>
                    </br>
                        <div class="title2"><h1>Search Results</h1></div>
                      </br>

											<?php
													error_reporting(E_ALL);
													ini_set('display_errors', '1');

													$search_output = "";

													if(isset($_GET['searchquery']) && $_GET['searchquery'] != ""){

															$searchquery = preg_replace('#[^a-z 0-9?!]#i', '', $_GET['searchquery']);
															$sqlCommand = "SELECT id, address_line_2, address_line_3, city, county, postcode FROM addresses WHERE city LIKE '%$searchquery%' OR county LIKE '%$searchquery%'";
															$query = mysqli_query($db_conx,$sqlCommand);

															$num_rows = mysqli_num_rows($query);
															$search_output .= "<hr />$num_rows results for <strong>$searchquery</strong><hr />$sqlCommand<hr />";


															while($row = mysqli_fetch_array($query)){
																	$id = $row['id'];
																	$address_line_2 = $row['address_line_2'];
																	$address_line_3 = $row['address_line_3'];
																	$city = $row['city'];
																	$county = $row['county'];
																	$postcode = $row['postcode'];

																	echo  '<h3>' . '</br>' . ' ' . $id  . '</br>' . '</br>' . ' ' . $address_line_2 . '</br>' .  ' ' . $address_line_3 . '</br>' .  ' ' .
																																														$city . '</br>' .  ' ' . $county . '</br>' .  ' ' . $postcode .'</p><br />' ;
														}

													}
											?>

                        @if(count($sites) > 1)
                            @foreach($sites as $site)
                                <div class="well">
                                    <small>Store Phone Numbers  {{$site->site}}</small>
                                    <h3>{{$site->phoneNumber}}</h3>
                                </div>
                            @endforeach
                            @else
                                <p>No stores found</p>
                            @endif



                       <?php
                            if($Stores != "")
                            {
                                echo $Stores;
                            }
                        ?>

                    </br>
                </div>
            </div>
        </div>
</body>
</html>
