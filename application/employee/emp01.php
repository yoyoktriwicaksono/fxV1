<?php
session_start();

require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/filter.css">
<table id="dgemp01" toolbar="#toolbaremp01" pagination="true" idField="EMPLOYEEID"
rownumbers="true" fitColumns="false" singleSelect="true" showHeader="true" fit="true">
    <thead>
    <tr>
        <th field="EMPLOYEEID" width="150px" >Id Employee</th>
        <th field="NAMA" width="300px">Nama</th>
        <th field="ALAMAT" width="300px">Alamat</th>
        <th field="TMPLAHIR" width="300px">Tempat Lahir</th>
        <th field="TGLLAHIR" width="200px">Tgl. Lahir</th>
        <th field="DEPT" width="300px">Department</th>
        <th field="GHR" width="300px">Group Pegawai</th>
        <th field="TELP1" width="300px">Telp 1</th>
        <th field="TELP2" width="300px">Telp 2</th>
        <th field="EMAIL" width="300px">Email</th>
    </tr>
    </thead>
</table>
<div id="toolbaremp01">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newEmp01()"><?php echo BTN_NEW; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editEmp01()"><?php echo BTN_EDIT; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeEmp01()"><?php echo BTN_HAPUS; ?></a>
</div>

<div id="dlgemp01" class="easyui-dialog" style="width:500px;height:450px;padding:10px 20px"
     closed="true" modal="true" buttons="#dlg-buttons-supplier">
    <div class="ftitle">Informasi Employee</div>
    <form id="fmemp01" method="post" novalidate>
        <div class="easyui-tabs" >
		<div title="General" style="padding:10px;">
                    <div class="fitem">
                        <label>Id Employee:</label>
                        <input id="EMPLOYEEID" name="EMPLOYEEID" class="easyui-validatebox textbox" required="true" style="width:270px;" >
                    </div>
                    <div class="fitem">
                        <label>Nama :</label>
                        <input id="NAMA" name="NAMA" class="easyui-validatebox textbox" required="true" style="width:270px;" >
                    </div>
                    <div class="fitem">
                        <label style="vertical-align: top;">Alamat:</label>
                        <textarea name="ALAMAT" id="ALAMAT" style="width:270px;" rows="2" class="textbox"></textarea>
                    </div>
                    <div class="fitem">
                        <label style="vertical-align: top;">Tempat Lahir:</label>
                        <input name="TMPLAHIR" id="TMPLAHIR" style="width:270px;" class="textbox"></textarea>
                    </div>
                    <div class="fitem">
                        <label>Tanggal Lahir:</label>
                        <input id="TGLLAHIR" name="TGLLAHIR" class="easyui-datebox" style="width:270px;" data-options="formatter:myformatter,parser:myparser">
                    </div>
                    <div class="fitem">
                        <label>Department:</label>
                        <select id="DEPT" name="DEPT" style="width:270px;" ></select>
                    </div>
                    <div class="fitem">
                        <label>Group Pegawai:</label>
                        <select id="GHR" name="GHR" style="width:270px;" ></select>
                    </div>
                    <div class="fitem">
                        <label>Telp 1:</label>
                        <input id="TELP1" name="TELP1" class="easyui-numberbox textbox" style="width:270px;" >
                    </div>
                    <div class="fitem">
                        <label>Telp 2:</label>
                        <input id="TELP2" name="TELP2" class="easyui-numberbox textbox" style="width:270px;" >
                    </div>
                    <div class="fitem">
                        <label>Email :</label>
                        <input id="EMAIL" name="EMAIL" class="easyui-validatebox textbox" validType="email" style="width:270px;" >
                    </div>
		</div>
        <!--
		<div title="Personal" closable="false" style="padding:10px;">
		</div>
		<div title="Bank" closable="false" style="padding:10px;">
		</div>
		<div title="Payment" closable="false" style="padding:10px;">
		</div>
    -->
	</div>
    </form>
</div>
<div id="dlg-buttons-supplier">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveEmp01()"><?php echo BTN_SAVE; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="Emp01closeDialog()"><?php echo BTN_BATAL; ?></a>
</div>
<script type="text/javascript" src="application/fungsi/formatter.js"></script>
<script type="text/javascript" src="js/datagrid-filter.js"></script>
<script type="text/javascript" src="application/employee/emp01.js"></script>
