$(document).ready(function(){
    var panelHeight= $('#wp').height();
    $("#dgmn01").css({
        "height" 	: (panelHeight) + "px"
    });

    $('#dgmn01').datagrid({
        url:$('#URL_MN01_LIST').val(),
        remoteFilter:true,
        pageSize:20,
        pageList: [10,20,30,40,50]
    }).datagrid("enableFilter",{remoteFilter:true});

});

var url;
function newMenu(){
	$('#dlgmn01').dialog('open').dialog('setTitle','New Menu');
	$('#fmmn01').form('clear');
	$('#IDMENU').removeAttr("readonly");
	url = $('#URL_MN01_INSERT').val();
}
function editMenu(){
	var row = $('#dgmn01').datagrid('getSelected');
	if (row){
		$('#dlgmn01').dialog('open').dialog('setTitle','Edit Menu');
		$('#fmmn01').form('load',row);
		url = $('#URL_MN01_EDIT').val() + '?id='+row.id;
		$('#IDMENU').attr("readonly",true);
	} else {
		$.messager.show({
			title: 'Informasi',
			msg: '<b>Anda harus memilih data yang akan diedit</b>'
			/*
			showType:'show',
			style:{
				right:'',
				top:document.body.scrollTop+document.documentElement.scrollTop,
				bottom:''
			}
			*/
		}); 
	}
}
function saveMenu(){
	$('#fmmn01').form('submit',{
		url: url,
		onSubmit: function(){
			return $(this).form('validate');
		},
		success: function(result){
			var result = eval('('+result+')');
			if (result.success){
				$('#dlgmn01').dialog('close');		// close the dialog
				$('#dgmn01').datagrid('reload');	// reload the user data
			} else {
				$.messager.show({
					title: 'Error',
					msg: result.msg
				});
			}
		}
	});
}
function removeMenu(){
	var row = $('#dgmn01').datagrid('getSelected');
	if (row){
		if (row.IDMENU !='ROOT') {
			$.messager.confirm('Confirm','Anda Yakin akan menghapus menu?',function(r){
				if (r){
					$.post($('#URL_MN01_DELETE').val(),{IDMENU:row.IDMENU},function(result){
						if (result.success){
							$('#dgmn01').datagrid('reload');	// reload the user data
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
			msg: '<b>Anda harus memilih data yang akan dihapus</b>'
		});
	}
}
