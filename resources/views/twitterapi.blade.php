<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                {{print_r($request[0])}}
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<!--{{print_r($request)}}の中身

Array ( [0] => 

stdClass Object 
( 
    [created_at] => Sat Sep 15 10:05:46 +0000 2018 
    [id] => 1040904501052358657 
    [id_str] => 1040904501052358657 
    [text] => from python [truncated] => 
    [entities] => stdClass Object ( 
        [hashtags] => Array ( ) 
        [symbols] => Array ( ) 
        [user_mentions] => Array ( ) 
        [urls] => Array ( ) 
        ) 
    [source] => test_nagamo 
    [in_reply_to_status_id] => 
    [in_reply_to_status_id_str] => 
    [in_reply_to_user_id] => 
    [in_reply_to_user_id_str] => 
    [in_reply_to_screen_name] => 
    [user] => stdClass Object ( 
        [id] => 1040872440937607168 
        [id_str] => 1040872440937607168 
        [name] => 永森大喜@Webエンジニア 
        [screen_name] => test_nagamo 
        [location] => Tokyo-to, Japan 
        [description] => 
        [url] => 
        [entities] => stdClass Object ( 
            [description] => stdClass Object ( 
                [urls] => Array ( ) 
            ) 
        ) 
        [protected] => 
        [followers_count] => 18 
        [friends_count] => 75 
        [listed_count] => 0 
        [created_at] => Sat Sep 15 07:58:23 +0000 2018 
        [favourites_count] => 39 
        [utc_offset] => 
        [time_zone] => 
        [geo_enabled] => 
        [verified] => 
        [statuses_count] => 2 
        [lang] => 
        [contributors_enabled] => 
        [is_translator] => 
        [is_translation_enabled] => 
        [profile_background_color] => F5F8FA 
        [profile_background_image_url] => 
        [profile_background_image_url_https] => 
        [profile_background_tile] => 
        [profile_image_url] => http://pbs.twimg.com/profile_images/1185912332280451073/r3nu5F1M_normal.jpg 
        [profile_image_url_https] => https://pbs.twimg.com/profile_images/1185912332280451073/r3nu5F1M_normal.jpg 
        [profile_link_color] => 1DA1F2 
        [profile_sidebar_border_color] => C0DEED 
        [profile_sidebar_fill_color] => DDEEF6 
        [profile_text_color] => 333333 
        [profile_use_background_image] => 1 
        [has_extended_profile] => 
        [default_profile] => 1 
        [default_profile_image] => 
        [following] => 
        [follow_request_sent] => 
        [notifications] => 
        [translator_type] => none 
        ) 
    [geo] => 
    [coordinates] => 
    [place] => 
    [contributors] => 
    [is_quote_status] => 
    [retweet_count] => 0 
    [favorite_count] => 13 
    [favorited] => 
    [retweeted] => 
    [lang] => en 
    ) 
) 
1
