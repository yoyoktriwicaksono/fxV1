<?php
/*
 * Validasi
 */

function IsSOFFExist($_id)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    $sql="select ENTITYID from MST_SOFF where ENTITYID='$_id'";
    $sth = $dbh->prepare($sql);
	$sth->execute();
    $result = $sth->fetchAll();
	$count = $sth->rowCount();
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function ValidateDelete($_id)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

function IsSOFFAssignmentExist($_sloc,$_soff)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    $sql="select ENTITYID from STP_SOFF_SLOC where SLOCID='$_sloc' AND SOFFID='$_soff'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();
    $count = $sth->rowCount();
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

?>