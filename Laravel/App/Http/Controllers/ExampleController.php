<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Laragento\DB;
use Laragento\Models\CatalogProductEntity;
use Illuminate\Support\Facades\DB as MagentoDB;

class ExampleController extends Controller
{
    public function get()
    {

        $params = [
            "driver" => "mysql",
            "host" => "mariadb",
            "database"  => "bitnami_magento",
            "username"  => "bn_magento",
            "password"  => "",
            "prefix"    => "",
            "charset" => "utf8mb4",
            "collation" => "utf8mb4_unicode_ci"
        ];
        config(["database.connections.magento.driver" => $params["driver"]]);
        config(["database.connections.magento.host" =>  $params["host"]]);
        config(["database.connections.magento.database" => $params["database"]]);
        config(["database.connections.magento.username" => $params["username"]]);
        config(["database.connections.magento.password" => $params["password"]]);
        config(["database.connections.magento.prefix" => $params["prefix"]]);
        config(["database.connections.magento.charset" => $params["charset"]]);
        config(["database.connections.magento.collation" => $params["collation"]]);

        $productsModel = new CatalogProductEntity;
        $productsModel->setConnection("magento");
        $products = $productsModel->from("catalog_product_entity")->with('catalog_product_entity_varchars', 'catalog_product_entity_ints', 'catalog_product_entity_texts', 'catalog_product_entity_decimals')->get()->toArray();
        return Inertia::render("Example", ["data" => $products]);
    }
}
