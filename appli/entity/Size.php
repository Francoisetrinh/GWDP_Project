<?php
namespace appli\entity;

class Size
{
    public const DB_WEDS_TABLE = "gwdp_size";

    /**
     * @var int $id */
    private int $id; 

    /** @var int $size_us */
    private int $size_us;

    /** @var int $size_eu */
    private int $size_eu;

    /**
     * @param array $aSizeData
     * @return void */
    public function hydrate(array $aSizeData):self
    {
        $this 
        -> setId($aSizeData['id'])
        -> setSizeUS($aSizeData['size_us'])
        -> setSizeEu($aSizeData['size_eu'])
        ;

        return $this;
    }

/***************************GETTER & SETTER **************************/

    /**
     * Get the value of id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of size_us
     * @return int
     */
    public function getSizeUs(): int
    {
        return $this->size_us;
    }

    /**
     * Set the value of size_us
     * @param int $size_us
     * @return self
     */
    public function setSizeUs(int $size_us): self
    {
        $this->size_us = $size_us;

        return $this;
    }

    /**
     * Get the value of size_eu
     * @return int
     */
    public function getSizeEu(): int
    {
        return $this->size_eu;
    }

    /**
     * Set the value of size_eu
     * @param int $size_eu
     * @return self
     */
    public function setSizeEu(int $size_eu): self
    {
        $this->size_eu = $size_eu;

        return $this;
    }
}