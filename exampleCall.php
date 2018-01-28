<?php
  include_once("<path>/buildHTML.php");
  $login = array("dependencies"   => array("utf8",
                                           "edge",
                                           "viewpoint",
                                           "materialIcons",
                                           "material.blue-deep_purple.min.css",
                                           "material.min.js",
                                           "3.2.1_jquery.min.js",
                                           "RobotoFomt",
                                           "google_api:client.js",
                                           "googleLogin.js",
                                           "googleLogin.css",
                                           "forms.css",
                                           "logo.css"
                                          ),
                 "title"          => "Einloggen",
                 "content"        => "user/assets/login.html",
                 "navigation"     => array( "shortTitle"          => "Login",
                                            "longTitle"           => "Hier einloggen",
                                            "largeScreenLinks"    => array(array("url" => "alzlper.com/1",    "text" => "LLink1"),
                                                                           array("url" => "alzlper.com/2",    "text" => "LLink2"),
                                                                           array("url" => "alzlper.com/3",    "text" => "LLink3")
                                                                          ),
                                            "drawerLinks"         => array(array("url" => "google.com/1",     "text" => "DLink1"),
                                                                           array("url" => "google.com/2",     "text" => "DLink2"),
                                                                           array("url" => "google.com/3",     "text" => "DLink3")
                                                                          ),
                                          )
                 );
  buildHTML::generate($login, "../");
?>
