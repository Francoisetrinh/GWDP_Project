<?php
namespace appli\repository;

use appli\entity\User;
use \UserSession;
use appli\framework\PDOConnection;

class UserRepository 
{
  // public function __construct() 
  // {
  //   $this -> DB_pdo = PDOConnection::get();
  // }

  /**
   * @param integer $limit
   * @return array
   */
  public static function getUsers() : array
  {
      $oPdo = PDOConnection::get();
      $query = $oPdo -> prepare('
        SELECT
          u_id AS id,
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
          u_date_connect AS dateconnect
        FROM gwdp_users
        ORDER BY u_name DESC');
      
      $query -> execute();

      $aUsers = [];
      while ($aData = $query -> fetch(\PDO::FETCH_ASSOC)) {
          // Création d'un objet User
          $oUser = new User();
          // Remplissage de l'objet
          $oUser -> hydrate($aData);
          // Stockage de l'objet dans le tableau
          $aUsers[] = $oUser;
      }
      return $aUsers;
  }

  /**
   * @param string $id
   * @return User 
   */
  public static function getUser(string $id) :?User
  {
      $oPdo = PDOConnection::get();
      $query = $oPdo -> prepare('
      SELECT 
          u_id AS id,
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
          u_date AS date
      FROM gwdp_users
      WHERE u_id = :id');

      $query -> execute( [':id' => $id] );
      $aData = $query -> fetch(\PDO::FETCH_ASSOC);
      if ($aData) {
        $oUser = new User();
        $oUser -> hydrate($aData);
        return $oUser;
      }
    return null;
  }
  
  /**
   * @param string $id
   * @return User 
   */
  public static function getUserByEmail(string $email) :?User
  { 
    $oPdo = PDOConnection::get();
    $query = $oPdo -> prepare('
      SELECT 
          u_id AS id,
          u_name AS name,
          u_firstname AS firstname,
          u_address AS address,
          u_postalcode AS postalcode, 
          u_city AS city,
          u_phone AS phone, 
          u_login AS login,
          u_email AS email,
          u_role AS role,
          u_password AS password,
          u_date AS date
      FROM gwdp_users
      WHERE u_email = :email');

      $query -> execute( [':email' => $email] );
      $aData = $query -> fetch(\PDO::FETCH_ASSOC);
      if ($aData) {
        $oUser = new User();
        $oUser -> hydrate($aData);
        return $oUser;
      }
    return null;
  }

  
  /**
   * @param string $id
   * @return User 
   */
  public static function getUserByLoginOrEmail(string $loginoremail) :?User
  { 
    $oPdo = PDOConnection::get();
    $query = $oPdo -> prepare('
      SELECT 
          u_id AS id,
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
          u_date AS date
      FROM gwdp_users
      WHERE u_email = :loginoremail OR u_login = :loginoremail');

      $query -> execute( [':loginoremail' => $loginoremail] );
      $aData = $query -> fetch(\PDO::FETCH_ASSOC);
      // var_dump($aData);
      if ($aData) {
        $oUser = new User();
        $oUser -> hydrate($aData);
        return $oUser;
      }
    return null;
  }
  
  
  // Fonction pour supprimer un utilisateur
  public static function deleteUser(string $id) : self {
    $oPdo = PDOConnection::get();
    $query =  $oPdo -> prepare('
    DELETE FROM gwdp_users
    WHERE 
      u_id = :u_id
    ');
    
    $query -> execute([':u_id' => $id]);
  
    return $this;
  }
  
  // Insertion d'un utilisateur
  public static function insertUser(User $user) : string {
    $oPdo = PDOConnection::get();
    $query = $oPdo-> prepare('
    INSERT INTO gwdp_users
      (u_name, u_firstname, u_address, u_postalcode, u_city, u_phone, u_email,
      u_login, u_password, u_date)
    VALUES 
      (:name,:firstname, :address, :postalcode, :city, :phone, :email, :login, :password, NOW() )
    ');
  
    $query -> execute([
      ':name' => $user -> getName(),
      ':firstname' => $user-> getFirstname(),
      ':address' =>  $user-> getAddress(),
      ':postalcode' => $user-> getPostalCode(),
      ':city' => $user-> getCity(),
      ':phone' => $user-> getPhone(),
      ':email' => $user-> getEmail(),
      ':login' => $user-> getLogin(),
      ':password' => $user-> getPassword()
    ]);

    return $oPdo -> lastInsertId();
    var_dump($oPdo);
  }
  
  // Mise à jour - Update d'un utilisateur
  public static function updateUser($user) : self  {
    $oPdo = PDOConnection::get();
    $user_query =  $oPdo -> prepare('
    UPDATE 
      gwdp_users
    SET
      u_address = :address, 
      u_postalcode = :postalcode, 
      u_city = :city, 
      u_phone = :phone,
      u_email = :email,
      u_login = :login,
      u_password = :password,
      u_date = :date,
      u_datetime = NOW()
    WHERE
      u_id = :id
    ');
  
    $user_query -> execute();
  
  }

}