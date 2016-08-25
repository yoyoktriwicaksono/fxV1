<?php
require_once (__DIR__ ."/BaseClass.php");
/**
 * @Entity @Table(name="MST_GROUPMENU")
 **/
class MSTGroupmenu extends BaseClass {
    /**
    * @Id 
    * @Column(name="GROUPMENUID", type="string", length=50, nullable=false)
    */
    protected $groupmenuid;
    public function getGroupMenuId(){
        return $this->groupmenuid;
    }
    public function setGroupMenuId($groupmenuid){
        $this->groupmenuid = $groupmenuid;
    }
    
    /**
    * @Column(name="DESKRIPSI", type="string", length=255)
    */
    protected $deskripsi;
    public function getDeskripsi(){
        return $this->deskripsi;
    }
    public function setDeskripsi($deskripsi){
        $this->deskripsi = $deskripsi;
    }
    
}
