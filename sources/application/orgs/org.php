<?php
session_start();

require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<script type="text/javascript" src="application/orgs/org.js"></script>
<div style="position:relative;left:10px;top:10px;">
    <form id="fmorg" method="post" novalidate>
            <div class="fitem">
                    <label>ID Organisasi:</label>
                    <input id="ENTITYID" name="ENTITYID" class="textbox" readonly="true" value="<?php echo $_SESSION["org_id"]; ?>" style="width:270px;">
            </div>
            <div class="fitem">
                    <label>Nama:</label>
                    <input id="NAMA" name="NAMA" class="easyui-validatebox textbox" style="width:270px;" value="<?php echo $_SESSION["org_nama"]; ?>">
            </div>
            <div class="fitem">
                    <label>Deskripsi:</label>
                    <input id="DESKRIPSI" name="DESKRIPSI" class="textbox" style="width:270px;" value="<?php echo $_SESSION["org_deskripsi"]; ?>">
            </div>
    </form>
    
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveOrg()"><?php echo BTN_SAVE; ?></a>
    </div>
</div>
