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
<script type="text/javascript" src="application/log/viewlog.js"></script>
<div class="easyui-layout" fit="true">
    <div region="north" border="false" >
        <div id="toolbarviewlog" >
            <!--
            <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="viewlogNew()"><?php echo BTN_NEW; ?></a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="viewlogEdit()"><?php echo BTN_EDIT; ?></a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="viewlogRemove()"><?php echo BTN_HAPUS; ?></a>
            -->
        </div>
    </div>
    <div region="center" split="true" border="true" style="background:#EAFDFF;">
        <table id="viewlogdg" toolbar="#toolbarviewlog" pagination="true" idField="ENTITYID"
               rownumbers="true" fitColumns="false" singleSelect="true"
               selectOnCheck="true" checkOnSelect="true" showHeader="true" fit="true">
            <thead>
            <tr>
                <th field="ENTITYID" width="300px"  align="left">ID</th>
                <th field="KDTPK" width="150px" align="left"  sortable="true">Kode TPK</th>
                <th field="DOC_TYPE" width="150px" sortable="true">Doc Type</th>
                <th field="DOC_SOURCE" width="150px" sortable="true">Doc Source</th>
                <th field="METHOD" width="150px" sortable="true">METHOD</th>
                <th field="REFERENCE_NBR" width="300px" sortable="true">Reference Number</th>
                <th field="KODE" width="100px" align="left"  sortable="true">Response Kode</th>
                <th field="DESKRIPSI" width="400px" sortable="true">Response Deskripsi</th>
                <th field="DETAIL" width="400px" sortable="true">Response Detail</th>
                <th field="URL" width="520px" sortable="true">URL</th>
                <th field="CREATEDDATE" width="175px" sortable="true">Tanggal (Y-M-D)</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Main Dialog -->
<div id="viewlogdlg" class="easyui-dialog" style="width:600px;height:300px;padding:10px 20px"
     closed="true" modal="true" buttons="#viewlog-dlg-buttons">
    <div class="ftitle">Informasi Mapping viewlog</div>
    <form id="viewlogfm" method="post" novalidate>
        <div class="fitem">
            <label style="width:170px;">Id :</label>
            <input id="ENTITYID" name="ENTITYID" style="width:300px;" class="easyui-validatebox textbox" required="true" >
        </div>
        <div class="fitem">
            <label style="width:170px;">YAKES Kode Sadar :</label>
            <input id="YAKES_kdSadar" name="YAKES_kdSadar" style="width:300px;" class="easyui-validatebox textbox" required="true" >
        </div>
        <div class="fitem">
            <label style="width:170px;">YAKES Nama Sadar :</label>
            <input id="YAKES_nmSadar" name="YAKES_nmSadar" style="width:300px;" class="easyui-validatebox textbox" required="true" >
        </div>
        <div class="fitem">
            <label style="width:170px;">BPJS Kode Sadar :</label>
            <input id="BPJS_kdSadar" name="BPJS_kdSadar" style="width:300px;" class="easyui-validatebox textbox" required="true" >
        </div>
        <div class="fitem">
            <label style="width:170px;">BPJS Nama Sadar :</label>
            <input id="BPJS_nmSadar" name="BPJS_nmSadar" style="width:300px;" class="easyui-validatebox textbox" required="true" >
        </div>
    </form>
</div>
<div id="viewlog-dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="viewlogsave()"><?php echo BTN_SAVE; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="viewlogCloseDialog()"><?php echo BTN_BATAL; ?></a>
</div>
