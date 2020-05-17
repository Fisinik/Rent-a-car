<?php 
    if(!isset($_SESSION)){session_start();}
?>
<header class="top-area" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
<div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="search-and-language-bar pull-right">
                            <ul>
                            <?php if(!isset($_SESSION['username'])){ ?>
                                <li><a href="" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-user"></i> Log in </a></li>
                            <?php } else { ?>
                                <li><a href="db/user-logout.php"><i class="fa fa-user"></i> Sign out</a></li>
                            <?php } ?>
                            </ul>
                        </div>
                        <div id="main-nav" class="stellarnav">
                            <ul id="nav" class="nav navbar-nav">
                                <li><a href="index.php">home</a>
                                </li>
                                <?php if(isset($_SESSION['username'])){ ?>
                                <li><a href="single-service.php">Service</a>
                                </li> <?php } ?>
                                <?php if(isset($_SESSION['username']) && ($_SESSION['username'] === "admin")){ ?>
                                <li><a href="admin-page.php">Admin Page</a>
                                </li> <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div></div>