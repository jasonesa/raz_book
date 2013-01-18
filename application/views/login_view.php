<!DOCTYPE html>
<html lang="en">
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">

        <link rel="shortcut icon" href="images/icons/favicon.ico">
        <link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-114x114.png">
        
        <link rel="apple-touch-icon-precomposed" href="images/icons/apple-touch-icon-precomposed.png"/>
        <script src="js/libs/modernizr-2.6.1-respond-1.1.0.min.js"></script>
        <script type="text/javascript">
        (function(doc) {

            var addEvent = 'addEventListener',
                type = 'gesturestart',
                qsa = 'querySelectorAll',
                scales = [1, 1],
                meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

            function fix() {
                meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
                doc.removeEventListener(type, fix, true);
            }

            if ((meta = meta[meta.length - 1]) && addEvent in doc) {
                fix();
                scales = [.25, 1.6];
                doc[addEvent](type, fix, true);
            }

        }(document));
        </script>
    </head>
<body>




<body id="loginPage">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div id="wrapper">
            <!-- Start Header -->
            <header>
                <a href="#" class="logo">Bosz<span>Book</span></a>
            </header>
            <!-- Ends Header -->
            <!-- Starts Main Container -->
            <div role="main">
                <h1>Login</h1>
                <?php echo form_open('auth',array('id' => 'systemLogin'));?>
                	<input name="username" type="text"  placeholder="Username"/>
                    <input name="password" type="password" value="" placeholder="Password"/>
                    <input type="submit" name="" value="Login">
                    <a class="remaindPass" href="#">Can't access your account?</a>
                </form>
            </div>
            <!-- Ends Main Container -->
            <!-- Starts Footer -->
            <footer>
                <ul>
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Bug/feature request</a></li>
                    <li><a href="#">Request Support</a></li>
                    <li><a href="#">Help/Documentation</a></li>     
                </ul>
                <p>powered by <a href="#">Bosz Digital</a></p>
            </footer>
            <!-- Ends Footer -->
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.0.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            
        </script>
    </body>
</html>