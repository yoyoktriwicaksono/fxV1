<?php
/*
 * Validasi
 */

function IsFavoritesExist($_tcodeid,$_userId)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    $sql="select FAVID from MST_USERS_FAVORITES where Tipe='B' AND TCODEID='$_tcodeid' and IDUSER='$_userId'";
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

function IsFavoriteMenuExist($_favId)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    $sql="select FAVID from MST_USERS_FAVORITES where Tipe='B' AND FAVID='$_favId'";
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

function ValidateDeleteFavorites($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

?>