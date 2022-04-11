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
      $api_data = json_decode($data);

      $filtered_data = array_filter($api_data, function ($event) {
         return $event->type === "PushEvent";
      });
      $filtered_data = array_values($filtered_data);

      $last_event = $filtered_data[0];

      $repo_name = $last_event->repo->name; // lidiaCirrone/beijeAcademy
      $repo_name = (strpos($repo_name, $username) !== false) ? str_replace("${username}/", "", $repo_name) : $repo_name;
      // date_default_timezone_set("Europe/Rome");
      $created_at = date("d/m/Y H:i:s", strtotime($last_event->created_at)); // 2022-04-11T16:23:53Z
      $commit_msg = $last_event->payload->commits[0]->message; //ralTool project, style: toast notification for results and errors

      // var_dump($repo_name);
      // var_dump($created_at);
      // var_dump($commit_msg);

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

      <p>Repository: <?php echo $repo_name; ?></p>
      <p>Date: <?php echo $created_at; ?></p>
      <p>Commit msg: <?php echo $commit_msg; ?></p>

<?php
      return ob_get_clean();
   }
}
add_shortcode('github', 'github_shortcode');
