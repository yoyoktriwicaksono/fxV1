var url;

$(document).ready(function(){
    var panelHeight= $('#wp').height();
    $("#mn02dg").css({
        "height"    : (panelHeight-45) + "px"
    });

    $('#tmn02').tree({
        onSelect: function(node){
            var idtcode = node.id;
            var header = node.text;
            var alamat = node.attributes.url; 
            var tipe = node.attributes.tipe;
            $('#mn02dg').datagrid('selectRecord',idtcode);
        },
        onLoadSuccess:function(node,data){
            if (data.length){
                $.post($('#URL_ROOTID').val(),0,function(result){
                    var id = eval(result.id);
                    var n = $('#tmn02').tree('find', id);
                    $('#tmn02').tree('select', n.target);
                    var node = $('#tmn02').tree('getSelected');
                    if (node) {
                        $('#tmn02').tree('expandAll', node.target);
                    }
                },'json');
            }
        }
    });
    $('#TCODEID').combogrid({
        panelWidth:450,
        delay: 100,
        mode: 'remote',
        url: $('#URL_COMBO_TCODE_LOAD').val(),
        idField: 'IDMENU',
        textField: 'IDMENU',
        columns: [[
            {field:'IDMENU',title:'IDMENU',width:60},
            {field:'DISPLAYTEXT',title:'DISPLAYTEXT',width:100},
            {field:'TIPE',title:'TIPE',width:120},
            {field:'URL',title:'URL',width:100}
        ]]
    });
});

function mn02newMenu(){
    var node = $('#tmn02').tree('getSelected');
    if (node){
        var tipe = node.attributes.tipe;
        if (tipe =='FOLDER') {
            $('#mn02dlg').dialog('open').dialog('setTitle','New Node Menu').dialog('center');
            $('#mn02fm').form('clear');
            $('#mn02fm').form('load',{IDTRTCODE:'AUTO',PARENTID:node.id});
            $('#mn02fm #IDTRTCODE').attr("readonly",true);
            $('#mn02fm #PARENTID').attr("readonly",true);
            url = $('#URL_MN02_INSERT').val();
        } else {
            $.messager.alert('Warning','Anda harus memilih Folder Menu bukan File','warning');
        }
    } else {
        $.messager.alert('Warning','Anda harus memilih Folder Menu sebelum menambahkan Node Menu','warning');
    }
}

function mn02editMenu(){
    var row = $('#mn02dg').datagrid('getSelected');
    if (row){
        $('#mn02dlg').dialog('open').dialog('setTitle','Edit Node Menu').dialog('center');
        $('#mn02fm').form('load',{IDTRTCODE:row.IDTRTCODE,PARENTID:row.PARENTID,TCODEID:row.TCODEID,URUTAN:row.URUTAN});
        url = $('#URL_MN02_EDIT').val() + '?id='+row.IDTRTCODE;
        $('#mn02fm #IDTRTCODE').attr("readonly",true);
        $('#mn02fm #PARENTID').removeAttr("readonly");
        if ($.trim(row.TCODEID)=='ROOT') {
            $('#mn02fm #TCODEID').attr("readonly",true);
        } else {
            $('#mn02fm #TCODEID').removeAttr("readonly");
        }
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih data yang akan diedit</b>'
        });
    }
}

function mn02saveMenu(){
    $('#mn02fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#mn02dlg').dialog('close');		// close the dialog
                $('#mn02dg').datagrid('reload');	// reload the user data
                $('#tmn02').tree('reload');
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function mn02removeMenu(){
    var row = $('#mn02dg').datagrid('getSelected');
    if (row){
        if (row.TCODEID !='ROOT') {
            $.messager.confirm('Confirm','Anda Yakin akan menghapus node menu?',function(r){
                if (r){
                    $.post($('#URL_MN02_DELETE').val(),{IDTRTCODE:row.IDTRTCODE},function(result){
                        if (result.success){
                            $('#mn02dg').datagrid('reload');	// reload the user data
                            refresh();
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
            $.messager.alert('Warning','Root Menu Tidak bisa dihapus','warning');
        }
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih node menu yang akan dihapus</b>'
        });
    }
}

function refresh(){
    $.post($('#URL_ROOTID').val(),0,function(result){
        if (result.id){
            var id = eval(result.id);
            var n = $('#tmn02').tree('find', id);
            $('#tmn02').tree('select', n.target);
            var node = $('#tmn02').tree('getSelected');
            if (node){
                $('#tmn02').tree('reload', node.target);
            } else {
                $('#tmn02').tree('reload');
            }
        } else {
            $.messager.show({
                title: 'Error',
                msg: result.msg
            });
        }
    },'json');
}