<?php
session_start();

require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

define("TABLENAME", "MST_SOFF");

$filterRules = isset($_POST['filterRules']) ? ($_POST['filterRules']) : '';
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'ENTITYID';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';

$_page = isset($_POST['page']) ? intval($_POST['page']) : DEFAULTPAGE;
$_rows = isset($_POST['rows']) ? intval($_POST['rows']) : DEFAULTPAGING;

$sqlcount="select count(*) as TOTAL from ".TABLENAME;

if (!empty($filterRules)){
    $sql = "SELECT * FROM ".TABLENAME;
    $filterRules = json_decode($filterRules);
    $isfirst=true;
    foreach($filterRules as $rule){
        $rule = get_object_vars($rule);
        $field = $rule['field'];
        $op = $rule['op'];
        $value = strtoupper($rule['value']);
        if (!empty($value)){
                if ($op == 'contains'){
                    if ($isfirst==true) {
                        $sql .= " where (UPPER($field) like '%$value%')";
                        $sqlcount .= " where (UPPER($field) like '%$value%')";
                    } else {
                        $sql .= " and (UPPER($field) like '%$value%')";
                        $sqlcount .= " and (UPPER($field) like '%$value%')";
                    }
                }
        }
        $isfirst=false;
    }
    $sql .= " ORDER BY ".$sort." ".$order;
    $sql .= " LIMIT ".(($_page - 1)* $_rows).", ".$_rows;
} else {
    $sql = "SELECT * FROM ".TABLENAME." ORDER BY ".$sort." ".$order." LIMIT ".(($_page - 1)* $_rows).", ".$_rows;
}

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare($sqlcount);
$sth->execute();
$rows = $sth->fetchAll();
$result["total"] = $rows[0]['TOTAL'];

$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$data = array();
foreach ($rows as $row) {
    array_push($data, $row);
}
$result["rows"] = $data;
echo json_encode($result);
?>