<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        main{
      
            color:#3e2723;
            font-family: Georgia, 'Times New Roman', Times, serif;
         font-size: medium;
    font-style: normal;
        }
        .menu-item{
            
            
            color:#3e2723;
            font-family: Georgia, 'Times New Roman', Times, serif;
         font-size: medium;
         font-style: normal;
     text-decoration:none;

 
        }
       h1{
    color: #3e2723;
        font-familY:'FANGSONG';
    font-size:xx-large;
    font-style: italic;
    text-align: center;
    text-decoration: solid;
    text-overflow:ellipsis ;
    margin-top:50px;
   
}
p{
    
            color:#3e2723;
            font-family: Georgia, 'Times New Roman', Times, serif;
         font-size: large;
    font-style: normal;
}
body{
    background: peachpuff;
}
img{
    margin-left:100px;
}
button,input[type="submit"]{
    background:#8b4513;
    color:white;
    padding:10px,20px;
    border-radius:5px;
    curson:pointer;
}
button;hover,input[type="submit"]:hover{
    background:#A0522D;
}

        </style>
</head>
<body>
    <?php 
   $pageTitle = "WELCOME To THE AUTUMN'S HOUSE";
   echo "<h1>" . $pageTitle . "</h1>";
   ?>
   <img src="look.jpg">
   <main>
    "At The Autumn's House, we believe every cup tells a story. Inspired by the golden hues of the season and the comfort of a warm hearth, we’ve created a sanctuary in Raj Nagar Extension for dreamers, thinkers, and coffee lovers alike. From our artisan brews to our hand-baked treats, everything is served with a touch of seasonal magic."<BR><BR>
     
</main>

   <footer>
 <p> To check out are dishes pls click on the menu button it will redirect you to the menu section

   
 <a href="menu.php">
    <button> &#127860; OPEN MENU&#127860;</button>
</a>
    <br>
    <br><br><br><br><br>
   <div class="menu-item"> <pre> Address: The Moon Walk, Coffee and Shake RKGIT COLLEGE, Raj Nagar Extension, Ghaziabad, Uttar Pradesh 201003
Hours: Closed · Opens 11 am Mon
Phone: 070601 21155
Price per person: ₹200–400
</p>
</div>
</footer>
</body>
</html>