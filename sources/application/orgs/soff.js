$(document).ready(function(){
    var mainPanelHeight= $("#wp").height()-280;
    var mainPanelWidth= $("#wp").width()-5;
    $("#soffdg").css({
        "height" 	: (mainPanelHeight) + "px"
    });
    $("#soffdg").css({
        "width" 	: (mainPanelWidth) + "px"
    });

    $('#KOTA').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: 'service/combogrid/kota.php',
        idField: 'IDLOOKUP',
        textField: 'DESKRIPSI',
        fitColumns:true,
        columns: [[
            {field:'IDLOOKUP',title:'ID',width:100},
            {field:'DESKRIPSI',title:'Deskripsi',width:200}
        ]]
    });

    $('#REGION').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: 'service/combogrid/region.php',
        idField: 'IDLOOKUP',
        textField: 'DESKRIPSI',
        fitColumns:true,
        columns: [[
            {field:'IDLOOKUP',title:'ID',width:100},
            {field:'DESKRIPSI',title:'Deskripsi',width:200}
        ]]
    });

    $('#SLOCID').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: 'service/combogrid/sloc.php',
        idField: 'ENTITYID',
        textField: 'NAMA',
        fitColumns:true,
        columns: [[
            {field:'ENTITYID',title:'ID',width:100},
            {field:'NAMA',title:'Storage Location',width:200}
        ]]
    });

    $('#soffdg').datagrid({
        url:'service/orgs/soff/list.php',
        remoteFilter:true,
        onSelect : function(rowIndex,rowData) {
            $('#soffassignmentdg').datagrid('reload',{IDSOFF:rowData.ENTITYID});
        }
    }).datagrid("enableFilter",{remoteFilter:true});

    $('#soffassignmentdg').datagrid({
        url:'service/orgs/soff/soffassignment_list.php'
    });

});

var url;
function soffNew(){
    $('#soffdlg').dialog('open').dialog('setTitle','New Sales Office');
    $('#sofffm').form('clear');
    $('#ENTITYID').removeAttr("readonly");
    //$('#ENTITYID').val("NEW");
    //$('#ENTITYID').attr("readonly",true);
    url = 'service/orgs/soff/insert.php';
}

function soffEdit(){
    var row = $('#soffdg').datagrid('getSelected');
    if (row){
        $('#soffdlg').dialog('open').dialog('setTitle','Edit Sales Office');
        $('#sofffm').form('load',row);
        url = 'service/orgs/soff/edit.php?id='+row.id;
        $('#ENTITYID').attr("readonly",true);
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data yang akan diedit</b>'
        });
    }
}

function soffsave(){
    $('#sofffm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#soffdlg').dialog('close');		// close the dialog
                $('#soffdg').datagrid('reload');	// reload the user data
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function soffRemove(){
    var row = $('#soffdg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Sales Office?',function(r){
            if (r){
                $.post('service/orgs/soff/delete.php',{ENTITYID:row.ENTITYID},function(result){
                    if (result.success){
                        $('#soffdg').datagrid('reload');	// reload the user data
                        $('#soffassignmentdg').datagrid('reload');
                    } else {
                        $.messager.show({	// show error message
                            title: 'Error',
                            msg: result.msg
                        });
                    }
                },'json');
            }
        });
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data yang akan dihapus</b>'
        });
    }
}

function newSoffAssignment() {
    var row = $('#soffdg').datagrid('getSelected');
    if (row){
        $('#soffassignmentdlg').dialog('open').dialog('setTitle','New Warehouse Assignment').dialog('center');
        $('#soffassignmentfm').form('clear');
        $('#ID').val('AUTO');
        $('#ID').attr("readonly",true);
        $('#SOFFID').val(row.ENTITYID);
        $('#SOFFID').attr("readonly",true);
        url = 'service/orgs/soff/soffassigment_insert.php';
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data Sales Office</b>'
        });
    }
}

function editSoffAssignment(){
    var row = $('#soffassignmentdg').datagrid('getSelected');
    if (row){
        $('#soffassignmentdlg').dialog('open').dialog('setTitle','Edit Warehouse Assignment').dialog('center');
        $('#soffassignmentfm').form('clear');
        $('#ID').val(row.ID);
        $('#ID').attr("readonly",true);
        $('#IDSOFF').val(row.SOFFID);
        $('#IDSOFF').attr("readonly",true);
        url = 'service/orgs/soff/soffassigment_edit.php';
        $('#soffassignmentfm').form('load',row);
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data Warehouse Assignment</b>'
        });
    }
}

function SoffAssignmentSave(){
    $('#soffassignmentfm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#soffassignmentdlg').dialog('close');		
                $('#soffassignmentdg').datagrid('reload');	
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function removeSoffAssignment(){
    var row = $('#soffassignmentdg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Sloc Assignment ?',function(r){
            if (r){
                $.post('service/orgs/soff/soffassignment_delete.php',{ID:row.ID},function(result){
                    if (result.success){
                        $('#soffassignmentdg').datagrid('reload');	
                    } else {
                        $.messager.show({	
                            title: 'Error',
                            msg: result.msg
                        });
                    }
                },'json');
            }
        });
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data Sloc Assignment yang akan dihapus</b>'
        });
    }
}

function soffCloseDialog() {
    $('#soffdlg').dialog('close');
}

function SoffAssignmentCloseDialog() {
    $('#soffassignmentdlg').dialog('close');
}
