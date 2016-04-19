<html>
<head>
   
    <script type="text/javascript" src="jquery-2.2.2.min.js"></script>
    <script type="text/javascript" src="lightbox.min.js"></script>
    <link href="lightbox.css" rel="stylesheet"/>
        
</head>
<body>
    <?php 
    $page=$_SERVER['PHP_SELF'];
    $column=4;
    $base="data";
    $thumbs="thumbs";
    @$get_album=$_GET['album'];
    if(!$get_album){
        echo "<b>Select an Album</b><br/>";
        $handle=  opendir($base);
        while(($file=readdir($handle))!=false)
        {
            if(is_dir($base."/".$file) && $file!="." && $file!=".." && $file!= $thumbs)
            {
                echo "<a href='$page?album=$file'>".$file."</a><br />";
            }
        }
        closedir($handle);
    }
    else{
        
        if(!is_dir($base."/".$get_album) || (strstr($get_album, ".")!=NULL) || (strstr($get_album, "/")!=NULL) || (strstr($get_album, "\\")!=NULL))
        {
            echo "album doesnot exist<br/>";
            
        }
        else{
            echo "<b>" .$get_album."</b><br />";
                $x=0;
                    
        $handle=  opendir($base."/".$get_album);
        while(($file=readdir($handle))!=false)
        {
            if($file!="." && $file!="..")
            {
                echo "<table style='display:inline;'><tr><td><a href='$base/$get_album/$file' data-lightbox='nondatabasealbum'><img src='$base/$thumbs/$file' height='100' weight='100'></a></td></tr></table>";
                $x++;
                if($x==$column){
                    $x=0;
                    echo "<br/>";
                }
            }
        }
        closedir($handle);
        echo "<p><a href='$page' >Back to album </a></p>";
        }
        
    }
    
    ?>
    
</body>

</html>
