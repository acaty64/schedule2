<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title','default')</title>
	<!--link href="css/estilos_pdf.css" rel="stylesheet" type="text/css" -->
	{{-- <link rel="stylesheet" href="{{ asset('css\estilos_pdf.css') }}"> --}}
	<link href="{{ asset('css\estilos_pdf.css') }}" rel="stylesheet">
	{{-- <link href="{{ asset('css\app.css') }}" rel="stylesheet" type="text/css" media="all" > --}}
</head>
<body class='body'>
	<div class='titulo'>@yield('title')</div>
	<hr style='color:blue'>
	{{-- <div class='contenido'> --}}
		@yield('content')
	{{-- </div> --}}
	<footer class='footer'>
		@yield('PDF.layouts.footer_PDF')
	</footer>
	@yield('style')
</body>
</html>
