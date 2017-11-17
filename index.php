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
            $("#btnAdminMenu").click(function(){btnAdminMenu_OnClick();}   );
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
                            <?php require 'library/incSearch.php'; ?>
                    </div>
                    <div id='divAbout'>
                            <?php require 'library/incAbout.php'; ?>
                    </div>                    
                    <div id='divContact'>
                            <?php require 'library/incContact.php'; ?>
                    </div>                    
                    <div id='divResources'>
                            <?php require 'library/incResources.php'; ?>
                    </div>                    
                    <div id='divLogon'>
                            <?php require 'library/incLogon.php'; ?>
                    </div>
                    <div id='divHome'>
                            <?php require 'library/incHome.php'; ?>
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