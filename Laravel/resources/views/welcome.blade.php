<?php
$userlist="Hello";
?>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('style.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('../php_additions/js/main.js') }}"></script>

		    <link rel="stylesheet" href="C:\xampp\htdocs\Code|Laravel\php_additions\style\style.css">
		    <link rel="stylesheet" href="../../php_additions/php_includes">
        <link rel="stylesheet" href="../../php_additions/php_includes">
		    <script src="../../php_additionsjs/main.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <style>
        #searchBar
        {
        	border: 1px solid #000000;
        	border-right: none;
        	margin-top: -8px;
        	margin-right: 0px;
        	font-size: 16px;
        	padding: 8px;
        	outlining:none;
        	width: 250px;
        	-webkit-border-top-left-radius: 10px;
        	-webkit-border-bottom-left-radius: 10px;
        	-moz-border-radius-topleft: 10px;
        	-moz-border-radius-bottomleft: 10px;
        	border-top-left-radius: 10px;
        	border-bottom-left-radius: 10px;
        }

        #searchBtn
        {
        	border: 1px solid #000000;
        	font-size: 16px;
        	margin-top: -8px;
        	margin-right: 0px;
        	padding: 8px;
        	background: #8F8F8F;
        	font-weight: bold;
        	cursor: pointer;
        	outline: none;
        	-webkit-border-top-right-radius: 10px;
        	-webkit-border-bottom-right-radius: 10px;
        	-moz-border-radius-topright: 10px;
        	-moz-border-radius-bottomright: 10px;
        	border-top-right-radius: 10px;
        	border-bottom-right-radius: 10px;
        }

        #searchBtn:hover
        {
         border:1px solid #74bf36;
         background-color: #8ed058; background-image: -webkit-gradient(linear, left top, left bottom, from(#8ed058), to(#7bb64b));
         background-image: -webkit-linear-gradient(top, #8ed058, #7bb64b);
         background-image: -moz-linear-gradient(top, #8ed058, #7bb64b);
         background-image: -ms-linear-gradient(top, #8ed058, #7bb64b);
         background-image: -o-linear-gradient(top, #8ed058, #7bb64b);
         background-image: linear-gradient(to bottom, #8ed058, #7bb64b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#8ed058, endColorstr=#1bb64b);
        }
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



	<div id="pageLeft">

	<div id="search_container" width="400" height="400">

	<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$search_output = "";

	if(isset($_GET['searchquery']) && $_GET['searchquery'] != ""){

	$searchquery = preg_replace('#[^a-z 0-9?!]#i', '', $_GET['searchquery']);
    $sqlCommand="SELECT id, username, country, avatar FROM users WHERE username LIKE '%$searchquery%' OR country LIKE '%$searchquery%'";
    $query = mysqli_query($db_conx,$sqlCommand);

    $num_rows = mysqli_num_rows($query);
	$search_output .= "<hr />$num_rows results for <strong>$searchquery</strong><hr />$sqlCommand<hr />";


    while($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $username = $row['username'];
        $country = $row['country'];
        $u=$row["username"];
	    $avatar = $row["avatar"];
	    if($avatar){
            $profile_pic = 'user/'.$u.'/'.$avatar;
	    }
	    else{
            $profile_pic = 'images/avatardefault.png';
	    }
	    $search_output ='<a id= search_results href="user.php?u='.$u.'" title="'.$u.'"><img src="'.$profile_pic.'" alt="'.$u.'" style="width: 100px; height: 100px;"margin: 10px;"></a><a target="_blank"><img src="images/spacing_cube.png" alt="spacing_cube" width="10" height="10"></a>';

        echo  '<h3>' . $search_output  . '</br>' . '</br>' . ' ' . $id . '</br>' . '</br>' . ' ' . $username . '</br>' .  ' ' . $country .'</p><br />' ;
	}

	}
	?>
	</div>
	</div>



        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Debenhams Search
                </div>

				<div id="one">
				</div>

				<div id="two">
				</div>

				<div id="three">
				</div>

				<div id="four">
				</div>

				<div id="five">
				</div>

        <form action="pages.results" method="post">
            <input name="pages.results" size="44" maxlength="88"  id="searchBar" placeholder="Search..." value="Search..." autocomplete="off" onMouseDown="active();" onBlur="inactive();" />
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			      <input id="searchBtn" type="submit"   value="Go!" />
        </form>

				<?php
					echo $userlist;
				?>



                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
