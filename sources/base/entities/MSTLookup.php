<?php
require_once (__DIR__ ."/BaseClass.php");
/**
 * @Entity @Table(name="MST_LOOKUP")
 **/
class MSTLookup extends BaseClass
{
    /**
    * @Id 
    * @Column(name="IDLOOKUP", type="string", length=20, nullable=false)
    */
    protected $idlookup;
    
    /**
    * @Id 
    * @Column(name="IDKATEGORI", type="string", length=50, nullable=false)
    */
    protected $kategori;
 
    /**
    * @Column(name="DESKRIPSI", type="string", length=200)
    */
    protected $deskripsi;

    public function getId(){
        return $this->idlookup;
    }

    public function setId($idlookup){
        $this->idlookup = $idlookup;
    }

    public function getDeskripsi(){
        return $this->deskripsi;
    }
 
    public function setDeskripsi($deskripsi){
        $this->deskripsi = $deskripsi;
    }

    public function getKategori(){
        return $this->kategori;
    }
 
    public function setKategori($kategori){
        $this->kategori = $kategori;
    }
    
}
    