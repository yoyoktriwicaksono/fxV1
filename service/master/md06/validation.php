<?php
/*
 * Validasi
 */

function IsSizeGroupExist($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();
    if ($_entityid != 'NEW') {
        //Validate on Lookup
        $sql="select ID from INV_SIZE_GROUP where ID='$_entityid'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function IsSizeGroupDetailExist($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();
    if ($_entityid != 'AUTO') {
        //Validate on Lookup
        $sql="select IDDETAIL from INV_SIZE_GROUP_DETAIL where IDDETAIL='$_entityid'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function ValidateMainDelete($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

function ValidateDetailDelete($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

?>