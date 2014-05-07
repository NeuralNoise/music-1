<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/ico" href="/assets/img/favicon.ico"/>
    
	<title>{{{ Poem::orderBy(DB::raw('rand()'))->pluck('content') }}}</title>

	<?= stylesheet_link_tag() ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<?= javascript_include_tag() ?>
</head>
<body>
<div class="container">
	<div id="top-header">
		<ul class="nav nav-pills">
            <li class="{{{ $page == 'home' ? 'active' : ''}}}"><a data-remote="true" href="/home">Home</a></li>
            <li class="{{{ $page == 'artists' ? 'active' : ''}}}"><a data-remote="true" href="/artists">Artists</a></li>
            <li class="{{{ $page == 'albums' ? 'active' : ''}}}"><a data-remote="true" href="/albums">Albums</a></li>
            <li class="{{{ $page == 'songs' ? 'active' : ''}}}"><a data-remote="true" href="/songs">Songs</a></li>

            @if ( !Auth::check() )
            	<li class="pull-right {{{ $page == 'users' ? 'active' : ''}}}"><a data-remote="true" href="/signin">Sign In</a></li>
            @else
            	<li class="pull-right dropdown {{{ $page == 'users' ? 'active' : ''}}}">
	            	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
	            	    {{{ Auth::user()->username }}} <span class="caret"></span>
	            	</a>
	            	<ul class="dropdown-menu">
	            		<li class="divider"></li>
	            		<li><a data-remote="true" href="/users/{{{ Auth::user()->id }}}/edit">Change Username</a></li>
	            		<li><a data-remote="true" href="/signout">Sign Out</a></li>
	            	</ul>
            	</li>
            @endif

            
        </ul>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-3">
		    <div id="player">
		    	@include('player')
		    </div>
		</div>
		<div class="col-xs-12 col-md-8">
		    <div id="main">
		    	@yield('main')
		    </div>
		</div>
	</div>
</div>
@include('top')
</body>
</html>

