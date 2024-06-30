<?php

/*

bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.
It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!
It is for security-testing and educational purposes only.

Enjoy!

Malik Mesellem
Twitter: @MME_IT

bWAPP is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (http://creativecommons.org/licenses/by-nc-nd/4.0/). Copyright © 2014 MME BVBA. All rights reserved.

*/

include("security.php");
include("security_level_check.php");
include("selections.php");

if(isset($_POST["form"]) && isset($_POST["bug"]))
{

    $key = $_POST["bug"];
    $bug = explode(",", trim($bugs[$key]));

    // Debugging
    // echo " value: " . $bug[0];
    // echo " filename: " . $bug[1] . "<br />";

    header("Location: " . $bug[1]);

}

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter">-->
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<!--<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
<script src="js/html5.js"></script>

<title>bWAPP - Portal</title>

</head>

<body>

<header>

<h1>bWAPP</h1>

<h2>an extremely buggy web app !</h2>

</header>

<div id="menu">

    <table>

        <tr>

            <td><font color="#ffb717">Bugs</font></td>
            <td><a href="password_change.php">Change Password</a></td>
            <td><a href="user_extra.php">Create User</a></td>
            <td><a href="security_level_set.php">Set Security Level</a></td>
            <td><a href="reset.php" onclick="return confirm('All settings will be cleared. Are you sure?');">Reset</a></td>
            <td><a href="credits.php">Credits</a></td>
            <td><a href="http://itsecgames.blogspot.com" target="_blank">Blog</a></td>
            <td><a href="logout.php" onclick="return confirm('Are you sure you want to leave?');">Logout</a></td>
            <td><font color="red">Welcome <?php if(isset($_SESSION["login"])){echo ucwords($_SESSION["login"]);}?></font></td>

        </tr>

    </table>

</div>

<div id="main">

    <h1>Portal</h1>

    <p>bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.<br />
    It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.<br />
    bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!<br />
    It is for security-testing and educational purposes only.</p>

    <p><i>Which bug do you want to hack today? :)</i></p>

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

        <select name="bug" size="9" id="select_portal">

            <?php

            // Lists the options from the array 'bugs' (bugs.txt)
            foreach ($bugs as $key => $value)
            {

               $bug = explode(",", trim($value));

               // Debugging
               // echo "key: " . $key;
               // echo " value: " . $bug[0];
               // echo " filename: " . $bug[1] . "<br />";

               echo "<option value='$key'>$bug[0]</option>";

            }

            ?>

        </select>

        <br />

        <button type="submit" name="form" value="submit">Hack</button>

    </form>

</div>

<div id="side">

    <a href="http://twitter.com/MME_IT" target="blank_" class="button"><img src="./images/twitter.png"></a>
    <a href="http://be.linkedin.com/in/malikmesellem" target="blank_" class="button"><img src="./images/linkedin.png"></a>
    <a href="http://www.facebook.com/pages/MME-IT-Audits-Security/104153019664877" target="blank_" class="button"><img src="./images/facebook.png"></a>
    <a href="http://itsecgames.blogspot.com" target="blank_" class="button"><img src="./images/blogger.png"></a>

</div>

<div id="sponsor">

    <table>

        <tr>

            <td width="103" align="center"><a href="https://www.owasp.org" target="_blank"><img src="./images/owasp.png"></a></td>
            <td width="102" align="center"><a href="https://www.owasp.org/index.php/OWASP_Zed_Attack_Proxy_Project" target="_blank"><img src="./images/zap.png"></a></td>
            <td width="110" align="center"><a href="https://www.netsparker.com/?utm_source=bwappapp&utm_medium=banner&utm_campaign=bwapp" target="_blank"><img src="./images/netsparker.png"></a></td>
            <td width="152" align="center"><a href="http://www.missingkids.com" target="_blank"><img src="./images/mk.png"></a></td>

        </tr>

    </table>

</div>

<div id="disclaimer">

    <p>bWAPP is licensed under <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank"><img style="vertical-align:middle" src="./images/cc.png"></a> &copy; 2014 MME BVBA / Follow <a href="http://twitter.com/MME_IT" target="_blank">@MME_IT</a> on Twitter and ask for our cheat sheet, containing all solutions! / Need an exclusive <a href="http://www.mmebvba.com" target="_blank">training</a>?</p>

</div>

<div id="bee">

    <img src="./images/bee_1.png">

</div>

<div id="security_level">

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

        <label>Set your security level:</label><br />

        <select name="security_level">

            <option value="0">low</option>
            <option value="1">medium</option>
            <option value="2">high</option>

        </select>

        <button type="submit" name="form_security_level" value="submit">Set</button>
        <font size="4">Current: <b><?php echo $security_level?></b></font>

    </form>

</div>

<div id="bug">

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

        <label>Choose your bug:</label><br />

        <select name="bug">

<?php

