<?php
require_once (__DIR__ ."/BaseClass.php");
/**
 * @Entity @Table(name="MST_KATEGORI")
 **/
class MSTKategori extends BaseClass {
    /**
    * @Id 
    * @Column(name="IDKATEGORI", type="string", length=50, nullable=false)
    */
    protected $IDKATEGORI;
    public function getId(){
        return $this->IDKATEGORI;
    }
    public function setId($idkategori){
        $this->IDKATEGORI = $idkategori;
    }
    
    /**
    * @Column(name="DESKRIPSI", type="string", length=200, nullable=false)
    */
    protected $DESKRIPSI;
    public function getDeskripsi(){
        return $this->DESKRIPSI;
    }
    public function setDeskripsi($deskripsi){
        $this->DESKRIPSI = $deskripsi;
    }
    
}
