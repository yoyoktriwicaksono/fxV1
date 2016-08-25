    $(document).ready(function(){
        var panelHeight= $('#wp').height();
        var panelWidth= $('#wp').width();
        $("#dg").css({
            "height" 	: (panelHeight) + "px",
            "width" 	: (panelWidth) + "px"
        });

        $('#IDKATEGORI').combogrid({
            panelWidth:450,
            delay: 100,
            mode: 'remote',
            url: 'service/combogrid/kategori.php',
            idField: 'IDKATEGORI',
            textField: 'IDKATEGORI',
            columns: [[
                {field:'IDKATEGORI',title:'IDKATEGORI',width:100},
                {field:'DESKRIPSI',title:'DESKRIPSI',width:120}
            ]]
        });
        
        $('#dg').datagrid({
        	url:'service/master/md02/list.php',
            remoteFilter:true,
            pageSize:20,
            pageList: [10,20,30,40,50]
        }).datagrid("enableFilter",{remoteFilter:true});

    });

	var url;
	function newMD02(){
		$('#dlgmd02').dialog('open').dialog('setTitle','New Lookup');
		$('#fmmd02').form('clear');
		$('#IDLOOKUP').removeAttr("readonly");
		url = 'service/master/md02/insert.php';
	}
	function editMD02(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			$('#dlgmd02').dialog('open').dialog('setTitle','Edit Lookup');
			$('#fmmd02').form('load',row);
			url = 'service/master/md02/edit.php?id='+row.id;
			$('#IDLOOKUP').attr("readonly",true);
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
	function saveMD02(){
		$('#fmmd02').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#dlgmd02').dialog('close');		// close the dialog
					$('#dg').datagrid('reload');	// reload the user data
				} else {
					$.messager.show({
						title: 'Error',
						msg: result.msg
					});
				}
			}
		});
	}
	function removeMD02(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			$.messager.confirm('Confirm','Anda Yakin akan menghapus Lookup?',function(r){
				if (r){
					$.post('service/master/md02/delete.php',{IDLOOKUP:row.IDLOOKUP},function(result){
						if (result.success){
							$('#dg').datagrid('reload');	// reload the user data
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
