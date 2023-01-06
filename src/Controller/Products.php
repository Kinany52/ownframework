<?php

namespace App\Controller;

use App\Entity\ProductsEntity;
use App\Repository\ProductsRepository;

class Products
{   
    //1st method: see ProductsRepository
    public function addProduct()
    {
        $name = "blue jeans";
        $size = "31";

        ProductsRepository::persistEntity(NULL, $name, $size);
        echo 'product added successfully!';
    }

    //2nd method: see ProductRepository
    public function addingProduct()
    {
        $name = "hat";
        $size = "XS";

        ProductsRepository::persistingEntity(new ProductsEntity(
            id: 0,
            name: $name,
            size: $size
        ));
        echo 'product added successfully!!!';
    }

    public function getProductById()
    {
        $productId = 105;
        foreach (ProductsRepository::getProduct($productId) as $requestedProduct) {
            $productName = $requestedProduct->name;
        }
        echo "The product you're looking for is: " . $productName;
    }

    public function deleteProduct()
    {
        $idToBeDeleted = 97;
        ProductsRepository::eraseProduct($idToBeDeleted);
        echo "product number " . $idToBeDeleted . " is no longer available."; 
    }

    public function editProduct()
    {
        $correctedSize = "31";
        $id = 101;
        ProductsRepository::updateProduct($correctedSize, $id);
        echo "product size edited to " . $correctedSize . ". Thank you for spotting the mistake.";
    }
}