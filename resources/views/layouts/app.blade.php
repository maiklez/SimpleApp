<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
	
	{!! Html::favicon('favicon.ico') !!}
	
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700|Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic|Bangers|Ubuntu+Mono" rel='stylesheet' type='text/css'>
	
	
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    
    <!-- JavaScripts -->
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- analytics -->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-76209494-1', 'auto');
	  ga('send', 'pageview');

	</script>
    
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <link href="https://cdn.rawgit.com/google/code-prettify/master/styles/sons-of-obsidian.css" rel="stylesheet">
    
    @yield('scripts')
    
</head>
<body id="app-layout">
    
    @include('partials.navbar')

    @yield('content')
	
	
	

<div id="footer">
    <div class="container">
        <p class="text-muted credit"><span style="text-align: left; float: left">&copy; 2016 <a href="">MAik.rocks</a></span> 
        <span class="hidden-phone" style="text-align: right; float: right">Powered by: <a
                        href="http://maik.rocks/" alt="MAik.rocks">MAik</a></span></p>
		
    </div>
    
</div>

    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
</body>
</html>
