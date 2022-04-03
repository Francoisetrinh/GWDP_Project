<?php
namespace appli\entity;

final class User
{
    public const DB_WEDS_TABLE = 'gwdp_users';

    // Propriétés et Attributs
    /**
     * @var int $id */
    private int $id;
    
    /**
     * @var string $name */
    private string $name;
    
    /**
     * @var int $firstname */
    private string $firstname;

    /**
     * @var string $adress*/
    private string $address;

    /**
     * @var int $postalcode*/
    private int $postalcode;

    /**
     * @var string $city*/
    private string $city;

    /**
     * @var int $phone*/
    private int $phone;

    /**
     * @var string $login */
    private string $login;

    /**
     * @var string $email */
    private string $email;
    
    /**
     * @var string $password */
    private string $password;

        
    /**
     * @var string $role */
    private string $role;

    /**
     * @var \DateTime $date*/
    private \DateTime $date;

    /**
     * @var \DateTime $dateconnect*/
    private \DateTime $dateconnect;

    /**
     * @param array $aData
     * @return void*/
    public function hydrate(array $aData) :self
    {
        $oDate = new \DateTime($aData['date']);

        $this
        -> setId($aData['id'])
        -> setName($aData['name'])
        -> setFirstname($aData['firstname'])
        -> setAddress($aData['address'])
        -> setPostalcode($aData['postalcode'])
        -> setCity($aData['city'])
        -> setPhone($aData['phone'])
        -> setLogin($aData['login'])
        -> setEmail($aData['email'])
        -> setPassword($aData['password'])
        -> setRole($aData['role'])
        -> setDate($oDate)
        ;
    
        return $this;
    }

//****************************SETTER & GETTER********************************
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
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of firstname
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of postalcode
     *
     * @return int
     */
    public function getPostalcode(): int
    {
        return $this->postalcode;
    }

    /**
     * Set the value of postalcode
     *
     * @param int $postalcode
     *
     * @return self
     */
    public function setPostalcode(int $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

        /**
     * Get the value of phone
     *
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param int $phone
     *
     * @return self
     */
    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of login
     *
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @param string $login
     *
     * @return self
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

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
     * Get the value of dateconnect
     *
     * @return \DateTime
     */
    public function getDateconnect(): \DateTime
    {
        return $this->dateconnect;
    }

    /**
     * Set the value of dateconnect
     *
     * @param \DateTime $dateconnect
     *
     * @return self
     */
    public function setDateconnect(\DateTime $dateconnect): self
    {
        $this->dateconnect = $dateconnect;

        return $this;
    }


    /**
     * Get the value of role
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param string $role
     *
     * @return self
     */
    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}