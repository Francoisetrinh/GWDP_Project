<?php
namespace appli\entity;

final class Category
{
    public const DB_WEDS_TABLE = 'gwdp_category';

    /**
     * @var int $id */
    private int $id;

    /**
     * @var string $title */
    private string $title;

    /**
     *@var string $content */
    private string $content;

    /**
    * @param array $aCategoriesData
    * @return void */
    public function hydrate(array $aCategoriesData):self
    {
        $this 
        -> setId($aCategoriesData['id'])
        -> setTitle($aCategoriesData['title'])
        -> setContent($aCategoriesData['content'])
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
     * Get the value of content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}