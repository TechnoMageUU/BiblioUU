<!doctype html>
<html><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="library, Wicca, Pagan, Paganism, Asatru, Celtic, Unitarian, Universalist, UUA, earth-centered, nature-centered, spiritual, religion, interfaith, Unitarian Universalist Association, UU ministry, seventh principle">
    <title>CUUPS Library Search</title>

    <style type="text/css">
            a:link, a:visited, a:hover, a:active 
            {
                    text-decoration: none;
                    color: rgba(255,255,255,1);
            }
    </style>


</head>
<body>
        <div id="content">
            <p class="title-text" id="title-brown">Library Search</p>
            <div>
                <br />
                 <form name='formSearch' method='post' action="results.php">
                 <table border="1">
                     <tr>
                         <td colspan='2' style='text-align: center; vertical-align: middle;'>
                             <div class='button' id='divSearchButton'>
                                   <a href="results.php" button name="btnResults">Go Find Stuff!</button>
                             </div>
                             <br />
                             <input type='submit' name='submitSearch' value='Search'>
                         </td>
                     </tr>            
                     <tr>
                         <td>
                             Title<br />
                         </td>
                         <td>
                             <input type='text' name='searchTitle' >
                         </td>
                     <tr>
                         <td colspan='2'>
                             <div class='instruct' id='instructTitle'>
                                 Enter all or part of an item&apos;s title; can be left blank.
                             </div>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             Author<br />
                         </td>
                         <td>
                             <input type='text' name='searchAuthor'>
                         </td>
                     <tr>
                         <td colspan='2'>
                             <div class='instruct' id='instructTitle'>
                                 Enter all or part of the author&apos;s name; can be left blank.
                             </div>
                         </td>
                     </tr>            
                     <tr>
                         <td colspan='2'>
                             <div class='instruct' id='instructTitle'>
                                 The default is to search all item types. To restrict your search to specific types, adjust these checkboxes. 
                             </div>
                         </td>
                     </tr>  
                     <tr>
                         <td colspan='1'>
                                 <input type='checkbox' name='chkBooks'  id='chkBooks'   value='Books' checked>Books<br />
                                 <input type='checkbox' name='chkTarot'  id='chkTartot'  value='Tarot' checked>Tarot Cards<br />
                                 <input type='checkbox' name='chkDivine' id='chkDivine'  value='Divine' checked>Divination Tools <i>(other than Tarot)</i><br />
                                 <input type='checkbox' name='chkDVD'    id='chkDVD'     value='DVD' checked>DVD<br />
                         </td>
                     </tr>              
                     <tr>
                         <td colspan='2'>
                             <div class='instruct' id='instructTitle'>
                                 To search by keyword or category, select one or more from this list. Can be left blank.
                             </div>
                         </td>
                     </tr>  
                     <tr>
                         <td colspan='1'>
                                 <input type='checkbox' name='kw01' id='kw01' value='wicca'>Wicca<br />
                                 <input type='checkbox' name='kw02' id='kw02' value='nordic'>Nordic<br />
                         </td>
                     </tr>  
                 </table>
                 </form>
                 <br />
            </div>
    </div>
    <div id="credit">
      <p align="center" id="footer-text">
          Website &COPY;2012 Covenant of Unitarian Universalist Pagans.<br>
          Written materials belong to the Covenant of Unitarian Universalist Pagans<br>
          or the authors who have contributed the work.</p>
    </div>
</body>
</html>
