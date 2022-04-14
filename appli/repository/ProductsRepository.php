<?php
namespace appli\repository;

use \appli\entity\Product;
use \appli\framework\PDOConnection;

class ProductsRepository
{
    protected const DB_WEDS_TABLE = 'gwdp_products';

    public function __construct() 
    {
      $this -> DB_pdo = PDOConnection::get();
    }

    /**
     * @param int $limit 
     * @return array
     */

    public function getProducts(int $limit = 20): array
    {
        // $oPdo = PDOConnection::get();
        // $query = $oPdo -> prepare('
        $query = $this-> DB_pdo -> prepare('
            SELECT
                p_id AS id,
                p_img AS img,
                p_title AS title,
                p_description AS description,
                p_price AS price,
                p_coefficient AS coefficient,
                c_id AS category_id
            FROM gwdp_products
            ORDER BY title DESC
            LIMIT :limit
        ');

        // Passage de $limit en entier
        $query -> bindValue(':limit', $limit, \PDO::PARAM_INT);
        $query -> execute();

        $aProducts = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oProduct = new Product();
            $oProduct -> hydrate($aData);

            $aProducts[] = $oProduct;
        }
        return $aProducts;
    }

    public function getProductsSearch(string $search, int $limit = 20): array
    {
        // $oPdo = PDOConnection::get();
        // $query = $oPdo -> prepare('
        $query = $this-> DB_pdo -> prepare('
        SELECT
        p_id AS id,
        p_img AS img,
        p_title AS title,
        p_description AS description,
        p_price AS price,
        p_coefficient AS coefficient,
        c_id AS category_id
        FROM gwdp_products
        WHERE p_title LIKE :search OR p_description LIKE :search
        ORDER BY title DESC
        LIMIT :limit
        ');

        // Passage de $limit en entier
        $query -> bindValue(':limit', $limit, \PDO::PARAM_INT);
        $query -> bindValue(':search', $search, \PDO::PARAM_STR);
        $query -> execute();

        $aProducts = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oProduct = new Product();
            $oProduct -> hydrate($aData);

            $aProducts[] = $oProduct;
        }
        return $aProducts;
    }


    /**
     * @param int $id
     * @return Product|NULL
     */
    public function getProduct(int $id): ?Product
    {
        $oPdo = PDOConnection::get();
        $query = $oPdo -> prepare('
            SELECT
                p_id AS id,
                p_img AS img,
                p_title AS title,
                p_description AS description,
                p_price AS price,
                p_coefficient AS coefficient,
                c_id AS category_id
            FROM '. ProductsRepository::DB_WEDS_TABLE.'
            WHERE p_id = :id
        ');
        
        $query -> execute([':id' => $id]);
        // on récupére une seule valeur dont un produit.
        $aData = $query -> fetch(\PDO::FETCH_ASSOC);
        if($aData) {
            $oProduct = new Product();
            $oProduct -> hydrate($aData);
        return $oProduct;
        } 
        
        return NULL;
    }

    // Fonction pour supprimer un produit
    public function deleteProduct(string $product_id) : self {
        $query = $this -> DB_pdo -> prepare('
        DELETE FROM gwdp_products
        WHERE 
        p_id = :p_id
        ');
        
        $query -> execute([':p_id' => $product_id]);
    
        return $this;
    }

    // Fonction pour insérer un produit
    public function insertProduct(Product $product) : self {
        $query = $this -> DB_pdo -> prepare('
        INSERT INTO gwdp_products
        (p_title, p_description, p_price, c_id, p_coefficient, p_img)
      VALUES 
        (:title,:description, :price, :c_id, :coefficient, :img)
      ');

      $query -> execute([
        ':title' => $product -> getTitle(),
        ':description' => $product -> getDescription(),
        ':price' =>  $product -> getPrice(),
        ':c_id' =>  $product -> getCategory(),
        ':coefficient' =>  $product -> getCoefficient(),
        ':img' => $product -> getImage(),
      ]);

      return $this;
    }

      // Mise à jour - Update d'un utilisateur
    public function updateProduct($product) : self  {
        $query = $this -> DB_pdo -> prepare('
        UPDATE 
            gwdp_products
        SET
            p_title = :title,
            p_description = :description,
            p_price = :price,
            c_id = :c_id,
            p_coefficient = :coefficient,
            p_img = :img
        WHERE
            p_id = :product_id
        ');
    
        $query -> execute([
            ':title' => $product -> getTitle(),
            ':description' => $product -> getDescription(),
            ':price' =>  $product -> getPrice(),
            ':c_id' =>  $product -> getCategory(),
            ':coefficient' =>  $product -> getCoefficient(),
            ':img' => $product -> getImage(),
            ':product_id' => $product -> getId()
          ]);
    
    return $this;
  }

}