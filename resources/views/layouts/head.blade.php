<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>{{ Session::get('web_name') }}</title>

<!-- Favicon  -->
{{-- <link rel="icon" href="../assets/img/core-img/favicon.ico"> --}}
<link rel="icon" href="{{ URL::asset('assets/img/core-img/logo-icon.png') }}">

<!-- Core Style CSS -->
<link rel="stylesheet" href="../assets/css/core-style.css">
<link rel="stylesheet" href="../assets/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
