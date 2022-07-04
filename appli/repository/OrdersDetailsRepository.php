<?php
namespace appli\repository;

use \appli\entity\OrderDetails;
use \appli\entity\Product;
use \appli\entity\Size;
use \appli\framework\PDOConnection;

class OrdersDetailsRepository
{
    protected const DB_WEDS_TABLE = 'gwdp_order_detail';

    public function __construct() 
    {
      $this -> DB_pdo = PDOConnection::get();
    } 

     /**
     * @param int $limit 
     * @return array
     */

    public function getDetails(int $id): array
    {
        $query = $this-> DB_pdo -> prepare('
            SELECT
                d_id AS detailsId,
                d_quantity AS detailsQuantity,
                d_price AS detailsPrice,
                gwdp_products.p_id AS id,
                p_img AS img,
                p_title AS title,
                p_description AS description,
                p_price AS price,
                p_coefficient AS coefficient,
                c_id AS category_id,
                gwdp_size.s_id AS sizeId,
                s_size_us AS sizeUs,
                s_size_eu AS sizeEu
            FROM '. OrdersDetailsRepository::DB_WEDS_TABLE.'
            INNER JOIN gwdp_products ON gwdp_products.p_id = gwdp_order_detail.p_id
            INNER JOIN gwdp_size ON gwdp_size.s_id = gwdp_order_detail.s_id
            WHERE gwdp_order_detail.o_id = :id
        ');

        // Passage de $limit en entier
        $query -> execute([':id' => $id]);

        $aDetails = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oDetails = new OrderDetails();
            $oProduct = new Product();
            $oSize = new Size();

            $oProduct -> hydrate($aData);
            $oSize -> hydrate($aData);

            $aData['detailsProduct'] = $oProduct;
            $aData['detailsSize'] = $oSize;

            $oDetails -> hydrate($aData);

            $aDetails[] = $oDetails;
        }
        return $aDetails;
    }
}