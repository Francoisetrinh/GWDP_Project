<?php
namespace appli\repository;

use \appli\framework\PDOConnection;
use \appli\entity\Order;
use \appli\entity\User;

class OrdersRepository
{
    protected const DB_WEDS_TABLE = 'gwdp_orders';

    public function __construct() 
    {
      $this -> DB_pdo = PDOConnection::get();
    } 

     /**
     * @param int $limit 
     * @return array
     */

    public function addOrder(Order $oOrder): self
    {
        $query = $this -> DB_pdo -> prepare('
            INSERT INTO '. OrdersRepository::DB_WEDS_TABLE.'
                (u_id, o_flags, o_date, o_date_quote)
            VALUES 
            (:u_id, :o_flags, :o_date, :o_date_quote)
        ');

        $query -> execute([
            ':u_id' => $oOrder -> getUser() -> getId(),
            ':o_flags' => $oOrder -> getFlags(),
            ':o_date' =>  date_format($oOrder -> getDate(), 'Y-m-d H:i:s'),
            ':o_date_quote' =>  date_format($oOrder -> getDateQuote(), 'Y-m-d H:i:s')
        ]);

        return $this;
    }

    public function getOrdersUser(int $userId, int $limit = 20): array
    {
        $query = $this-> DB_pdo -> prepare('
            SELECT
                gwdp_orders.o_id as orderId,
                gwdp_orders.u_id as user,
                o_flags as flags,
                o_date as dateOrder,
                o_date_quote as dateOrderQuote,
                gwdp_users.u_id AS id,
                u_name AS name,
                u_firstname AS firstname,
                u_address AS address,
                u_postalcode AS postalcode, 
                u_city AS city,
                u_phone AS phone, 
                u_login AS login,
                u_email AS email,
                u_password AS password,
                u_role AS role,
                u_date AS date,
                u_date_connect AS dateconnect,
                SUM(d_price) AS total
            FROM '. OrdersRepository::DB_WEDS_TABLE.'
            INNER JOIN gwdp_users ON gwdp_users.u_id = gwdp_orders.u_id
            INNER JOIN gwdp_order_detail ON gwdp_order_detail.o_id = gwdp_orders.o_id
            WHERE gwdp_orders.u_id = :user
            GROUP BY gwdp_orders.o_id
            ORDER BY gwdp_orders.o_id ASC
        ');

        // Passage de $limit en entier
        $query -> execute([':user' => $userId]);
        
        $oOrders = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oOrder = new Order();
            $oUser = new User();

            $oUser -> hydrate($aData);

            $aData['user'] = $oUser;

            $oOrder -> hydrate($aData);

            $oOrders[] = $oOrder;
        }
        return $oOrders;
    }

    public function getOrders(int $limit = 20): array
    {
        $query = $this-> DB_pdo -> prepare('
            SELECT
                gwdp_orders.o_id as orderId,
                gwdp_orders.u_id as user,
                o_flags as flags,
                o_date as dateOrder,
                o_date_quote as dateOrderQuote,
                gwdp_users.u_id AS id,
                u_name AS name,
                u_firstname AS firstname,
                u_address AS address,
                u_postalcode AS postalcode, 
                u_city AS city,
                u_phone AS phone, 
                u_login AS login,
                u_email AS email,
                u_password AS password,
                u_role AS role,
                u_date AS date,
                u_date_connect AS dateconnect,
                SUM(d_price) AS total
            FROM '. OrdersRepository::DB_WEDS_TABLE.'
            INNER JOIN gwdp_users ON gwdp_users.u_id = gwdp_orders.u_id
            INNER JOIN gwdp_order_detail ON gwdp_order_detail.o_id = gwdp_orders.o_id
            GROUP BY gwdp_orders.o_id
            ORDER BY gwdp_orders.o_id ASC
        ');

        // Passage de $limit en entier
        $query -> execute();

        $oOrders = [];
        while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
            // Création d'un objet
            $oOrder = new Order();
            $oUser = new User();

            $oUser -> hydrate($aData);

            $aData['user'] = $oUser;

            $oOrder -> hydrate($aData);

            $oOrders[] = $oOrder;
        }
        return $oOrders;
    }
 
    /**
     * @param int $id
     * @return Size|NULL
     */
    public function getOrder(int $id): ?Order
    {
        $oPdo = PDOConnection::get();
        $query = $oPdo -> prepare('
            SELECT
                gwdp_orders.o_id as orderId,
                gwdp_orders.u_id as user,
                o_flags as flags,
                o_date as dateOrder,
                o_date_quote as dateOrderQuote,
                gwdp_users.u_id AS id,
                u_name AS name,
                u_firstname AS firstname,
                u_address AS address,
                u_postalcode AS postalcode, 
                u_city AS city,
                u_phone AS phone, 
                u_login AS login,
                u_email AS email,
                u_password AS password,
                u_role AS role,
                u_date AS date,
                u_date_connect AS dateconnect,
                SUM(d_price) AS total
            FROM '. OrdersRepository::DB_WEDS_TABLE.'
            INNER JOIN gwdp_users ON gwdp_users.u_id = gwdp_orders.u_id
            INNER JOIN gwdp_order_detail ON gwdp_order_detail.o_id = gwdp_orders.o_id
            GROUP BY gwdp_orders.o_id
            ORDER BY gwdp_orders.o_id ASC
        ');
        
        $query -> execute([':id' => $id]);
        // on récupére une seule valeur dont un produit.
        $aData = $query -> fetch(\PDO::FETCH_ASSOC);
        if($aData) {
            $oOrder = new Order();
            $oUser = new User();

            $oUser -> hydrate($aData);

            $aData['user'] = $oUser;

            $oOrder -> hydrate($aData);
        return $oOrder;
        } 
        
        return NULL;
    }

}