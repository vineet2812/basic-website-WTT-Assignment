<?php include 'database.php'; ?>
<?php
$query="SELECT * FROM shouts ORDER BY id DESC";
$shouts=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="esports.ico" />
    <title>Gaming Networks</title>
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="shoutbox.css" />
</head>
<body>
    <ul class="topnav">
        <li><a href="index.html">Home</a></li>
        <li class="right"><a href="https://fitnesstvineetandvaishnavi.netlify.app/">Fitness Tracker</a></li>
        <li class="right"><a href="https://vineet2812.github.io">My portfolio</a></li>
        <li class="right">
            <div class="dropdown">
                <button class="dropbtn">Games
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="Valorant.html">Valorant</a>
                  <a href="csgo.html">CS:GO</a>
                  <a href="Dota2.html">Dota 2</a>
                </div>
        </li>
        <li class="right"><a href="shoutbox.html" class="active">Shoutout box</a></li>
    </ul>
    <h1 class=topofnav align="center">Show support for your team using Shout IT box</h1>
    <div id="container">
        <header><h1>Shout IT! support ur teams and give ideas for improvement</h1></header>
        <div id="shouts">
            <ul>
                <?php while($row=mysqli_fetch_assoc($shouts)) : ?>
                    <li class="shout"><span><?php echo $row['time']?> - </span><strong><?php echo $row['user'] ?></strong>: <?php echo $row['message'] ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div id="input">
            <?php if(isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error'];?></div>
            <?php endif; ?>
            <form method="post" action="process.php">
                <input type="text" name="user" placeholder="Enter Your name"/>
                <input type="text" name="message" placeholder="Enter a message"/>
                <br/>
                <input class="shout-btn" type="submit" name="submit" value="Shout it out" />
            </form>
        </div>
    </div>
    <p class="footer" align="center"><b>Made by <a href="https://github.com/vineet2812"> &copy; 2021 (Vineet Pashine) </a></b></p>   
</body>
</html>