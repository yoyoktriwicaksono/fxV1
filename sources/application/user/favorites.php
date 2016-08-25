<?php
session_start();
require_once (__DIR__ .'/../../application/core/constants.php');
require_once (__DIR__ .'/../../application/configuration/service.config.php');
require_once (__DIR__ .'/../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../init/initialize.php');
$_SESSION["landingpage_url"] = "application/user/favorites.php";
$_SESSION["landingpage_displaytext"]="Edit Favorites";
?>
<link rel="stylesheet" type="text/css" href="css/form.css">
<script type="text/javascript" src="application/user/favorites.js"></script>
<div class="easyui-layout" fit="true">
	<div region="north" border="false" >
		<div id="toolbarfav" >
			<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="favnewMenu()">Tambah Menu Favorite</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="bpjsnewMenu()">Tambah Menu PCare</a>
		</div>
	</div>
	<div region="west" split="true" border="true" style="width:400px;">
		<ul id="tfav" lines="true" cascadeCheck="true" url="service/user/favorites/loadmenu.php" ></ul>
	</div>
    <div region="center" border="false" style="background:#EAFDFF;">
        <div class="easyui-tabs" fit="true" >
          <div title="Daftar Menu Favorites" style="padding:5px;">
            <table id="favdg" class="easyui-datagrid" fit="true"
                   url="service/user/favorites/list.php"
                   toolbar="#toolbarfavdg"
                   pagination="true" idField="FAVID"
                   rownumbers="true" fitColumns="true" singleSelect="true" showHeader="true" fit="true">
                <thead>
                    <tr>
                        <th field="FAVID" width="30px" >ID</th>
                        <th field="DISPLAYTEXT" width="150">Display Text</th>
                    </tr>
                </thead>
            </table>
            <div id="toolbarfavdg">
                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="favremoveMenu()">Hapus Menu Favorite</a>
            </div>
          </div>
          <div title="Daftar Menu PCare" style="padding:5px;">
            <table id="bpjsdg" class="easyui-datagrid" fit="true"
                   url="service/user/bpjs/list.php"
                   toolbar="#toolbarbpjsdg"
                   pagination="true" idField="FAVID"
                   rownumbers="true" fitColumns="true" singleSelect="true" showHeader="true" fit="true">
                <thead>
                    <tr>
                        <th field="FAVID" width="30px" >ID</th>
                        <th field="DISPLAYTEXT" width="150">Display Text</th>
                    </tr>
                </thead>
            </table>
            <div id="toolbarbpjsdg">
                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="bpjsremoveMenu()">Hapus Menu Bpjs</a>
            </div>
          </div>
        </div>
        <!--
        <div id="wp" title="Daftar Menu Favorites" fit="true" class="easyui-panel" style="background:#fafafa;height:350px;" data-options="iconCls:'',closable:false,collapsible:false,minimizable:false,maximizable:false">
        </div>
      -->
	</div>
</div>