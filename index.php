<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/styles.css" />

    <meta charset="UTF-8">
    <meta name="google-site-verification" content="DOnlG_4czi7QIP2QY-r1VHM4mzI2y7yeaT_1r7lq6VQ" />
    <meta charset="UTF-8">
    <title>CUUPS Library Index Page</title>
    <meta name="keywords" content="library Wicca, Pagan, Paganism, Asatru, Celtic, Unitarian, Universalist, UUA, earth-centered, nature-centered, spiritual, religion, interfaith, Unitarian Universalist Association, UU ministry, seventh principle">
    <?php
    require 'include/incScripts.php';
    ?>
    <style type="text/css" >
            table { 
/*                background: url("../images/Triple-Goddess-Symbol.png") no-repeat; */
                display: block;
                margin-left: auto;
                margin-right: auto;
            }            
            a.button {
                -webkit-appearance: button;
                -moz-appearance: button;
                appearance: button;

                text-decoration: none;
                color: initial;
                }
    </style>
<style type="text/css">
#container-main {
	margin: auto;
	padding-left : 20px;
        padding-right: 20px;
/*	height: 800px;*/
	width : 975px;
	position: inherit;
	/*background-color: rgba(255,255,255,1);*/
        background-color: #fceeb6;
	z-index: -1;
}
.nav-text {
	font-family: Arial, Helvetica, sans-serif;
	font-size  : 12px;
	font-weight: bold;
        color      : white;
	text-align : center;
	vertical-align: middle;
}
.nav-text a:link,a:visited {
	/*color: rgba(255,255,255,1);*/
	text-decoration: none;	
}
#nav-green {
	background-color: rgba(12,157,70,1);
	height: 35px;
	width: 150px;
	float: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 10;
        text-align : center;
	vertical-align: middle;
}
#nav-green:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-green {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-blue {
        color      : rgba(255,255,255,1);
	background-color: rgba(0,153,255,1);
	height: 35px;
	width: 150px;
	float: left;
        clear: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 9;
        text-align : center;
	vertical-align: middle;        
}
#nav-blue:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-blue {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-purple {
        color      : rgba(255,255,255,1);    
	background-color: rgba(102,51,153,1);
	height: 35px;
	width: 150px;
	float: left;
        clear: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 8;
        text-align : center;
	vertical-align: middle;
}
#nav-purple:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-purple {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-yellow {
        color      : rgba(255,255,255,1);    
	background-color: rgba(255,185,0,1);
	height: 35px;
	width: 150px;
	float: left;
	clear: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 7;
        text-align : center;
	vertical-align: middle;        
}
#nav-yellow:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-yellow {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-teal {
        color      : rgba(255,255,255,1);    
	background-color: rgba(0,153,153,1);
	height: 35px;
	width: 150px;
	float: left;
        clear: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 6;
        text-align : center;
	vertical-align: middle;        
}
#nav-teal:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-teal {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-navy {
        color      : rgba(255,255,255,1);    
	background-color: rgba(0,0,102,1);
	height: 35px;
	width: 150px;
	float: left;
        clear: left;
        overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 5;
        text-align : center;
	vertical-align: middle;        
}
#nav-navy:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-navy {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-brown {
        color      : rgba(255,255,255,1);    
	background-color: rgba(153,51,0,1);
	height: 35px;
	width: 150px;
	float: left;
        clear: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 4;
        text-align : center;
	vertical-align: middle;        
}
#nav-brown:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-brown {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
#nav-pink {
        color      : white;
	background-color: rgba(255,0,153,1);
	height: 35px;
	width: 150px;
	float: left;
        clear: left;
	overflow: hidden;
	border-radius: 20px 20px 20px 20px;
	box-shadow: 0px 2px 8px #000000;
	z-index: 3;
        text-align : center;
	vertical-align: middle;        
}
#nav-pink:hover {
    color: black;
    background-color:cornsilk;
}
.roundButt-pink {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
.nav-img {
	padding: 0px;
	margin-bottom: 0px;
	float: left;
	position: relative;
	z-index: 11;
}
.nav-imgR {
	padding: 0px;
/*	height: 175px;
	width: 150px;*/
	/* [disabled]margin-right: 8px; */
	margin-bottom: 8px;
	float: left;
	position: relative;
	z-index: 11;
}
.nav-imgL {
	padding: 0px;
/*	height: 175px;
	width: 150px;*/
	margin-right: 8px;
	margin-bottom: 8px;
	float: left;
	clear: left;
	position: relative;
	z-index: 11;
}
#logo {
    	text-align: center;
        vertical-align: middle;
/*	clear: right;
	float: right;*/
/*	height: 252px;*/
/*        height: 100px;
	width: 600px;
	padding-left: 110px;*/
}
#greenbar {
/*	clear: right;
	float: right;*/
/*	height: 100px;
	width: 667px;*/
	/*padding-top: 10px;*/
