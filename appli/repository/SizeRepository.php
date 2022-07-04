<?php
namespace appli\repository;

use \appli\entity\Size;
use \appli\framework\PDOConnection;

class SizeRepository
{
    protected const DB_WEDS_TABLE = 'gwdp_size';

    public function __construct() 
    {
      $this -> DB_pdo = PDOConnection::get();
    } 

     /**
     * @param int $limit 
     * @return array
     */

    public function getSizes(int $limit = 20): array
    {
        $query = $this-> DB_pdo -> prepare('
            SELECT
                s_id AS sizeId,
                s_size_us AS sizeUs,
                s_size_eu AS sizeEu
            FROM gwdp_size
            ORDER BY s_size_eu ASC
        ');

        // Passage de $limit en entier
        $query -> execute();

        $aSizes = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oSize = new Size();
            $oSize -> hydrate($aData);

            $aSizes[] = $oSize;
        }
        return $aSizes;
    }
 
    /**
     * @param int $id
     * @return Size|NULL
     */
    public function getSize(int $id): ?Size
    {
        $oPdo = PDOConnection::get();
        $query = $oPdo -> prepare('
            SELECT
                s_id AS sizeId,
                s_size_us AS sizeUs,
                s_size_eu AS sizeEu
            FROM '. SizeRepository::DB_WEDS_TABLE.'
            WHERE s_id = :id
        ');
        
        $query -> execute([':id' => $id]);
        // on récupére une seule valeur dont un produit.
        $aData = $query -> fetch(\PDO::FETCH_ASSOC);
        if($aData) {
            $oSize = new Size();
            $oSize -> hydrate($aData);
            return $oSize;
        } 
        
        return NULL;
    }

}