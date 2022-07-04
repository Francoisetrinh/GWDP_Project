<?php
namespace appli\entity;

use \appli\entity\Order;
use \appli\entity\Product;
use \appli\entity\Size;

class OrderDetails
{
    private int $id;
    private Product $product;
    private int $quantity;
    private int $price;
    private Size $size;


    /**
     * @param array $aOrderDetailsData
     * @return void */
    public function hydrate(array $aOrderDetailsData):self
    {
        $this 
        -> setId($aOrderDetailsData['detailsId'])
        -> setProduct($aOrderDetailsData['detailsProduct'])
        -> setQuantity($aOrderDetailsData['detailsQuantity'])
        -> setPrice($aOrderDetailsData['detailsPrice'])
        -> setSize($aOrderDetailsData['detailsSize'])
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
     * Get the value of product
     *
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @param Product $product
     *
     * @return self
     */
    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of quantity
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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
     * Get the value of size
     *
     * @return Size
     */
    public function getSize(): Size
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @param Size $size
     *
     * @return self
     */
    public function setSize(Size $size): self
    {
        $this->size = $size;

        return $this;
    }
}