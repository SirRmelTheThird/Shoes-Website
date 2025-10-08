
<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="ShoesCSS.css">
        <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <style>
    body{
            font-family: 'Josefin Sans'; font-size: 16px;
    }
    img{
        height: auto; 
        width: auto; 
        max-width: 400px; 
        min-height: 15px;
        max-height: 250px;
    }
    h1{
        font-size: 60px;
    }
    a:link{
        color: black;
        text-decoration: none;
    }
    a:hover{
        text-decoration: underline;
        text-decoration-color: #1473ee;
        text-underline-offset: 15px;     
    }
    #joe{
        display: inline;
    }
    </style>

    <body style="background-color: lightgray;">
    <div id = "joe">
    <h1>Inventory</h1>
    <p><a href="InsertShoes.php">NEW SHOES</a></p>
    </div>

    <form method="post" >
        <div class="search">
                <input type="text"  name ="searchbar" class="searchTerm" placeholder="Search" style="height:45px; font-size:25pt; width:600px;">
                    <button name = "clicked" type="submit" class="searchButton" value="Search" style="height:50px; font-size:20pt; width:50px;">
                        <i class="fa fa-search"></i>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
        </div>
    </form>
    <div class="Trend">
        <h2><center>Trending Shoes</center><h2>
    </div>
    </body>
    </html>