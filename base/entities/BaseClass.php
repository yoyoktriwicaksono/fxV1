<?php
/**
 * BaseClass
 * @author yoyok
 */
class BaseClass {
    /**
    * @Column(name="CREATEDDATE", type="datetime")
    */
    protected $createddate;
    public function getCreatedDate(){
        return $this->createddate ? clone $this->createddate : null;
    }
    public function setCreatedDate(\DateTime $createddate = null){
        $this->createddate = $createddate ? clone $createddate : null;
    }

    /**
    * @Column(name="CREATEDUSER", type="string", length=50)
    */
    protected $createduser;
    public function getCreatedUser(){
        return $this->createduser;
    }
    public function setCreatedUser($createduser){
        $this->createduser = $createduser;
    }

    /**
    * @Column(name="UPDATEDDATE", type="datetime")
    */
    protected $updateddate;
    public function getUpdatedDate(){
        return $this->updateddate ? clone $this->updateddate : null;
    }
    public function setUpdatedDate(\DateTime $updateddate = null){
        $this->updateddate = $updateddate ? clone $updateddate : null;
    }

    /**
    * @Column(name="UPDATEDUSER", type="string", length=50)
    */
    protected $updateduser;
    public function getUpdatedUser(){
        return $this->updateduser;
    }
    public function setUpdatedUser($updateduser){
        $this->updateduser = $updateduser;
    }
}
