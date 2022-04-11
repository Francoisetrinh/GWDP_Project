<?php
use appli\repository\ProductsRepository;
$data = [];
if (!empty($_POST)&&isset($_POST['search'])) {
    $oPdo = new ProductsRepository();
    $aProducts= $oPdo->getProductsSearch($_POST['search']);
    foreach ($aProducts as $oProduct) {
        $data[]=[
            'id' => $oProduct->getId(),
            'title' => $oProduct->getTitle(),
        ];
    }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
exit;