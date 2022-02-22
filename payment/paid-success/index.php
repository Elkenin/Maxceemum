<?php

session_start();

include "../../connections/database.php";  
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location: ../../logout.php');
	exit;
}
if(isset($_SESSION["loggedin"]))
{
    if((time() - $_SESSION["last_login_time"]) > 30000)
    {
        header('location: ../../logout.php');
    }
    else 
    {
        $_SESSION['last_login_time'] = time();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        
          <meta charset="utf-8">
          <meta http-equiv="x-ua-compatible" content="ie=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <style type="text/css">
          /**
           * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
           */
          @media screen {
            @font-face {
              font-family: 'Source Sans Pro';
              font-style: normal;
              font-weight: 400;
              src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
            }
        
            @font-face {
              font-family: 'Source Sans Pro';
              font-style: normal;
              font-weight: 700;
              src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
            }
          }
        
          /**
           * Avoid browser level font resizing.
           * 1. Windows Mobile
           * 2. iOS / OSX
           */
          body,
          table,
          td,
          a {
            -ms-text-size-adjust: 100%; /* 1 */
            -webkit-text-size-adjust: 100%; /* 2 */
          }
        
          /**
           * Remove extra space added to tables and cells in Outlook.
           */
          table,
          td {
            mso-table-rspace: 0pt;
            mso-table-lspace: 0pt;
          }
        
          /**
           * Better fluid images in Internet Explorer.
           */
          img {
            -ms-interpolation-mode: bicubic;
          }
        
          /**
           * Remove blue links for iOS devices.
           */
          a[x-apple-data-detectors] {
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: none !important;
          }
        
          /**
           * Fix centering issues in Android 4.4.
           */
          div[style*="margin: 16px 0;"] {
            margin: 0 !important;
          }
        
          body {
            width: 100% !important;
            height: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
          }
        
          /**
           * Collapse table borders to avoid space between cells.
           */
          table {
            border-collapse: collapse !important;
          }
        
          a {
            color: #1a82e2;
          }
        
          img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
          }
          @media print {
          @page {
            margin-top: 0;
            margin-bottom: 0;
          }
          body  {
            padding-top: 5rem;
            padding-bottom: 5rem;
          }
        }
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <style type="text/css">
          </style>
        </head>
        <body style="-webkit-print-color-adjust: exact;">
        
          <!-- start body -->
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
        			<div style="height:50px;">
        			</div>
                      <h4 style="line-height: 0px;" align="center">Financial Freedom Plans, Inc.</h4>
                      <h6 style="line-height: 0px;" align="center">UG-25 City & Land, Mega Plaza. ADB Ave., Ortigas Center, San Antonio. Pasig City .</h6>
        			  <p align="center" font-size="11px"style="line-height: 0px;">10/11/1111</p>
        				<h4 align="center">IN SETTLEMENT OF THE FOLLOWING</h4>
        				<tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Transaction NO.: </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?>POS000001</td>
                        </tr>
                        <tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Reference (OR): </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?>POS000001</td>
                        </tr>
                        <tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Processing Fee: </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?>200</td>
                        </tr>
                        <tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Amount: </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?> 800</td>
                        </tr>
                        <tr align="center" bgcolor="gray" style="opacity:1px;padding: 24px;">
                          <td align="left" width="75%" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 12px;"><strong>Total</strong></td>
                          <td align="left" width="25%" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 12px;"><strong>54.00</strong></td>
        				 </tr>
            <!-- end copy block -->
          </table>
          <!-- end body -->
        			<div style="height:60px;border-bottom: 2px dashed black;">
        				
        <tr align="center" bgcolor="gray" style="opacity:1px;padding: 24px">
        <td align="left" width="25%" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1px;"></td>
        </tr>
        			
        			</div>
        			<div style="height:50px;">
        			</div>
        
          <!-- start body -->
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <h4 style="line-height: 1px;" align="center">Financial Freedom Plans, Inc.</h4>
                      <h6 style="line-height: 1px;" align="center">UG-25 City & Land, Mega Plaza. ADB Ave., Ortigas Center, San Antonio. Pasig City .</h6>
        			  <p align="center" font-size="11px"style="line-height: 0px;">10/11/1111</p>
        				<h4 align="center">IN SETTLEMENT OF THE FOLLOWING</h4>
        				<tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Transaction NO.: </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?>POS000001</td>
                        </tr>
                        <tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Reference (OR): </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?>POS000001</td>
                        </tr>
                        <tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Processing Fee: </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?>200</td>
                        </tr>
                        <tr>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;">Amount: </td>
                          <td align="left" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 15px;"><?php echo $asa;?> 800</td>
                        </tr>
                        <tr align="center" bgcolor="gray" style="opacity:1px;padding: 24px;">
                          <td align="left" width="75%" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 12px;"><strong>Total</strong></td>
                          <td align="left" width="25%" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 12px;"><strong>54.00</strong></td>
        				</tr>
            <!-- end copy block -->
        	
          </table>
          <!-- end body -->
        
        
        </body>
        </html>
        <script>
        window.print();
        </script>
        <?php
    }
}
else
header("Location: ../");