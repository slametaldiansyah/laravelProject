<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titleH')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/')}}/dist/css/adminlte.min.css">
    <style type="text/css">
		body
		{
            background-position-y: bottom;
			background-image:url('assets/dist/img/kantor3.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
		}
        .card
        {
            box-shadow: 0 0 200px rgb(0 0 0 / 2000%), 0 1px 3px rgb(0 0 0 / 2000%);
            background-color:initial;
        }

        .card-primary.card-outline {
            border-top: none;
        }
        .h1
        {
            /* -webkit-text-stroke: 1px rgb(0, 0, 0); */
            text-shadow: -4px 0 rgb(255, 72, 0), 0 2px rgb(253, 38, 38), 3px 0 black, 0 -3px rgb(3, 3, 3);
            color: #0026ff;
            font-size: 52px;
            font-family: sans;
            /* lighting-color: rgb(255, 255, 255); */
            /* box-shadow: 0 0 200px rgb(0 0 0 / 2000%), 0 1px 3px rgb(0 0 0 / 2000%); */

        }
        p
        {
            text-shadow: -1px 0 rgb(255, 72, 0), 0 1px rgb(253, 38, 38), 1px 0 black, 0 -1px rgb(3, 3, 3);
            color: #0026ff;
            font-family: sans;
        }
        .btn-custome
        {
            color: rgb(202, 196, 196);
            background-color: #007bff;
            text-shadow: -1px 0 rgb(255, 72, 0), 0 1px rgb(253, 38, 38), 1px 0 black, 0 -1px rgb(3, 3, 3);
            border-color: #007bff;
            box-shadow: none;
            font-family: sans;
        }



	</style>
</head>
