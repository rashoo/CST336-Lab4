<!DOCTYPE html>
<?php
    if (isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php'; 
        echo "You searched for: " . $_GET['keyword'] . "<br/>"; 
        $imageURLs = getImageURLs($_GET['keyword']); 
        $backgroundImage = $imageURLs[array_rand($imageURLs)] . "<br/>"; 
    } else {
        $backgroundImage = "./img/sea.jpg"; 
    }
    
?>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
       
        <style>
            @import url("./css/styles.css");
            
            body {
                background-image: url('<?=$backgroundImage ?>');
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body data-gr-c-s-loaded="true">
        <br>
        <br>
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="">
            
            <div id="layoutDiv">
                <input type="radio" name="layout" value="horizontal" id="layout_h">
                <label for="layout_h">Horizontal </label><br>
                <input type="radio" name="layout" value="vertical" id="layout_v">
                <label for="layout_v"> Vertical </label><br>
            </div>
            <br>
            <select name="category" style="color:black; font-size:1.5em">
                <option value="">-Select One - </option>
                <option value="Ocean"> Sea </option>
                <option> Mountains </option>
                <option> Forest </option>
                <option> Sky </option>
            </select><br><br>
            <input type="submit" value="Submit"
        </form>
       
        
        <?php
        
            if (!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com</h2>"; 
            } else {
        ?>
        
        <div id="carousel-example-generic" class="caraousel slide" data-ride="caraousel">    
            
            <ol class="caraousel-indicators">
        
        
        
        <?php
            for ($i=0; $i<5; $i++){
                echo "<li data-target='#caraousel-example-generic' data-slide-to'$i;";
                echo ($i ==0) ? " class='active'" : "";
                echo "></li>";
            }
            
        ?>
        </ol>
        <div class="caraousel-inner" role="listbox">
            <?php
                for($i=0; i<5; $i++){
                    echo '<div class="item ';
                    echo ($i==0) ? "active" : "";
                    echo '">';
                    echo '<img src="' .$imageURLs[$i] . '">';
                    echo "</div>";
                }
                
            ?>
            
        </div>
        
        <a class="left caraousel-control" href="caraousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"</span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right caraousel-control" href=#"caraousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

        <?php
            }  // ends the else statement
        ?>

        
        <br/>
        <br/>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    </body>
</html>