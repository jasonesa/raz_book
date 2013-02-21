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
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/resource.css">
        
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

<body id="resource_admin">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

<div role="main">
                 <h1>Update your profile</h1>
                    <!-- Start Profile View -->
                    <section class="mainContent">
                        <form  action="<?php echo base_url()?>admin/updateResource" method="post" enctype="multipart/form-data">
                        	 <input type="hidden" name="reservation_id" value="<?php echo $user_id;?>"/>
                            <fieldset>
                                <label>Name:</label>
                                <input type="text" name="name" value="<?php echo $name;?>"/>
                            </fieldset>
                            
                             <fieldset>
                                <label>Email:</label>
                                <input type="text" name="username" value="<?php echo $username;?>">
                            </fieldset>

                            <fieldset>
                                <label>Skype:</label>
                                <input type="text" name="skype" value="<?php echo $skype;?>">
                            </fieldset>

                            <fieldset>
                                <label>aim: </label>
                                <input type="text" name="aim" value="<?php echo $aim;?>">
                            </fieldset>

                            <fieldset>
                                <label>Razorfish email:</label>
                                <input type="text" name="rzf_mail" value="<?php echo $rzf_mail;?>">
                            </fieldset>

                            <fieldset>
                                <label>Skills:</label>
                                <textarea name="skills" columns="50" rows="8"><?php foreach($skills as $skill){
                                        echo $skill->skillname.', ';
                                    }?></textarea>
                            </fieldset>


                            <fieldset>
                                <label>About:</label>
                                <textarea name="description" columns="50" rows="8"><?php echo $description; ?></textarea>
                            </fieldset>
                            <fieldset>
                                <label>Resume:</label>
                                <input type="file" name="resume" value="<?php echo '$resume';?>">
                            </fieldset>


                            <fieldset>
                                <label>Picture:</label>
                                <input type="file" name="pic" value="">
                            </fieldset>


                        
                            <fieldset>
                                <input type="submit" value="Update" class="cta" />
                            </fieldset>
                        </form> 
                    </section>
                        <aside>
                            <figure>
                                <img src="<?php echo $pic; ?>" alt="fredito"/>
                            </figure>
                        </aside>
    </div>
            <!-- Ends Main Container -->
      </body>