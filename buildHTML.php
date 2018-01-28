<?php 

    class buildHTML {

        private static $meta;
        private static $root;
        
        public static function setVars($root) {
            self::$root = $root;
            self::$meta = array(   
                'utf8'                                  => '<meta charset="UTF-8">',
                'edge'                                  => '<meta http-equiv="X-UA-Compatible" content="ie=edge">',
                'viewpoint'                             => '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
                'materialIcons'                         => '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">',
                'material.blue-deep_purple.min.css'     => '<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-deep_purple.min.css" />',
                'material.min.js'                       => '<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>',
                '3.2.1_jquery.min.js'                   => '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>',
                'RobotoFomt'                            => '<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">',
                'google_api:client.js'                  => '<script src="https://apis.google.com/js/api:client.js"></script>',
                'googleLogin.js'                        => '<script src="'.self::$root.'assets/js/googleLogin.js"></script>',
                'googleLogin.css'                       => '<link rel="stylesheet" href="'.self::$root.'assets/css/googleLogin.css" />',
                'forms.css'                             => '<link rel="stylesheet" href="'.self::$root.'assets/css/forms.css" />',
                'logo.css'                              => '<link rel="stylesheet" href="'.self::$root.'assets/css/logo.css" />',
                'login.js'                              => '<script src="'.self::$root.'assets/js/login.js"></script>'
            );
        }
        
        public static function generate($page, $root = "./") {
        
            self::setVars($root);
?>
            <html>
                <head>
                    <?php
                        foreach ($page["dependencies"] as $element) {
                            echo self::$meta[$element].PHP_EOL;
                        }
                        echo '<title>'.$page["title"].'</title>';
                    ?>
                </head>
                <body>
                    <!-- Always shows a header, even in smaller screens. -->
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                      <header class="mdl-layout__header">
                        <div class="mdl-layout__header-row">
                          <!-- Title -->
                          <span class="mdl-layout-title"><?php echo $page["navigation"]["longTitle"]; ?></span>
                          <!-- Add spacer, to align navigation to the right -->
                          <div class="mdl-layout-spacer"></div>
                          <!-- Navigation. We hide it in small screens. -->
                          <nav class="mdl-navigation mdl-layout--large-screen-only">
                              <?php
                                foreach($page["navigation"]["largeScreenLinks"] as $link) {
                                    echo '<a class="mdl-navigation__link" href="'.$link["url"].'">'.$link["text"].'</a>';
                                }
                              ?>
                          </nav>
                        </div>
                      </header>
                      <div class="mdl-layout__drawer">
                        <span class="mdl-layout-title"><?php echo $page["navigation"]["shortTitle"]; ?></span>
                        <nav class="mdl-navigation">
                            <?php
                                foreach($page["navigation"]["drawerLinks"] as $link) {
                                    echo '<a class="mdl-navigation__link" href="'.$link["url"].'">'.$link["text"].'</a>';
                                }
                            ?>
                        </nav>
                      </div>
                      <main class="mdl-layout__content">
                        <div class="page-content">
                            <?php
                                include_once(self::$root.$page["content"]);
                            ?>
                        </div>
                      </main>
                    </div>
                </body>
            </html>
<?php

        }

    }

?>
