<?php
session_start();
require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<script type="text/javascript" src="application/Menu/mn03.js"></script>
<div class="easyui-layout" fit="true">
    <div region="north" border="false" >
        <div id="toolbarmn03" >
            <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="mn03newMenu()"><?php echo BTN_NEW; ?></a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="mn03editMenu()"><?php echo BTN_EDIT; ?></a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="mn03removeMenu()"><?php echo BTN_HAPUS; ?></a>
        </div>
    </div>
    <div region="west" split="true" border="true" style="width:400px;">
        <ul id="tmn03" lines="true" checkbox="false" cascadeCheck="true" url="<?php echo URL_MN03_LOADGROUPMENU; ?>"></ul>
    </div>
    <div region="center" border="false" style="background:#EAFDFF;">
        <div class="easyui-layout" fit="true">
            <div region="north" border="false" split="true" style="height:250px">
                <div id="wpmn03a" title="Daftar Group Menu" fit="true" class="easyui-panel" style="background:#fafafa;" data-options="iconCls:'',closable:false,collapsible:false,minimizable:false,maximizable:false">
                    <table id="mn03dga" class="easyui-datagrid" style="height:240px"
                           pagination="false" idField="IDTRTCODE"
                           rownumbers="true" fitColumns="true" singleSelect="true" showHeader="true" fit="true">
                        <thead>
                        <tr>
                            <th field="GROUPMENUID" width="150px" >Group Menu</th>
                            <th field="DESKRIPSI" width="230px">Deskripsi</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div region="center" border="false" style="background:#EAFDFF;">
                <div id="wpmn03b" title="Daftar Detail Item Menu" fit="true" class="easyui-panel" style="background:#fafafa;" data-options="iconCls:'',closable:false,collapsible:false,minimizable:false,maximizable:false">
                    <table id="mn03dgb" class="easyui-datagrid" style="height:350px"
                           url="<?php echo URL_MN03_LISTD; ?>"
                           toolbar="#toolbarmn03dgb"
                           pagination="false" idField="IDTRTCODE"
                           rownumbers="true" fitColumns="true" singleSelect="true" showHeader="true" fit="true">
                        <thead>
                        <tr>
                            <th field="GROUPMENUID" width="50">Group Menu</th>
                            <th field="IDTRTCODE" width="50">ID</th>
                        </tr>
                        </thead>
                    </table>
                    <div id="toolbarmn03dgb">
                            <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="mn03dgbremoveMenu()"><?php echo BTN_HAPUS; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mn03dlg" class="easyui-dialog" style="width:500px;height:500px;padding:10px 20px"
     closed="true" modal="true" buttons="#mn03-dlg-buttons">
    <div class="ftitle">Informasi Node Menu</div>
    <form id="mn03fm" method="post" novalidate>
        <div class="fitem">
            <label>Group Menu ID:</label>
            <input id="GROUPMENUID" name="GROUPMENUID" class="easyui-validatebox textbox" required="true">
        </div>
        <div class="fitem">
            <label>Deskripsi:</label>
            <textarea id="DESKRIPSI" name="DESKRIPSI" style="width:440px;height:40px;" rows="3" class="textbox"></textarea>
            <input type="hidden" id="idnodes" name="idnodes">
        </div>
        <div class="fitem">
            <label>Daftar Menu:</label>
            <div id="wpmn03bd" fit="false" class="easyui-panel" style="background:#fafafa;width:445px;height:240px;" data-options="iconCls:'',closable:false,collapsible:false,minimizable:false,maximizable:false">
            <ul id="tmn03b" lines="true" checkbox="true" cascadeCheck="true" url="<?php echo URL_MN03_LOADMENU; ?>" ></ul>
            </div>
        </div>
    </form>
</div>
<div id="mn03-dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="mn03saveMenu()"><?php echo BTN_SAVE; ?></a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#mn03dlg').dialog('close')"><?php echo BTN_BATAL; ?></a>
</div>
<input type="hidden" id="URL_MN03_LIST" value="<?php echo URL_MN03_LIST; ?>" />
<input type="hidden" id="URL_MN03_LISTD" value="<?php echo URL_MN03_LISTD; ?>" />
<input type="hidden" id="URL_MN03_INSERT" value="<?php echo URL_MN03_INSERT; ?>" />
<input type="hidden" id="URL_MN03_EDIT" value="<?php echo URL_MN03_EDIT; ?>" />
<input type="hidden" id="URL_MN03_DELETE" value="<?php echo URL_MN03_DELETE; ?>" />
<input type="hidden" id="URL_MN03_DELETED" value="<?php echo URL_MN03_DELETED; ?>" />
<input type="hidden" id="URL_ROOTID" value="<?php echo URL_ROOTID; ?>" />