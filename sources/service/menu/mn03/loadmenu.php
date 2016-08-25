<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;  
$_groupmenuid = $_REQUEST['GROUPMENUID'];
$_selectedgroupmenuid = $_REQUEST['SELECTEDGROUPMENUID'];

$dbh = $entityManager->getConnection();

/*
select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='MAPP' or b.groupmenuid is null) and b.GROUPMENUID is not null and a.PARENTID=17
 */

/*
if ($_groupmenuid == '') {
    $_groupmenuid = $_SESSION["groupmenuid"];
}

if ($_groupmenuid == '') {
    $sql= "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id order by urutan";
} else {
    $sql= "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b,mst_usertcode_groupmenu c where a.TCODEID=b.IDMENU and a.idtrtcode=c.idtrtcode and c.groupmenuid='$_groupmenuid' and PARENTID=$id order by urutan";
}

if ($_groupmenuid=='') {
    $sql = "select trmenu.*,'' GROUPMENUID from trmenu where trmenu.PARENTID=$id order by trmenu.urutan";
    $sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id order by urutan";
} else {
    $sql= "select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='$_groupmenuid' or b.groupmenuid is null) and a.PARENTID=$id";
}
*/
$sql = "select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='".$_selectedgroupmenuid."' or b.groupmenuid is null) and b.GROUPMENUID is not null and a.TIPE = 'FILE'";
$sth = $dbh->prepare($sql);
$sth->execute();
$selectedNodes = $sth->fetchAll();

if ($_groupmenuid=='') {
    $sql = "select trmenu.*,'' GROUPMENUID from trmenu where trmenu.PARENTID=$id order by trmenu.urutan";
} else {
    $sql= "select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='$_groupmenuid' or b.groupmenuid is null) and a.PARENTID=$id";
}

//$sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id order by urutan";
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$result = array();
foreach ($rows as $row) {
    $node = array();  
    $_attr = array();
    $node['id'] = $row['IDTRTCODE'];  
    $node['text'] = $row['DISPLAYTEXT'];
    if ($row['TIPE']=='FILE') {
    	$_attr['tipe'] = $row['TIPE'];
    	$_attr['url'] = $row['URL'].'?frmx='.$row['DISPLAYTEXT'];
    	$node['attributes'] = $_attr;
    } else {
    	$_attr['tipe'] = $row['TIPE'];
    	$_attr['url'] = $row['URL'];
    	$node['attributes'] = $_attr;
   	}  
   	if ($row['TIPE']=='FOLDER') {
   		$node['state'] = 'closed'; 
   	}
    if (has_childmn03($row['IDTRTCODE'])) {
        $node['children'] = load_childmn03($row['IDTRTCODE'], $selectedNodes);
    }
	array_push($result,$node);  
}  
echo json_encode($result);  

function has_childmn03($id){  
    global $entityManager;
    $sql = "select count(*) from mst_tr_tcode where PARENTID=$id";
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    return $rows[0] > 0 ? true : false;  
}

function load_childmn03($id2, $selectedNodes) {
    global $entityManager;
    //$sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id2 order by urutan";
    //$sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id2 order by urutan";
    //$hasGroupMenu = $_SESSION["groupmenuid"];
    //print_r($hasGroupMenu);
    //$_groupmenuid = $hasGroupMenu; 
    if ($_groupmenuid=='') {
        $sql = "select trmenu.*,'' GROUPMENUID from trmenu where trmenu.PARENTID=$id2 order by trmenu.urutan";
    } else {
        $sql= "select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='$_groupmenuid' or b.groupmenuid is null) and a.PARENTID=$id2";
    }
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    $hasil=array();
    foreach ($rows as $row) {
        $node = array();
        $_attr = array();
        $node['id'] = $row['IDTRTCODE'];
        $node['text'] = $row['DISPLAYTEXT'];
        //print_r($row);
        /*
        if ($row['GROUPMENUID']=='') {
            $node['checked']=false;
        } else {
            $node['checked']=true;
        }
        */
        $isChecked = false;
        foreach ($selectedNodes as $selectedNode) {
            if ($row['IDTRTCODE'] == $selectedNode['IDTRTCODE']) {
                $isChecked = true;
                break;
            }
        }
        if ($isChecked == true) {
            $node['checked'] = $isChecked;
        }
        if ($row['TIPE']=='FILE') {
            $_attr['tipe'] = $row['TIPE'];
            $_attr['url'] = $row['URL'].'?frmx='.$row['DISPLAYTEXT'];
            $node['attributes'] = $_attr;
        } else {
            $_attr['tipe'] = $row['TIPE'];
            $_attr['url'] = $row['URL'];
            $_attr['parentid'] = $row['PARENTID'];
            $_attr['urutan'] = $row['URUTAN'];
            $node['attributes'] = $_attr;
        }
        if ($row['TIPE']=='FOLDER') {
            $node['state'] = 'closed'; //has_childmn02($row['IDTRTCODE']) ? 'closed' : 'open';
        }
        //print_r($node);
        if (has_childmn03($row['IDTRTCODE'])) {
            $node['children'] = load_childmn03($row['IDTRTCODE'], $selectedNodes);
        }
        array_push($hasil,$node);
    }
    return $hasil;
}

?>  