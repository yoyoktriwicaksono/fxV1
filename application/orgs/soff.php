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
<script type="text/javascript" src="application/orgs/soff.js"></script>
<div class="easyui-layout" fit="true">
    <div region="north" border="false" >
        <div id="toolbarsoff" >
            <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="soffNew()"><?php echo BTN_NEW; ?></a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="soffEdit()"><?php echo BTN_EDIT; ?></a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="soffRemove()"><?php echo BTN_HAPUS; ?></a>
        </div>
    </div>
    <div region="center" split="true" border="true" style="background:#EAFDFF;">
        <table id="soffdg" toolbar="#toolbarsoff" pagination="true" idField="ENTITYID"
               rownumbers="true" fitColumns="false" singleSelect="true"
               selectOnCheck="true" checkOnSelect="true" showHeader="true" fit="true">
            <thead>
            <tr>
                <th field="ENTITYID" width="100px"  align="left">ID</th>
                <th field="NAMA" width="250px" align="left" sortable="true">Nama</th>
                <th field="ALAMAT" width="250px" align="left"  sortable="true">Alamat</th>
                <th field="KOTA" width="150px" sortable="true">Kota</th>
                <th field="IDKOTA" width="150px" hidden="true">ID Kota</th>
                <th field="REGION" width="150px" sortable="true">Region</th>
                <th field="IDREGION" width="150px" hidden="true">ID Region</th>
                <th field="KODEPOS" width="150px" sortable="true">Kodepos</th>
                <th field="TELP1" width="150px" sortable="true">Telp 1</th>
                <th field="TELP2" width="150px" sortable="true">Telp 2</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Main Dialog -->
<div id="soffdlg" class="easyui-dialog" style="width:400px;height:400px;padding:10px 20px"
     closed="true" modal="true" buttons="#soff-dlg-buttons">
    <div class="ftitle">Informasi Sales Office</div>
    <form id="sofffm" method="post" novalidate>
        <div class="fitem">
            <label>Id:</label>
            <input id="ENTITYID" name="ENTITYID" class="easyui-validatebox textbox" required="true" style="width:120px;">
        </div>
        <div class="fitem">
            <label>Nama :</label>
            <input id="NAMA" name="NAMA" class="easyui-validatebox textbox" required="true" >
        </div>
        <div class="fitem">
            <label style="vertical-align: top;">Alamat:</label>
            <textarea name="ALAMAT" id="ALAMAT" style="width:200px;" rows="2" class="textbox"></textarea>
        </div>
        <div class="fitem">
            <label>Kota:</label>
            <select id="KOTA" name="KOTA" style="width:100px;"></select>
        </div>
        <div class="fitem">
            <label>Region:</label>
            <select id="REGION" name="REGION" style="width:100px;"></select>
        </div>
        <div class="fitem">
            <label>Kodepos:</label>
            <input id="KODEPOS" name="KODEPOS" class="easyui-numberbox textbox" >
        </div>
        <div class="fitem">
            <label>Telp 1:</label>
            <input id="TELP1" name="TELP1" class="easyui-numberbox textbox" >
        </div>
        <div class="fitem">
            <label>Telp 2:</label>
            <input id="TELP2" name="TELP2" class="easyui-numberbox textbox" >
        </div>
    </form>
</div>
<div id="soff-dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="soffsave()"><?php echo BTN_SAVE; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="soffCloseDialog()"><?php echo BTN_BATAL; ?></a>
</div>

<!-- Size Dialog -->
<div id="soffassignmentdlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
     closed="true" modal="true" buttons="#soffassignment-dlg-buttons">
    <div class="ftitle">Informasi Storage Location</div>
    <form id="soffassignmentfm" method="post" novalidate>
        <div class="fitem">
            <label>Id:</label>
            <input id="ID" class="textbox" name="ID" required="true" style="width:115px;">
        </div>
        <div class="fitem">
            <label>Sales Office:</label>
            <input id="SOFFID" name="SOFFID" class="textbox" required="true" style="width:215px;">
        </div>
        <div class="fitem">
            <label>Storage Location:</label>
            <select id="SLOCID" name="SLOCID" style="width:220px;" hasDownArrow="true"></select>
        </div>
    </form>
</div>
<div id="soffassignment-dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="SoffAssignmentSave()"><?php echo BTN_SAVE; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="SoffAssignmentCloseDialog()"><?php echo BTN_BATAL; ?></a>
</div>
