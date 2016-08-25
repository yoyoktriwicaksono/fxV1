<?php
session_start();

require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/filter.css">
<table id="dg" toolbar="#toolbar" pagination="true" idField="IDKATEGORI"
rownumbers="true" fitColumns="false" singleSelect="true" showHeader="true" fit="true">
    <thead>
        <tr>
            <th field="IDKATEGORI" width="150" sortable="true" >Id Kategori</th>
            <th field="DESKRIPSI" width="300" sortable="true">Deskripsi</th>
        </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMD01()"><?php echo BTN_NEW; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMD01()"><?php echo BTN_EDIT; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeMD01()"><?php echo BTN_HAPUS; ?></a>
</div>

<div id="dlgmd01" class="easyui-dialog" style="width:500px;height:250px;padding:10px 20px"
                closed="true" modal="true" buttons="#dlgmd01-buttons">
        <div class="ftitle">Informasi Kategori</div>
        <form id="fm" method="post" novalidate>
                <div class="fitem">
                        <label>ID KATEGORI:</label>
                        <input id="IDKATEGORI" name="IDKATEGORI" class="easyui-validatebox textbox" style="width:260px;" required="true">
                </div>
                <div class="fitem">
                        <label>DESKRIPSI:</label>
                        <input name="DESKRIPSI" class="easyui-validatebox textbox" style="width:260px;">
                </div>
        </form>
</div>
<div id="dlgmd01-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveMD01()"><?php echo BTN_SAVE; ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgmd01').dialog('close')"><?php echo BTN_BATAL; ?></a>
</div>
<input type="hidden" id="ENTITY_KATEGORI" value="<?php echo ENTITY_KATEGORI; ?>" />
<input type="hidden" id="URL_KATEGORI_INSERT" value="<?php echo URL_KATEGORI_INSERT; ?>" />
<input type="hidden" id="URL_KATEGORI_EDIT" value="<?php echo URL_KATEGORI_EDIT; ?>" />
<input type="hidden" id="URL_KATEGORI_DELETE" value="<?php echo URL_KATEGORI_DELETE; ?>" />
<input type="hidden" id="URL_KATEGORI_LIST" value="<?php echo URL_KATEGORI_LIST; ?>" />
<input type="hidden" id="INFO_CHOOSEROWBEFOREREMOVE" value="<?php echo INFO_CHOOSEROWBEFOREREMOVE; ?>" />
<input type="hidden" id="INFO_CHOOSEROWBEFOREREEDIT" value="<?php echo INFO_CHOOSEROWBEFOREREEDIT; ?>" />
<input type="hidden" id="CONFIRM_DELETE" value="<?php echo CONFIRM_DELETE; ?>" />
<input type="hidden" id="MSG_INFORMATION" value="<?php echo MSG_INFORMATION; ?>" />
<input type="hidden" id="MSG_ERROR" value="<?php echo MSG_ERROR; ?>" />
<input type="hidden" id="MSG_WARNING" value="<?php echo MSG_WARNING; ?>" />
<script type="text/javascript" src="application/fungsi/formatter.js"></script>
<script type="text/javascript" src="js/datagrid-filter.js"></script>
<script type="text/javascript" src="application/master/md01.js"></script>