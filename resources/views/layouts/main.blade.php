<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ClearSettle API Client - @yield('title')</title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel=stylesheet type=text/css href="/assets/bootstrap/css/bootstrap.min.css">
        <link rel=stylesheet type=text/css href="/assets/css/custom.css">
        
        <!--[if lt IE 9]>
            <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <header class="header clearfix">
                <nav>
                  <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a href="<?=route('transaction_report')?>">Transaction Report</a></li>
                    <li role="presentation"><a href="#">About</a></li>
                    <li role="presentation"><a href="#">Contact</a></li>
                  </ul>
                </nav>
                <a href="<?=route('home')?>"><img src="/assets/img/clearsettle_logo.png" id="logo"/></a>
            </header>
            
            <div class="row">
            @yield('content')
            </div>
            
            <footer class="footer">
                &copy; <?=date('Y')?> ClearSettle Client.
            </footer>
        </div>
    
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/js/custom.js"></script>
        @yield('extra_assets')
    </body>
</html>
