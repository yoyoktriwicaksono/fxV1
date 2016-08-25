<?php
session_start();

require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/filter.css">
<table id="dg" toolbar="#toolbar" pagination="true" idField="IDLOOKUP"
    rownumbers="true" fitColumns="false" singleSelect="true" showHeader="true" fit="true">
    <thead>
        <tr>
            <th field="IDLOOKUP" width="100" sortable="true">Id Lookup</th>
            <th field="DESKRIPSI" width="200" sortable="true">Deskripsi</th>
            <th field="IDKATEGORI" width="100" sortable="true">Id Kategori</th>
            <th field="KATEGORI" width="300" sortable="true">Kategori</th>
        </tr>
    </thead>
</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMD02()">New</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMD02()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeMD02()">Hapus</a>
	</div>

	<div id="dlgmd02" class="easyui-dialog" style="width:500px;height:300px;padding:10px 20px"
			closed="true" modal="true" buttons="#dlgmd02-buttons">
		<div class="ftitle">Informasi Menu</div>
		<form id="fmmd02" method="post" novalidate>
			<div class="fitem">
				<label>ID LOOKUP:</label>
				<input id="IDLOOKUP" name="IDLOOKUP" class="easyui-validatebox textbox" style="width:270px;" required="true">
			</div>
			<div class="fitem">
				<label>DESKRIPSI:</label>
				<input name="DESKRIPSI" class="easyui-validatebox textbox" style="width:270px;">
			</div>
	        <div class="fitem">
	            <label>IDKATEGORI:</label>
	            <select id="IDKATEGORI" name="IDKATEGORI" style="width:270px;"></select>
	        </div>
		</form>
	</div>
	<div id="dlgmd02-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveMD02()">Simpan</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgmd02').dialog('close')">Batal</a>
	</div>
<script type="text/javascript" src="application/fungsi/formatter.js"></script>
<script type="text/javascript" src="js/datagrid-filter.js"></script>
<script type="text/javascript" src="application/Master/md02.js"></script>
