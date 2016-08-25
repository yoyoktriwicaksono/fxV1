$(document).ready(function(){
    var mainPanelHeight= $("#wp").height()-280;
    var mainPanelWidth= $("#wp").width()-5;
    $("#viewlogdg").css({
        "height" 	: (mainPanelHeight) + "px"
    });
    $("#viewlogdg").css({
        "width" 	: (mainPanelWidth) + "px"
    });

    /*
    $('#KDTPK').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: 'service/combogrid/tpk.php',
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
    */
    $('#viewlogdg').datagrid({
        url:'service/log/viewlog/list.php',
        remoteFilter:true,
        pageSize:20,
        pageList: [10,20,30,40,50]        
    }).datagrid("enableFilter",{remoteFilter:true});

    /*
    $('#viewlogassignmentdg').datagrid({
        url:'service/orgs/viewlog/viewlogassignment_list.php'
    });
    */
});

var url;
function viewlogNew(){
    $('#viewlogdlg').dialog('open').dialog('setTitle','New Mapping viewlog');
    $('#viewlogfm').form('clear');
    $('#ENTITYID').removeAttr("readonly");
    $('#ENTITYID').val("AUTO");
    $('#ENTITYID').attr("readonly",true);
    url = 'service/viewlog/viewlog/insert.php';
}

function viewlogEdit(){
    var row = $('#viewlogdg').datagrid('getSelected');
    if (row){
        $('#viewlogdlg').dialog('open').dialog('setTitle','Edit Mapping viewlog');
        $('#viewlogfm').form('load',row);
        url = 'service/mapping/viewlog/edit.php?id='+row.id;
        $('#ENTITYID').attr("readonly",true);
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data yang akan diedit</b>'
        });
    }
}

function viewlogsave(){
    $('#viewlogfm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#viewlogdlg').dialog('close');		// close the dialog
                $('#viewlogdg').datagrid('reload');	// reload the user data
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function viewlogRemove(){
    var row = $('#viewlogdg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Mapping viewlog?',function(r){
            if (r){
                $.post('service/mapping/viewlog/delete.php',{ENTITYID:row.ENTITYID},function(result){
                    if (result.success){
                        $('#viewlogdg').datagrid('reload');	// reload the user data
                        $('#viewlogassignmentdg').datagrid('reload');
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

function viewlogCloseDialog() {
    $('#viewlogdlg').dialog('close');
}

/*
function newviewlogAssignment() {
    var row = $('#viewlogdg').datagrid('getSelected');
    if (row){
        $('#viewlogassignmentdlg').dialog('open').dialog('setTitle','New Warehouse Assignment').dialog('center');
        $('#viewlogassignmentfm').form('clear');
        $('#ID').val('AUTO');
        $('#ID').attr("readonly",true);
        $('#viewlogID').val(row.ENTITYID);
        $('#viewlogID').attr("readonly",true);
        url = 'service/orgs/viewlog/viewlogassigment_insert.php';
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data Sales Office</b>'
        });
    }
}

function editviewlogAssignment(){
    var row = $('#viewlogassignmentdg').datagrid('getSelected');
    if (row){
        $('#viewlogassignmentdlg').dialog('open').dialog('setTitle','Edit Warehouse Assignment').dialog('center');
        $('#viewlogassignmentfm').form('clear');
        $('#ID').val(row.ID);
        $('#ID').attr("readonly",true);
        $('#IDviewlog').val(row.viewlogID);
        $('#IDviewlog').attr("readonly",true);
        url = 'service/orgs/viewlog/viewlogassigment_edit.php';
        $('#viewlogassignmentfm').form('load',row);
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data Warehouse Assignment</b>'
        });
    }
}

function viewlogAssignmentSave(){
    $('#viewlogassignmentfm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#viewlogassignmentdlg').dialog('close');		
                $('#viewlogassignmentdg').datagrid('reload');	
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function removeviewlogAssignment(){
    var row = $('#viewlogassignmentdg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Sloc Assignment ?',function(r){
            if (r){
                $.post('service/orgs/viewlog/viewlogassignment_delete.php',{ID:row.ID},function(result){
                    if (result.success){
                        $('#viewlogassignmentdg').datagrid('reload');	
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

function viewlogAssignmentCloseDialog() {
    $('#viewlogassignmentdlg').dialog('close');
}
*/