/*	background-color: #0E9D47;*/
	font-family: fantasy, Helvetica, sans-serif;
	font-size: 16px;
	color: black;
	text-align: center;
        vertical-align: middle;
	line-height: 20px;
	font-weight: 400;
	letter-spacing: 1pt;
        margin-top    : 10px;
        margin-bottom : 10px;
        margin-right  : 10px;
        margin-left   : 10px;
        padding-top   : 10px;
        padding-bottom: 10px;
        padding-right : 10px;
        padding-left  : 10px;
}
#content {
	float: left;
	/*width: 530px;*/
	font-family: Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
	line-height: 18px;
	padding-top  : 10px;
	padding-right: 10px;
	padding-left : 10px;
        vertical-align: top;
}
#sidebar {
	float: left;
	height: 500px;
	width: 275px;
	margin-top: 100px;
	padding-top: 30px;
	padding-left: 10px;
	font-family: Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	overflow: visible;
}
#credit {
	clear: both;
	height: 50px;
	width: 500px;
	margin-right: auto;
	margin-left: auto;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	line-height: 12px;
	color: rgba(0,0,0,1);
}
.roundButt {
    border:1px #333 solid;
    padding:5px;
    margin:5px;
    background-color:#dbf4c8;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
}
</style>        
</head>
<body>
    <script>
        $(document).ready(function() {
            homeHideAll();
            homeShowAbout();
            $("#btnSearch").click(function(){btnSearch_OnClick();} );
            $("#btnContact").click(function(){btnContact_OnClick();} );
            $("#btnAbout").click(function(){btnAbout_OnClick();}   );
            $("#btnResources").click(function(){btnResources_OnClick();}   );
            $("#btnHome").click(function(){btnHome_OnClick();}   );
            $("#btnPolicy").click(function(){btnPolicy_OnClick();}   );
            $("#btnForums").click(function(){btnForums_OnClick();}   );
            $("#btnLogon").click(function(){btnLogon_OnClick();}   );
        });
    </script>
    
    <div id="container-main">
        <table border='1'>
            <tr>
                <td>
                    <div class="nav-img"><img src="images/biblioimg1.png" width="150" height="175"></div>
                </td>
                <td>
                    <div id="logo">
                        <img alt="CUUPS Library Logo" id="Librarylogo_large" src="images/FrederickCUUPSLogoGrimoire2.png"> <!-- width="450" height="253" -->
                    </div>                    
                </td>
                <td>
                    <div class="nav-img"><img src="images/biblioimg2.png" width="150" height="175"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="nav-green">
                        <input id="btnSearch" type="button" value="Search" class="roundButt-green"/>
                    </div>
                    <div id="nav-blue" style="text-align:center;vertical-align: middle;">
                        <input id="btnPolicy" type="button" value="Policies" class="roundButt-blue"/>
                    </div>
                    <div id="nav-purple">
                        <input id="btnAbout" type="button" value="About" class="roundButt-purple"/>
                    </div>
                    <div id="nav-yellow">
                        <input id="btnContact" type="button" value="Contact" class="roundButt-yellow"/>
                    </div>
                </td>
                <td>
                    <div id='divSearch'>
                            <?php require 'include/incSearch.php'; ?>
                    </div>
                    <div id='divAbout'>
                            <?php require 'include/incAbout.php'; ?>
                    </div>                    
                    <div id='divContact'>
                            <?php require 'include/incContact.php'; ?>
                    </div>                    
                    <div id='divResources'>
                            <?php require 'include/incResources.php'; ?>
                    </div>                    
                    <div id='divLogon'>
                            <?php require 'include/incLogon.php'; ?>
                    </div>
                    <div id='divHome'>
                            <?php require 'include/incHome.php'; ?>
                    </div>
                </td>
                <td>
                    <div id="nav-teal">
                        <input id="btnForums" type="button" value="Forums" class="roundButt-teal"/>
                    </div>
                    <div id="nav-navy">
                        <input id="btnResources" type="button" value="Resources" class="roundButt-navy"/>
                    </div>
                    <div id="nav-brown">
                        <input id="btnLogon" type="button" value="Logon/Register" class="roundButt-brown"/>
                    </div>
                    <div id="nav-pink">
                        <input id="btnHome" type="button" value="Home" class="roundButt-pink"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="nav-img"><img src="images/biblioimg3.png" width="150" height="175"></div>
                </td>
                <td>
                    <div id="greenbar">
                            A full, ordered and compleat compendium of all mysteries of 
                            The Library&apos;s &aelig;theric record, 
                            wherein all secrets are revealed unto our initiates, 
                            the higher mysteries are elucidated for the blessed, 
                            and all arcane symbols and sigils are explicated 
                            such that one may always walk forth illuminated.
                    </div>                    
                </td>
                <td>
                    <div class="nav-img"><img src="images/biblioimg4.png" width="150" height="175"></div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>