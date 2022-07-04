<?php
namespace appli\entity;

class Size
{
    public const DB_WEDS_TABLE = "gwdp_size";

    /**
     * @var int $id */
    private int $id; 

    /** @var string $size_us */
    private string $size_us;

    /** @var int $size_eu */
    private int $size_eu;

    /**
     * @param array $aSizeData
     * @return void */
    public function hydrate(array $aSizeData):self
    {
        $this 
        -> setId($aSizeData['sizeId'])
        -> setSizeUS($aSizeData['sizeUs'])
        -> setSizeEu($aSizeData['sizeEu'])
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
     * @return string
     */
    public function getSizeUs(): string
    {
        return $this->size_us;
    }

    /**
     * Set the value of size_us
     * @param string $size_us
     * @return self
     */
    public function setSizeUs(string $size_us): self
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