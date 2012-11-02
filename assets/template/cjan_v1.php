<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CJAN | {title_for_layout}</title>
    <meta name="description" content="Comprehensive Java Archive Network">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="{base_url}assets/css/bootstrap.css" rel="stylesheet">
    <link href="{base_url}assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="{base_url}assets/css/cjan.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-30878265-1']);
      _gaq.push(['_setDomainName', 'cjan.org']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
</head>

<body class='home'>
    <header id='header'>
        <div class='container'>
            <div class='row'>
                <div class='span12'>
                    <h1><a href='{base_url}' title='Home'>CJAN</a></h1>
                    <h2 class=''>Comprehensive Java Archive Network</h2>
                </div>
            </div>
        </div>
    </header>
    <section id='menu'>
        <div class='container'>
            <div class='row'>
                <div class='span12'>
                    
                </div>
            </div>
        </div>
    </section>
    <section id='main'>
        <div class='container'>
            <div class='row'>
                {content_for_layout}
            </div>
        </div>
    </section>
    <footer>
        <div class='container'>
            <div class='row'>
                <div class='span12 right'>
                    <p><a href="http://www.tupilabs.com" title="TupiLabs"><small>TupiLabs &copy; 2011-2012 </small><img src="{base_url}assets/img/tupilabs_badget-32x32.png" width="24px" title="TupiLabs" /></a></p>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="{base_url}assets/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="{base_url}assets/js/cjan.js"></script>
</body>
</html>