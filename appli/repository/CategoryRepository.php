<?php
namespace appli\repository;

use \appli\entity\Category;
use \appli\framework\PDOConnection;

class CategoryRepository
{
    protected const DB_WEDS_TABLE = 'gwdp_category';

    public function __construct() 
    {
      $this -> DB_pdo = PDOConnection::get();
    }

    /**
     * @param int $limit 
     * @return array
     */

    public function getCategories(int $limit = 20): array
    {
        // $oPdo = PDOConnection::get();
        // $query = $oPdo -> prepare('
        $query = $this-> DB_pdo -> prepare('
            SELECT
                c_id AS id,
                c_title AS title,
                c_content AS content
            FROM gwdp_category
            ORDER BY title DESC
            LIMIT :limit
        ');

        // Passage de $limit en entier
        $query -> bindValue(':limit', $limit, \PDO::PARAM_INT);
        $query -> execute();

        $aCategories = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oCategory = new Category();
            $oCategory -> hydrate($aData);

            $aCategories[] = $oCategory;
        }
        return $aCategories;
    }

    /**
     * @param int $id
     * @return Category|NULL
     */
    public function getCategoriy(int $id)
    {
        $oPdo = PDOConnection::get();
        $query = $oPdo -> prepare('
            SELECT
            c_id AS id,
            c_title AS title,
            c_content AS content
            FROM gwdp_category
            WHERE p_id = :id
        ');
        
        $query -> execute([':id' => $id]);
        // on récupére une seule valeur dont un produit.
        $aData = $query -> fetch(\PDO::FETCH_ASSOC);
        if($aData) {
            $oCategory = new Category();
            $oCategory -> hydrate($aData);
            return $oCategory;
        } 
        
        return NULL;
    }
}