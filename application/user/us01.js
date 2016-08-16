    $(document).ready(function(){
        var panelHeight= $('#wp').height();
        $("#dguser").css({
            "height" 	: (panelHeight) + "px"
        });

        /*
        
        $('#SOFF').combogrid({
            panelWidth:450,
            delay: 100,
            mode: 'remote',
            url: 'application/User/us01_soff_load.php',
            idField: 'ENTITYID',
            textField: 'NAMA',
            fitColumns:true,
            columns: [[
                {field:'ENTITYID',title:'ID',width:100},
                {field:'NAMA',title:'Nama',width:200}
            ]]
        });
        */
        $('#EMPLOYEEID').combogrid({
            panelWidth:450,
            delay: 100,
            mode: 'remote',
            url: 'service/combogrid/employee.php',
            idField: 'EMPLOYEEID',
            textField: 'NAMA',
            fitColumns:true,
            columns: [[
                {field:'EMPLOYEEID',title:'ID',width:100},
                {field:'NAMA',title:'Nama',width:200}
            ]]
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
        */
        $('#LANDINGPAGE').combogrid({
            panelWidth:450,
            delay: 100,
            mode: 'remote',
            url: 'service/combogrid/landingpage.php',
            idField: 'IDMENU',
            textField: 'DISPLAYTEXT',
            fitColumns:true,
            columns: [[
                {field:'IDMENU',title:'ID',width:100},
                {field:'DISPLAYTEXT',title:'Display Text',width:200}
            ]]
        });

        $('#GROUPMENUID').combogrid({
            panelWidth:450,
            delay: 100,
            mode: 'remote',
            url: 'service/combogrid/groupmenu.php',
            idField: 'GROUPMENUID',
            textField: 'DESKRIPSI',
            fitColumns:true,
            columns: [[
                {field:'GROUPMENUID',title:'ID',width:100},
                {field:'DESKRIPSI',title:'Deskripsi',width:200}
            ]]
        });

        $('#dguser').datagrid({
            url:'service/user/us01/list.php',
            remoteFilter:true
        }).datagrid("enableFilter",{remoteFilter:true});
        
    });

    var url;
    function newUser(){
        $('#dlguser').dialog('open').dialog('setTitle','New User');
        $('#fmuser').form('clear');
        $('#IDUSER').removeAttr("readonly");
        $('#PASSWORD').removeAttr("readonly");
        url = 'service/user/us01/insert.php';
    }
    function editUser(){
        var row = $('#dguser').datagrid('getSelected');
        if (row){
            if (row.IDUSER !=='super') {
                $('#dlguser').dialog('open').dialog('setTitle','Edit User');
                $('#fmuser').form('load',row);
                url = 'service/user/us01/edit.php?id='+row.id;
                $('#IDUSER').attr("readonly",true);
                $('#PASSWORD').attr("readonly",true);
            } else {
                $.messager.show({
                    title: 'Informasi',
                    msg: '<b>Super User Tidak boleh diedit</b>'
                });
            }
        } else {
            $.messager.show({
                title: 'Informasi',
                msg: '<b>Anda harus memilih data yang akan diedit</b>'
            });
        }
    }
    function saveUser(){
        $('#fmuser').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    $('#dlguser').dialog('close');		// close the dialog
                    $('#dguser').datagrid('reload');	// reload the user data
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: result.msg
                    });
                }
            }
        });
    }
    function removeUser(){
        var row = $('#dguser').datagrid('getSelected');
        if (row){
            if (row.IDUSER !=='super') {
                $.messager.confirm('Confirm','Anda Yakin akan menghapus User?',function(r){
                    if (r){
                        $.post('service/user/us01/delete.php',{IDUSER:row.IDUSER},function(result){
                            if (result.success){
                                $('#dguser').datagrid('reload');	// reload the user data
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
                    msg: '<b>Super User Tidak boleh dihapus</b>'
                });
            }
        } else {
            $.messager.show({
                title: 'Informasi',
                msg: '<b>Anda harus memilih data yang akan dihapus</b>'
            });
        }
    }
