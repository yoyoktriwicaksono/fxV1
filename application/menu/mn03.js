var url;

$(document).ready(function(){
    /*
        Tree pada form
     */
    /*
    $('#tmn03').tree({
        onLoadSuccess:function(node,data){
            if (data.length){
                $.post('application/Menu/getrootid.php',0,function(result){
                    var id = eval(result.id);
                    var n = $('#tmn03').tree('find', id);
                    $('#tmn03').tree('select', n.target);
                    var node = $('#tmn03').tree('getSelected');
                    if (node) {
                        $('#tmn03').tree('expandAll', node.target);
                    }
                },'json');
            }
        }
    });
    */
    /*
        TREE pada dialog
     */
    $('#tmn03b').tree({
        onLoadSuccess:function(node,data){
            if (data.length){
                $.post($('#URL_ROOTID').val(),0,function(result){
                    var id = eval(result.id);
                    var n = $('#tmn03b').tree('find', id);
                    if (n) {
                        $('#tmn03b').tree('select', n.target);
                    }
                    var node = $('#tmn03b').tree('getSelected');
                    if (node) {
                        $('#tmn03b').tree('expandAll', node.target);
                    }
                },'json');
            }
        }
    });
    $('#mn03dga').datagrid({
        onSelect : function(rowIndex,rowData) {
            $('#mn03dgb').datagrid('reload',{GROUPMENUID:rowData.GROUPMENUID});
            /* Load tree in form */
            $('#tmn03').tree({
                onBeforeLoad: function (node,param) { 
                    param.GROUPMENUID=rowData.GROUPMENUID; 
                    return true;
                },
                onSelect: function(node){
                    var idtrtcode = node.id;
                    $('#mn03dgb').datagrid('selectRecord',idtrtcode);
                },
                onLoadSuccess:function(node,data){
                    if (data.length){
                        $.post($('#URL_ROOTID').val(),0,function(result){
                            var id = eval(result.id);
                            var n = $('#tmn03').tree('find', id);
                            if (n) {
                                $('#tmn03').tree('select', n.target);
                            }
                            var node = $('#tmn03').tree('getSelected');
                            if (node) {
                                $('#tmn03').tree('expandAll', node.target);
                            }
                        },'json');
                    }
                }
            });
            //$('#tmn03').tree('reload');
            /* Load tree in dialog */
            $('#tmn03b').tree({
                onBeforeLoad: function (node,param) { 
                    param.GROUPMENUID='';
                    param.SELECTEDGROUPMENUID = rowData.GROUPMENUID; 
                    return true;
                },
                onLoadSuccess:function(node,data){
                    if (data.length){
                        $.post($('#URL_ROOTID').val(),0,function(result){
                            var id = eval(result.id);
                            var n = $('#tmn03b').tree('find', id);
                            if (n) {
                                $('#tmn03b').tree('select', n.target);
                            }
                            var node = $('#tmn03b').tree('getSelected');
                            if (node) {
                                $('#tmn03b').tree('expandAll', node.target);
                            }
                        },'json');
                    }
                }
            });
        },
        url:$('#URL_MN03_LIST').val()
    });

});

function mn03newMenu(){
    /* Load tree in dialog */
    $('#tmn03b').tree({
        onBeforeLoad: function (node,param) { 
            param.GROUPMENUID=''; 
            return true;
        },
        onLoadSuccess:function(node,data){
            if (data.length){
                $.post($('#URL_ROOTID').val(),0,function(result){
                    var id = eval(result.id);
                    var n = $('#tmn03b').tree('find', id);
                    if (n) {
                        $('#tmn03b').tree('select', n.target);
                    }
                    var node = $('#tmn03b').tree('getSelected');
                    if (node) {
                        $('#tmn03b').tree('expandAll', node.target);
                    }
                },'json');
            }
        }
    });
    $('#mn03dlg').dialog('open').dialog('setTitle','New Group Menu').dialog('center');
    $('#mn03fm').form('clear');
    $('#GROUPMENUID').removeAttr("readonly");
    url = $('#URL_MN03_INSERT').val();
}

function mn03editMenu(){
    var row = $('#mn03dga').datagrid('getSelected');
    if (row){
        $('#mn03dlg').dialog('open').dialog('setTitle','Edit Group Menu').dialog('center');
        $('#GROUPMENUID').attr("readonly",true);
        url = $('#URL_MN03_EDIT').val() + '?id='+row.GROUPMENUID;
        $('#mn03fm').form('load',{GROUPMENUID:row.GROUPMENUID,DESKRIPSI:row.DESKRIPSI});
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data Daftar Group Menu yang akan diedit</b>'
        });
    }
}

function mn03saveMenu(){
    var nodes = $('#tmn03b').tree('getChecked');
    var s = '';
    for(var i=0; i<nodes.length; i++){
        if (s != '') s += ',';
        s += nodes[i].id;
    }
    $('#idnodes').val(s);
    $('#mn03fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#mn03dlg').dialog('close');		
                $('#mn03dga').datagrid('reload');	
                $('#mn03dgb').datagrid('reload');   
                $('#tmn03').tree('reload');
                $('#tmn03b').tree('reload');
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function mn03removeMenu(){
    var row = $('#mn03dga').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Group Menu?',function(r){
            if (r){
                $.post($('#URL_MN03_DELETE').val(),{GROUPMENUID:row.GROUPMENUID},function(result){
                    if (result.success){
                        $('#mn03dga').datagrid('reload');	// reload the user data
                        $('#mn03dgb').datagrid('reload');   // reload the user data
                        $('#tmn03').tree('reload');
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
            msg: '<b>Anda harus memilih data Daftar Group Menu yang akan dihapus</b>'
        });
    }
}

function mn03dgbremoveMenu(){
    var row = $('#mn03dgb').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus Item Menu?',function(r){
            if (r){
                $.post($('#URL_MN03_DELETED').val(),{ID:row.IDTRTCODE},function(result){
                    if (result.success){
                        $('#mn03dgb').datagrid('reload');	// reload the user data
                        $('#tmn03').tree('reload');
                        $('#tmn03b').tree('reload');
                        /* Load tree in form */
                        /*
                        $('#tmn03').tree({
                            onBeforeLoad: function (node,param) { 
                                param.GROUPMENUID=rowData.GROUPMENUID; 
                                return true;
                            },
                            onSelect: function(node){
                                var idtrtcode = node.id;
                                $('#mn03dgb').datagrid('selectRecord',idtrtcode);
                            },
                            onLoadSuccess:function(node,data){
                                if (data.length){
                                    $.post('application/Menu/getrootid.php',0,function(result){
                                        var id = eval(result.id);
                                        var n = $('#tmn03').tree('find', id);
                                        $('#tmn03').tree('select', n.target);
                                        var node = $('#tmn03').tree('getSelected');
                                        if (node) {
                                            $('#tmn03').tree('expandAll', node.target);
                                        }
                                    },'json');
                                }
                            }
                        });
                        */
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
            msg: '<b>Anda harus memilih data Daftar Group Menu yang akan dihapus</b>'
        });
    }
}