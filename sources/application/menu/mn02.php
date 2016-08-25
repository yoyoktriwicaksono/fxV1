<?php
session_start();
require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<script type="text/javascript" src="application/Menu/mn02.js"></script>
<div class="easyui-layout" fit="true">
	<div region="north" border="false" >
		<div id="toolbarmn02" >
			<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="mn02newMenu()"><?php echo BTN_NEW; ?></a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="mn02editMenu()"><?php echo BTN_EDIT; ?></a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="mn02removeMenu()"><?php echo BTN_HAPUS; ?></a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refresh()"><?php echo BTN_REFRESH_MENU; ?></a>
		</div>
	</div>
	<div region="west" split="true" border="true" style="width:400px;">
		<ul id="tmn02" lines="true" cascadeCheck="true" url="<?php echo URL_MN02_LOADMENU; ?>" ></ul>
	</div>
	<div region="center" border="false" style="background:#EAFDFF;">
        <div id="wp" title="Daftar Item Menu" fit="true" class="easyui-panel" style="background:#fafafa;height:350px;" data-options="iconCls:'',closable:false,collapsible:false,minimizable:false,maximizable:false">
            <table id="mn02dg" class="easyui-datagrid" fit="true"
                   url="<?php echo URL_MN02_LIST; ?>"
                   pagination="false" idField="IDTRTCODE"
                   rownumbers="true" fitColumns="true" singleSelect="true" showHeader="true" >
                <thead>
                <tr>
                    <th field="IDTRTCODE" width="50px" >Id</th>
                    <th field="PARENTID" width="50">Parent</th>
                    <th field="TCODEID" width="50">Tcode</th>
                    <th field="DISPLAYTEXT" width="150">Display Text</th>
                    <th field="URUTAN" width="50">Order</th>
                </tr>
                </thead>
            </table>
        </div>
	</div>
</div>
<div id="mn02dlg" class="easyui-dialog" style="width:390px;height:260px;padding:10px 20px"
     closed="true" modal="true" buttons="#dlg-buttons">
    <div class="ftitle">Informasi Node Menu</div>
    <form id="mn02fm" method="post" novalidate>
        <div class="fitem">
            <label>IDTRTCODE:</label>
            <input id="IDTRTCODE" name="IDTRTCODE" class="easyui-validatebox textbox">
        </div>
        <div class="fitem">
            <label>PARENTID:</label>
            <input id="PARENTID" name="PARENTID" class="easyui-validatebox textbox" required="true" >
        </div>
        <div class="fitem">
            <label>TCODEID:</label>
            <select id="TCODEID" name="TCODEID" style="width:100px;"></select>
        </div>
        <div class="fitem">
            <label>URUTAN:</label>
            <input name="URUTAN" class="easyui-numberbox">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="mn02saveMenu()"><?php echo BTN_SAVE; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#mn02dlg').dialog('close')"><?php echo BTN_BATAL; ?></a>
</div>
<input type="hidden" id="URL_MN02_LIST" value="<?php echo URL_MN02_LIST; ?>" />
<input type="hidden" id="URL_MN02_INSERT" value="<?php echo URL_MN02_INSERT; ?>" />
<input type="hidden" id="URL_MN02_EDIT" value="<?php echo URL_MN02_EDIT; ?>" />
<input type="hidden" id="URL_MN02_DELETE" value="<?php echo URL_MN02_DELETE; ?>" />
<input type="hidden" id="URL_ROOTID" value="<?php echo URL_ROOTID; ?>" />
<input type="hidden" id="URL_COMBO_TCODE_LOAD" value="<?php echo URL_COMBO_TCODE_LOAD; ?>" />