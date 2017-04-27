<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sistem Informasi Perpustakaan</title>

        <!-- Bootstrap -->
        <link href="AppBundle/statics/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Anggota</a></li>
                    <li><a href="#">Buku</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <div class="starter-template">
                    <?= $content; ?>
            </div>

        </div><!-- /.container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="AppBundle/statics/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="AppBundle/statics/js/bootstrap.min.js"></script>
    </body>
</html>