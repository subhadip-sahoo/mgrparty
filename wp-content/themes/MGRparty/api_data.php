<?php
require_once ABSPATH."/wp-content/themes/MGRparty/src/facebook.php";
require_once ABSPATH."/wp-content/themes/MGRparty/includes/tweet.php";
 $api_data = array();
 $config = array();
 $config['appId'] = '517688961686077';
 $config['secret'] = '9ea57c9f50de129ae7ca04bd85bd39c8';
 $fb = new Facebook($config);
 $accesstoken = $fb->getAccessToken();
 $page_id = '717610128257921';
//echo 'https://graph.facebook.com/' . $page_id . '/feed?access_token=' . $accesstoken."</br>";
//Get the JSON
 $url = 'https://graph.facebook.com/'. $page_id.'/feed?access_token='.$accesstoken;
 $c = curl_init($url);
 curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
//don't verify SSL (required for some servers)
 curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);			
//get data from facebook and decode JSON
 $page = json_decode(curl_exec($c));
//close the connection
 curl_close($c);
//Interpret data
 foreach ($page->data as $post_feed ){
 if($post_feed->from->id == $page_id){
 if(isset($post_feed->story)){
 continue;
 }
 $fb_data = array(
 'icon' => 'facebook',
 'name' => $post_feed->name,
 'screen_name' => '',
 'description' => ($post_feed->description == '')?substr($post_feed->message, 0, 160):substr($post_feed->description, 0, 160),
 'link' => $post_feed->link,
 'date' => date("M d, Y  h:ia", strtotime($post_feed->created_time))
 );
 array_push($api_data, $fb_data);
 }
 }
 $settings = array(
 'oauth_access_token' => "145647403-5NFZq8AH7Z5yXHbfX3vhYLAWEXDFBOMnGv9y6EPK",
 'oauth_access_token_secret' => "mHqdrh8s9DprIOj5kCbzUa6JmoB7NYxj523U04GCMOBmT",
 'consumer_key' => "obXMDm1j7Inklk9IXamhg",
 'consumer_secret' => "nN7ZcNITYi5eZoGiHcGVvZuxc5DipwLPAPYhrZMq16A"
 );
 $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
 $getfield = '?screen_name=bubai13&count=5';
 $requestMethod = 'GET';
 $twitter = new TwitterAPIExchange($settings);
 $store = $twitter->setGetfield($getfield)
 ->buildOauth($url, $requestMethod)
 ->performRequest();
 $result = json_decode($store);
 $multi_array = objectToArray($result);
//echo '<pre>'; print_r($multi_array); echo '</pre>';
 foreach($multi_array as $key => $value ){
 $name = $value["user"]["name"];
 $screen_name = $value["user"]["screen_name"];
 $txt= str_replace($value["entities"]["media"]["0"]["url"],"",$value["text"]); 
 $description =  str_replace("@".$value["entities"]["user_mentions"]["0"]["screen_name"],"",$txt);
 if(isset($value["entities"]["media"])){
 $url = $value["entities"]["media"]["0"]["url"];
 }else{
 $url = '';
 }
 $date = date("M d, Y  h:ia", strtotime($value["created_at"]));
 $twitter_data = array(
 'icon' => 'tweet',
 'name' => $name,
 'screen_name' => $screen_name,
 'description' => $description,
 'link' => $url,
 'date' => $date
 );
 array_push($api_data, $twitter_data);
 }
 function aasort (&$array, $key) {
 $sorter=array();
 $ret=array();
 reset($array);
 foreach ($array as $ii => $va) {
 $sorter[$ii]=$va[$key];
 }
 arsort($sorter);
 foreach ($sorter as $ii => $va) {
 $ret[$ii]=$array[$ii];
 }
 $array=$ret;
 }
 aasort($api_data,"date");
//    echo '<pre>';
//    print_r($api_data);
//    echo '</pre>';?>