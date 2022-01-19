<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body
        {
        width:100%;
        margin:0 auto;
        padding:0px;
        font-family:helvetica;
        background-color:#A9D0F5;
        }
        #wrapper
        {
        text-align:center;
        margin:0 auto;
        padding:0px;
        width:995px;
        }
        #wrapper h1
        {
        margin-top:100px;
        font-size:40px;
        }
        #wrapper h1 p
        {
        font-size:17px;
        }
        #wrapper #feed_div
        {
        background-color:white;
        overflow-y:scroll;
        margin-left:320px;
        margin-top:20px;
        text-align:left;
        border:1px solid silver;
        padding:10px;
        }
        #wrapper #feed_div h2
        {
        font-size:17px;
        }
        #wrapper #feed_div .title a
        {
        text-decoration:none;
        color:#0080FF;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="feed_div">
        <?php
        $url = "https://note.com/intersectbylexus/rss";
        $xsourcefile = str_replace("media:thumbnail","thumbnail",$url);
        $rss = simplexml_load_file($xsourcefile);
        echo '<h2>'. $rss->channel->title . '</h2>';	
        foreach ($rss->channel->item as $item) 
        {
            echo '<p class="pubdate">' . $item->pubDate . '</p>';
            echo '<p class="title"><a href="'. $item->link .'">' . $item->title . "</a></p>";
            echo '<img src="'.$item->children('media', TRUE).'">';
            echo "<p class='desc'>" . $item->description . "</p>";
        } 
        ?>
    </div>
</div>
</body>
</html>