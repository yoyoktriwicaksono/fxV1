<?php
require_once (__DIR__ ."/BaseClass.php");
/**
 * @Entity @Table(name="MST_ORG")
 **/
class MSTOrg extends BaseClass {
    /**
    * @Id 
    * @Column(name="ENTITYID", type="string", length=20, nullable=false)
    */
    protected $entitiId;
    public function getId(){
        return $this->entitiId;
    }
    public function setId($entitiId){
        $this->entitiId = $entitiId;
    }
    
    /**
    * @Column(name="DESKRIPSI", type="string", length=200, nullable=false)
    */
    protected $deskripsi;
    public function getDeskripsi(){
        return $this->deskripsi;
    }
    public function setDeskripsi($deskripsi){
        $this->deskripsi = $deskripsi;
    }
    
    /**                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           b
    * @Column(name="NAMA", type="string", length=200, nullable=false)
    */
    protected $nama;
    public function getNama(){
        return $this->nama;
    }
    public function setNama($nama){
        $this->nama = $nama;
    }

}
