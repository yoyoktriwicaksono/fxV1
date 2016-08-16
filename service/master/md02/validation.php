<?php
/*
 * Validasi
 */

function IsLookupExist($_idlookup)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    //Validate on Lookup
    $sql="select IDLOOKUP from mst_lookup where IDLOOKUP='$_idlookup'";
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

function ValidateDelete($_idlookup)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

?>