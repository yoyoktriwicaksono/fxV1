<?php
session_start();

require_once (__DIR__ .'/../../application/configuration/global.config.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<script type="text/javascript" src="application/user/profile.js"></script>
<div style="position:relative;left:10px;top:10px;">
    <form id="fmuser" method="post" novalidate>
        <div class="fitem">
            <label>User ID:</label>
            <input id="IDUSER" name="IDUSER" class="textbox" readonly="true" style="width:300px;" value="<?php echo $_SESSION["uname"]; ?>">
        </div>
        <div class="fitem">
            <label>Nama :</label>
            <input name="NAMA" class="textbox" readonly="true" style="width:300px;" value="<?php echo $_SESSION["name"]; ?>">
        </div>
        <div class="fitem">
            <label>Group Menu:</label>
            <input name="GROUPMENUID" class="textbox" readonly="true" style="width:300px;" value="<?php echo $_SESSION["groupmenuid"]; ?>">
        </div>
        <div class="fitem">
            <label>Organization:</label>
            <input name="ORG" class="textbox" readonly="true" style="width:300px;" value="<?php echo $_SESSION["org_nama"]; ?>">
        </div>
        <div class="fitem">
            <label>Sales Office:</label>
            <input name="SOFF" class="textbox" readonly="true" style="width:300px;" value="<?php echo $_SESSION["soff_nama"]; ?>">
        </div>
        <div class="fitem">
            <label>Theme:</label>
            <select id="THEME" name="THEME" style="width:300px;" hasDownArrow="true" ></select>
            <input type="hidden" id="themeid" name="themeid" value="<?php echo $_SESSION["theme"]; ?>" >
        </div>
    </form>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveProfile()"><?php echo BTN_SAVE; ?></a>
    </div>
    <input type="hidden" id="URL_COMBO_THEME_LOAD" value="<?php echo URL_COMBO_THEME_LOAD; ?>" />
    <input type="hidden" id="URL_PROFILE_SAVE" value="<?php echo URL_PROFILE_SAVE; ?>" />
</div>
