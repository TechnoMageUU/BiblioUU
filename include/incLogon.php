<?php
/* 
 * Copyright 2017 Frederick CUPPS
 */
?>
<div id="content">
    <table>
        <tr>
            <th style='width:50%;'>
                Logon for Registered Mages
            </th>
            <td  style='border: 1px solid green;'>
                <table>
                    <tr>
                        <th style='width:50%;'>
                            User ID:
                        </th>
                        <td>
                            <input type='text' name='logonUID' >
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Passcode:
                        </th>
                        <td style='text-align:center;'>
                            <input type='text' name='logonPasscode' value='Logon' >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style='text-align:center;'>
                            <input id="btnAdmin" type="button" value="Admin Menu" class="roundButt-yellow"/>
                        </td>
                    </tr>
                </table>
        </tr>
        <tr>
            <td colspan="2" style='text-align: center;'>
                 <img src="images/greenMan_small.png">
            </td>
        </tr>        
        <tr style='border:1px double darkgoldenrod;'>
            <th>
                Registration for Potential Mages
            </th>            
            <td>
                <input id="btnRegisterNew" type="button" value="I want to become a Mage!" class="roundButt-yellow"/>
            </td>            
        </tr>
        <tr style='border:1px double darkgoldenrod;'>
            <td colspan='2'>
                Temp button to the admin page<br />
                <input id="btnAdminMenu" type="button" value="Admin Menu" class="roundButt-yellow"/>
            </td>            
        </tr>        
    </table>
</div>
