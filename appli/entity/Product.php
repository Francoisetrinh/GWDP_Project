<?php
namespace appli\entity;

final class Product
{
    public const DB_WEDS_TABLE = 'gwdp_products';

    /**
     * @var int $id */
    private int $id;

    /** @var ?string $image */
    private ?string $image = null; 

    /**
     * @var string $title */
    private string $title;

    /**
     *@var string $description */
    private string $description;

    /**
     *@var int $price */
    private int $price;

    /**
     *@var int $coefficient */
    private int $coefficient;

    /**
     *@var int $category */
    private int $category;

    /**
    * @param array $aProductData
    * @return void */
    public function hydrate(array $aProductData):self
    {
        $this 
        -> setId($aProductData['id'])
        -> setImage($aProductData['img'])
        -> setTitle($aProductData['title'])
        -> setPrice($aProductData['price'])
        -> setCoefficient($aProductData['coefficient'])
        -> setDescription($aProductData['description'])
        -> setCategory($aProductData['category_id'])
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
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param int $price
     *
     * @return self
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of category
     *
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param int $category
     *
     * @return self
     */
    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of coefficient
     *
     * @return int
     */
    public function getCoefficient(): int
    {
        return $this->coefficient;
    }

    /**
     * Set the value of coefficient
     *
     * @param int $coefficient
     *
     * @return self
     */
    public function setCoefficient(int $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }


    /**
     * Get the value of image
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}