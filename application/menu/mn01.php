<?php
session_start();

require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/filter.css">
<script type="text/javascript" src="application/fungsi/formatter.js"></script>
<script type="text/javascript" src="js/datagrid-filter.js"></script>
<script type="text/javascript" src="application/menu/mn01.js"></script>
<table id="dgmn01" fit="true"
toolbar="#toolbarmn01" pagination="true" idField="IDMENU"
rownumbers="true" fitColumns="true" singleSelect="true" showHeader="true">
<thead>
	<tr>
		<th field="IDMENU" width="50" sortable="true">Id Menu</th>
		<th field="DISPLAYTEXT" width="100" sortable="true">Display Text</th>
		<th field="FORMAPLIKASI" width="50" hidden="true" >Form Aplikasi</th>
		<th field="TIPE" width="50" sortable="true">Tipe</th>
		<th field="IMAGE" width="50" hidden="true" >Image</th>
		<th field="PARAMETERFORM" width="50" hidden="true" >Parameter Form</th>
		<th field="GUIID" width="50" hidden="true" >GUI Id</th>
		<th field="URL" width="120" sortable="true">Url</th>
	</tr>
</thead>
</table>
<div id="toolbarmn01">
	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()"><?php echo BTN_NEW; ?></a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()"><?php echo BTN_EDIT; ?></a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeMenu()"><?php echo BTN_HAPUS; ?></a>
</div>
<div id="dlgmn01" class="easyui-dialog" style="width:500px;height:250px;padding:10px 20px"
		closed="true" modal="true" buttons="#dlgmn01-buttons">
	<div class="ftitle">Informasi Menu</div>
	<form id="fmmn01" method="post" novalidate>
		<div class="fitem">
			<label>ID MENU:</label>
			<input id="IDMENU" name="IDMENU" style="width:300px;" class="easyui-validatebox textbox" required="true">
		</div>
		<div class="fitem">
			<label>DISPLAYTEXT:</label>
			<input name="DISPLAYTEXT" style="width:300px;" class="easyui-validatebox textbox" required="true" style="width:200px;">
		</div>
		<!-- 
		<div class="fitem">
			<label>FORMAPLIKASI:</label>
			<input name="FORMAPLIKASI" class="textbox">
		</div>
		-->
		<div class="fitem">
			<label>TIPE:</label>
		<input id="TIPE" name="TIPE" style="width:300px;" class="easyui-combobox" data-options="
				valueField: 'label',
				textField: 'value',
				data: [{
					label: 'FOLDER',
					value: 'FOLDER'
				},{
					label: 'FILE',
					value: 'FILE'
				}]" />
		</div>
		<!--  
		<div class="fitem">
			<label>IMAGE:</label>
			<input name="IMAGE" class="textbox">
		</div>
		<div class="fitem">
			<label>PARAMETERFORM:</label>
			<input name="PARAMETERFORM" class="textbox">
		</div>
		<div class="fitem">
			<label>GUIID:</label>
			<input name="GUIID" class="textbox">
		</div>
		-->
		<div class="fitem">
			<label>URL:</label>
			<input name="URL" style="width:300px;" class="easyui-validatebox textbox" style="width:250px;">
		</div>
	</form>
</div>
<div id="dlgmn01-buttons">
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveMenu()"><?php echo BTN_SAVE; ?></a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgmn01').dialog('close')"><?php echo BTN_BATAL; ?></a>
</div>
<input type="hidden" id="URL_MN01_LIST" value="<?php echo URL_MN01_LIST; ?>" />
<input type="hidden" id="URL_MN01_INSERT" value="<?php echo URL_MN01_INSERT; ?>" />
<input type="hidden" id="URL_MN01_EDIT" value="<?php echo URL_MN01_EDIT; ?>" />
<input type="hidden" id="URL_MN01_DELETE" value="<?php echo URL_MN01_DELETE; ?>" />