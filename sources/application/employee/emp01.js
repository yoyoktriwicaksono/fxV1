$(document).ready(function(){
    var panelHeight= $('#wp').height();
    $("#dgemp01").css({
        "height" 	: (panelHeight) + "px"
    });

    $('#DEPT').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: 'service/combogrid/department.php',
        idField: 'IDLOOKUP',
        textField: 'DESKRIPSI',
        fitColumns:true,
        columns: [[
            {field:'IDLOOKUP',title:'ID',width:100},
            {field:'DESKRIPSI',title:'Deskripsi',width:200}
        ]]
    });

    $('#GHR').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: 'service/combogrid/grouphr.php',
        idField: 'IDLOOKUP',
        textField: 'DESKRIPSI',
        fitColumns:true,
        columns: [[
            {field:'IDLOOKUP',title:'ID',width:100},
            {field:'DESKRIPSI',title:'Deskripsi',width:200}
        ]]
    });

    $('#dgemp01').datagrid({
        url:"service/employee/emp01/list.php",
        remoteFilter:true
    }).datagrid("enableFilter",{remoteFilter:true});

});

var url;
function newEmp01(){
    $('#dlgemp01').dialog('open').dialog('setTitle','New Employee');
    $('#fmemp01').form('clear');
    $('#EMPLOYEEID').removeAttr("readonly");
    url = 'service/employee/emp01/insert.php';
}

function editEmp01(){
    var row = $('#dgemp01').datagrid('getSelected');
    if (row){
        $('#dlgemp01').dialog('open').dialog('setTitle','Edit Employee');
        $('#fmemp01').form('load',row);
        url = 'service/employee/emp01/edit.php?id='+row.id;
        $('#EMPLOYEEID').attr("readonly",true);
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data yang akan diedit</b>'
        });
    }
}

function saveEmp01(){
    $('#fmemp01').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#dlgemp01').dialog('close');		// close the dialog
                $('#dgemp01').datagrid('reload');	// reload the user data
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function removeEmp01(){
    var row = $('#dgemp01').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Employee '+row.EMPLOYEEID+' ?',function(r){
            if (r){
                $.post('service/employee/emp01/delete.php',{EMPLOYEEID:row.EMPLOYEEID},function(result){
                    if (result.success){
                        $('#dgemp01').datagrid('reload');	// reload the user data
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

function Emp01closeDialog() {
    $('#dlgemp01').dialog('close');
}

