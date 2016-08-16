<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ ."/../../bootstrap.php");

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;  
/*
$_groupmenuid = $_REQUEST['GROUPMENUID'];
if ($_groupmenuid == '') {
    $_groupmenuid = $_SESSION["groupmenuid"];
}

if ($_groupmenuid == '') {
    $sql= "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id order by urutan";
} else {
    $sql= "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b,mst_usertcode_groupmenu c where a.TCODEID=b.IDMENU and a.idtrtcode=c.idtrtcode and c.groupmenuid='$_groupmenuid' and PARENTID=$id order by urutan";
}
*/
$sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id order by urutan";
$dbh = $entityManager->getConnection();
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
        if (has_childmn02($row['IDTRTCODE'])) {
            $node['children'] = load_childmn02($row['IDTRTCODE']);
        }
	array_push($result,$node);  
}  
echo json_encode($result);  

function has_childmn02($id){  
    global $entityManager;
    $sql = "select count(*) from mst_tr_tcode where PARENTID=$id";
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    return $rows[0] > 0 ? true : false;  
}

function load_childmn02($id2) {
    global $entityManager;
    //$sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id2 order by urutan";
    $sql = "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b where a.TCODEID=b.IDMENU and PARENTID=$id2 order by urutan";
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
        if (has_childmn02($row['IDTRTCODE'])) {
            $node['children'] = load_childmn02($row['IDTRTCODE']);
        }
        array_push($hasil,$node);
    }
    return $hasil;
}

?>  