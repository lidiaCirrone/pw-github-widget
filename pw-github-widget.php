<?php

/*
Plugin Name: GitHub Widget
Plugin URI: http://polyglotwannabe.com/
Description: A small plugin to display a widget that retrieves data from my GitHub account
Version: 1.0
Author: Lidia Cirrone
Author URI: http://polyglotwannabe.com/
*/

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly
}




if (!function_exists('github_shortcode')) {
   function github_shortcode($attributes)
   {
      include "connect.php";
      $github_user = json_decode($data);
      
      // var_dump($data);
      /* {
         "id": "21226830416",
         "type": "PushEvent",
         "actor": {
            "id": 9954412,
            "login": "lidiaCirrone",
            "display_login": "lidiaCirrone",
            "gravatar_id": "",
            "url": "https://api.github.com/users/lidiaCirrone",
            "avatar_url": "https://avatars.githubusercontent.com/u/9954412?"
         },
         "repo": {
            "id": 479056711,
            "name": "lidiaCirrone/beijeAcademy",
            "url": "https://api.github.com/repos/lidiaCirrone/beijeAcademy"
         },
         "payload": {
            "push_id": 9596314166,
            "size": 1,
            "distinct_size": 1,
            "ref": "refs/heads/master",
            "head": "9a846c27e8fcdbbbce3c9b68cb97c7725ee0973b",
            "before": "8506972a121b3e1a55283712b1d7db3a41357782",
            "commits": [
               {
                  "sha": "9a846c27e8fcdbbbce3c9b68cb97c7725ee0973b",
                  "author": {
                     "email": "lidia.cirrone@gmail.com",
                     "name": "Laptop"
                  },
                  "message": "ralTool project, style: toast notification for results and errors",
                  "distinct": true,
                  "url": "https://api.github.com/repos/lidiaCirrone/beijeAcademy/commits/9a846c27e8fcdbbbce3c9b68cb97c7725ee0973b"
               }
            ]
         },
         "public": true,
         "created_at": "2022-04-11T16:23:53Z"
      } */

      ob_start();
?>
      bla bla bla duo
<?php
      return ob_get_clean();
   }
}
add_shortcode('github', 'github_shortcode');