// Lists the options from the array 'bugs' (bugs.txt)
foreach ($bugs as $key => $value)
{

   $bug = explode(",", trim($value));

   // Debugging
   // echo "key: " . $key;
   // echo " value: " . $bug[0];
   // echo " filename: " . $bug[1] . "<br />";

   echo "<option value='$key'>$bug[0]</option>";

}

?>


        </select>

        <button type="submit" name="form_bug" value="submit">Hack</button>

    </form>

</div>

<a href="htmli_get.php" >htmli_get.php</a>
<a href="htmli_post.php" > htmli_post.php</a>
<a href="htmli_current_url.php" > htmli_current_url.php</a>
<a href="htmli_stored.php" >htmli_stored.php </a>
<a href="iframei.php" > iframei.php</a>
<a href="ldap_connect.php" > ldap_connect.php</a>
<a href="maili.php" >maili.php </a>
<a href="commandi.php" >commandi.php </a>
<a href="commandi_blind.php" >commandi_blind.php </a>
<a href="phpi.php" >phpi.php </a>
<a href="ssii.php" >ssii.php </a>
<a href="sqli_1.php" >sqli_1.php </a>
<a href="sqli_2.php" > sqli_2.php</a>
<a href="sqli_6.php" >sqli_6.php </a>
<a href="sqli_13.php" >sqli_13.php </a>
<a href="sqli_10-1.php" > sqli_10-1.php</a>
<a href="manual_interv.php" >manual_interv.php </a>
<a href="sqli_3.php" > sqli_3.php</a>
<a href="sqli_16.php" > sqli_16.php</a>
<a href="sqli_11.php" >sqli_11.php </a>
<a href="sqli_drupal.php" > sqli_drupal.php</a>
<a href="sqli_7.php" > sqli_7.php</a>
<a href="sqli_12.php" > sqli_12.php</a>
<a href="sqli_17.php" >sqli_17.php </a>
<a href="sqli_8-1.php" >sqli_8-1.php </a>
<a href="sqli_4.php" >sqli_4.php </a>
<a href="sqli_15.php" >sqli_15.php </a>
<a href="sqli_14.php" >sqli_14.php </a>
<a href="sqli_5.php" >sqli_5.php </a>
<a href="xmli_1.php" > xmli_1.php</a>
<a href="xmli_2.php" > xmli_2.php</a>
<a href="portal.php" > portal.php</a>
<a href="ba_captcha_bypass.php" >ba_captcha_bypass.php </a>
<a href="ba_forgotten.php" >ba_forgotten.php </a>
<a href="ba_insecure_login_1.php" > ba_insecure_login_1.php</a>
<a href="ba_logout.php" > ba_logout.php</a>
<a href="ba_pwd_attacks_1.php" >ba_pwd_attacks_1.php </a>
<a href="ba_weak_pwd.php" >ba_weak_pwd.php </a>
<a href="smgmt_admin_portal.php" > smgmt_admin_portal.php</a>
<a href="smgmt_cookies_httponly.php" >smgmt_cookies_httponly.php </a>
<a href="smgmt_cookies_secure.php" >smgmt_cookies_secure.php </a>
<a href="smgmt_sessionid_url.php" >smgmt_sessionid_url.php </a>
<a href="smgmt_strong_sessions.php" > smgmt_strong_sessions.php</a>
<a href="xss_get.php" > xss_get.php</a>
<a href="xss_post.php" >xss_post.php </a>
<a href="xss_json.php" > xss_json.php</a>
<a href="xss_ajax_2-1.php" >xss_ajax_2-1.php </a>
<a href="xss_ajax_1-1.php" >xss_ajax_1-1.php </a>
<a href="xss_back_button.php" > xss_back_button.php</a>
<a href="xss_custom_header.php" > xss_custom_header.php</a>
<a href="xss_eval.php" > xss_eval.php</a>
<a href="xss_href-1.php" > xss_href-1.php</a>
<a href="xss_login.php" > xss_login.php</a>
<a href="xss_phpmyadmin.php" > xss_phpmyadmin.php</a>
<a href="xss_php_self.php" >xss_php_self.php </a>
<a href="xss_referer.php" > xss_referer.php</a>
<a href="xss_user_agent.php" > xss_user_agent.php</a>
<a href="xss_stored_1.php" > xss_stored_1.php</a>
<a href="xss_stored_3.php" > xss_stored_3.php</a>
<a href="xss_stored_2.php" >xss_stored_2.php </a>
<a href="xss_sqlitemanager.php" >xss_sqlitemanager.php </a>
<a href="xss_stored_4.php" > xss_stored_4.php</a>
<a href="insecure_direct_object_ref_1.php" > insecure_direct_object_ref_1.php</a>
<a href="insecure_direct_object_ref_3.php" >insecure_direct_object_ref_3.ph </a>
<a href="insecure_direct_object_ref_2.php" > insecure_direct_object_ref_2.php</a>
<a href="sm_samba.php" >sm_samba.php </a>
<a href="sm_cors.php" > sm_cors.php</a>
<a href="sm_xst.php" > sm_xst.php</a>
<a href="sm_dos_3.php" >sm_dos_3.php </a>
<a href="sm_dos_1.php" >sm_dos_1.php </a>
<a href="sm_dos_4.php" >sm_dos_4.php </a>
<a href="sm_dos_2.php" >sm_dos_2.php </a>
<a href="sm_webdav.php" >sm_webdav.php </a>
<a href="sm_local_priv_esc_1.php" >sm_local_priv_esc_1.php </a>
<a href="sm_local_priv_esc_2.php" >sm_local_priv_esc_2.php </a>
<a href="sm_mitm_1.php" > sm_mitm_1.php</a>
<a href="sm_mitm_2.php" >sm_mitm_2.php </a>
<a href="sm_obu_files.php" > sm_obu_files.php</a>
<a href="sm_robots.php" > sm_robots.php</a>
<a href="insecure_crypt_storage_3.php" >insecure_crypt_storage_3.php </a>
<a href="insuff_transp_layer_protect_3.php" >insuff_transp_layer_protect_3.php </a>
<a href="insuff_transp_layer_protect_1.php" > insuff_transp_layer_protect_1.php</a>
<a href="heartbleed.php" > heartbleed.php</a>
<a href="hostheader_2.php" >hostheader_2.php </a>
<a href="insecure_crypt_storage_1.php" > insecure_crypt_storage_1.php</a>
<a href="insuff_transp_layer_protect_4.php" > insuff_transp_layer_protect_4.php</a>
<a href="insuff_transp_layer_protect_2.php" >insuff_transp_layer_protect_2.php </a>
<a href="insecure_crypt_storage_2.php" > insecure_crypt_storage_2.php</a>
<a href="irectory_traversal_2.php" > irectory_traversal_2.php</a>
<a href="directory_traversal_1.php" > directory_traversal_1.php</a>
<a href="hostheader_1.php" >hostheader_1.php </a>
<a href="hostheader_2.php" >hostheader_2.php </a>
<a href="lfi_sqlitemanager.php" >lfi_sqlitemanager.php </a>
<a href="rlfi.php" >rlfi.php </a>
<a href="restrict_device_access.php" >restrict_device_access.php </a>
<a href="restrict_folder_access.php" >restrict_folder_access.php </a>
<a href="ssrf.php" >ssrf.php </a>
<a href="xxe-1.php" > xxe-1.php</a>
<a href="csrf_1.php" >csrf_1.php </a>
<a href="csrf_3.php" >csrf_3.php </a>
<a href="csrf_2.php" > csrf_2.php</a>
<a href="bof_1.php" >bof_1.php </a>
<a href="bof_2.php" > bof_2.php</a>
<a href="sqli_drupal.php" >sqli_drupal.php </a>
<a href="heartbleed.php" >heartbleed.php </a>
<a href="php_cgi.php" > php_cgi.php</a>
<a href="php_eval.php" >php_eval.php </a>
<a href="xss_phpmyadmin.php" > xss_phpmyadmin.php</a>
<a href="shellshock.php" >shellshock.php </a>
<a href="lfi_sqlitemanager.php" >lfi_sqlitemanager.php </a>
<a href="phpi_sqlitemanager.php" > phpi_sqlitemanager.php</a>
<a href="xss_sqlitemanager.php" > xss_sqlitemanager.php</a>
<a href="unvalidated_redir_fwd_1.php" >unvalidated_redir_fwd_1.php </a>
<a href="unvalidated_redir_fwd_2.php" >unvalidated_redir_fwd_2.php </a>
<a href="clickjacking.php" > clickjacking.php</a>
<a href="cs_validation.php" > cs_validation.php</a>
<a href="hpp-1.php" >hpp-1.php </a>
<a href="http_response_splitting.php" >http_response_splitting.php </a>
<a href="http_verb_tampering.php" >http_verb_tampering.php </a>
<a href="information_disclosure_4.php" > information_disclosure_4.php</a>
<a href="information_disclosure_2.php" > information_disclosure_2.php</a>
<a href="information_disclosure_1.php" >information_disclosure_1.php </a>
<a href="information_disclosure_3.php" >information_disclosure_3.php </a>
<a href="unrestricted_file_upload.php" >unrestricted_file_upload.php </a>
<a href="portal.php">portal.php </>
<a href="crossdomain.xml">crossdomain.xml </>
<a href="666"> 666</>
<a href="manual_interv.php">manual_interv.ph </>
<a href="admin/index.php"> admin/index.php</>
<a href="secret_html.php">secret_html.php </>
<a href="secret.php"> secret.php</>
<a href="ws_soap.php">ws_soap.php </>	




</body>

</html>
