<?php
session_start();

require_once (__DIR__ .'/../../application/configuration/global.config.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<script type="text/javascript" src="application/user/changeuserpassword.js"></script>
<div style="position:relative;left:10px;top:10px;">
    <form id="fmchangeuserpassword" method="post" novalidate>
        <div class="fitem">
            <label>User ID:</label>
            <input id="USER_IDUSER" name="USER_IDUSER" style="width:300px;" class="easyui-validatebox textbox" required="true" value="">
        </div>
        <div class="fitem">
            <label>New Password :</label>
            <input id="USER_PASSWORD" name="USER_PASSWORD" style="width:300px;" class="easyui-validatebox textbox" type="password" required="true" >
        </div>
    </form>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUserPassword()"><?php echo BTN_SAVE; ?></a>
    </div>
</div>