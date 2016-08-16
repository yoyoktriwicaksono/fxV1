<?php
session_start();

require_once (__DIR__ .'/../../application/configuration/global.config.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/filter.css">
<script type="text/javascript" src="application/fungsi/formatter.js"></script>
<script type="text/javascript" src="js/datagrid-filter.js"></script>
<script type="text/javascript" src="application/User/us01.js"></script>
<table id="dguser" toolbar="#toolbaruser" pagination="true" idField="IDUSER"
rownumbers="true" fitColumns="false" singleSelect="true" showHeader="true" fit="true">
    <thead>
    <tr>
        <th field="IDUSER" width="100px" >User ID</th>
        <th field="NAMA" width="300px">Nama</th>
        <th field="PASSWORD" width="300px" hidden="true">Password</th>
        <!--
        <th field="SOFF" width="200px" hidden="true">Sales Office</th>
        <th field="NAMASOFF" width="200px" >Sales Office</th>
        -->
        <th field="EMPLOYEEID" width="200px" hidden="true">Employee</th>
        <th field="NAMAEMPLOYEE" width="200px" >Employee</th>
        <th field="LANDINGPAGE" width="200px" >Landing Page</th>
        <!--
        <th field="KDTPK" width="100px" >Kode TPK</th>
        -->
        <th field="GROUPMENUID" width="200px">Group Menu</th>
    </tr>
    </thead>
</table>
<div id="toolbaruser">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">Hapus</a>
</div>

<div id="dlguser" class="easyui-dialog" style="width:550px;height:300px;padding:10px 20px"
     closed="true" modal="true" buttons="#dlg-buttons">
    <div class="ftitle">Informasi User</div>
    <form id="fmuser" method="post" novalidate>
        <div class="fitem">
            <label>User ID:</label>
            <input id="IDUSER" name="IDUSER" style="width:300px;" class="easyui-validatebox textbox" required="true">
        </div>
        <div class="fitem">
            <label>Password :</label>
            <input id="PASSWORD" name="PASSWORD" style="width:300px;" class="easyui-validatebox textbox" type="password" required="true" >
        </div>
        <div class="fitem">
            <label>Nama :</label>
            <input id="NAMA" name="NAMA" style="width:300px;" class="easyui-validatebox textbox" required="true" >
        </div>
        <!--
        <div class="fitem">
            <label>Sales Office:</label>
            <select id="SOFF" name="SOFF" style="width:100px;"></select>
        </div>
        -->
        <div class="fitem">
            <label>Employee:</label>
            <select id="EMPLOYEEID" name="EMPLOYEEID" style="width:300px;"></select>
        </div>
        <!--
        <div class="fitem">
            <label>TPK :</label>
            <select id="KDTPK" name="KDTPK" style="width:300px;"></select>
        </div>
        -->
        <div class="fitem">
            <label>Landing page:</label>
            <select id="LANDINGPAGE" name="LANDINGPAGE" style="width:300px;"></select>
        </div>
        <div class="fitem">
            <label>Group Menu:</label>
            <select id="GROUPMENUID" name="GROUPMENUID" style="width:100px;"></select>
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Simpan</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlguser').dialog('close')">Batal</a>
</div>
