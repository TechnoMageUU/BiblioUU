/* 
 * Copyright 2017 Frederick CUPPS
 */
function btnForums_OnClick(){
    window.location.href("../forum/index.php");
    //window.location.replace("../forum/index.php");
}
function btnPolicy_OnClick(){
    window.location.href("../press/index.php");    //">Policies</a></p>  http://stackoverflow.com");
}
function btnSearch_OnClick(){
    window.location.href("search.php");
}
function btnAbout_OnClick(){
    homeHideAll();
    homeShowAbout();
}
function btnContact_OnClick(){
    homeHideAll();
    homeShowContact();
}
function btnResources_OnClick(){
    homeHideAll();
    homeShowResources();
}
function btnLogon_OnClick(){
    homeHideAll();
    homeShowLogon();
}
function btnHome_OnClick(){
    homeHideAll();
    homeShowHome();
}
function homeHideAll(){
    $("#divHome").hide();
    $("#divAbout").hide();
    $("#divSearch").hide();
    $("#divLogon").hide();
    $("#divRegister").hide();
    $("#divContact").hide();
    $("#divResources").hide();
}
function homeShowHome(){
    $("#divHome").show();
}
function homeShowAbout(){
    $("#divAbout").show();
}
function homeShowSearch(){
    $("#divSearch").show();
}
function homeShowLogon(){
    $("#divLogon").show();
}
function homeShowContact(){
    $("#divContact").show();
}
function homeShowResources(){
    $("#divResources").show();
}