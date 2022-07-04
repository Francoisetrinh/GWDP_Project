<?php
namespace appli\entity;

class Order
{
    public const DB_WEDS_TABLE = "gwdp_orders";

    private int $id;
    private User $user;
    private string $flags;
    private \DateTime $date;
    private \DateTime $dateQuote;

    /**
     * @param array $aOrderData
     * @return void */
    public function hydrate(array $aOrderData):self
    {
        $dateOrder = new \DateTime($aOrderData['dateOrder']);
        $dateOrderQuote = new \DateTime($aOrderData['dateOrderQuote']);

        $this 
        -> setId($aOrderData['orderId'])
        -> setUser($aOrderData['user'])
        -> setFlags($aOrderData['flags'])
        -> setDate($dateOrder)
        -> setDateQuote($dateOrderQuote)
        ;

        return $this;
    }

/***************************GETTER & SETTER **************************/

    

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param User $user
     *
     * @return self
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of flags
     *
     * @return string
     */
    public function getFlags(): string
    {
        return $this->flags;
    }

    /**
     * Set the value of flags
     *
     * @param string $flags
     *
     * @return self
     */
    public function setFlags(string $flags): self
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * Get the value of date
     *
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param \DateTime $date
     *
     * @return self
     */
    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of dateQuote
     *
     * @return \DateTime
     */
    public function getDateQuote(): \DateTime
    {
        return $this->dateQuote;
    }

    /**
     * Set the value of dateQuote
     *
     * @param \DateTime $dateQuote
     *
     * @return self
     */
    public function setDateQuote(\DateTime $dateQuote): self
    {
        $this->dateQuote = $dateQuote;

        return $this;
    }
}