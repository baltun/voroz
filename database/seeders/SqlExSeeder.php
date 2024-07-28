<?php

namespace Database\Seeders;

use App\Models\SqlexProduct;
use Database\Factories\SqlexLaptopFactory;
use Database\Factories\SqlexPcFactory;
use Database\Factories\SqlexPrinterFactory;
use Database\Factories\SqlexProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlExSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        try {
//            DB::beginTransaction();
            // создаем производителей - Products
            $products = SqlexProductFactory::new()->count(10000)->create();
            foreach ($products as $product) {
                // создаем компьютеры для производетелей - PC
                $pcsCount = random_int(0, 10);
                $pcs = SqlexPcFactory::new()->count($pcsCount)->for($product)->create();

                // создаем лэптопы (ноутбуки) - Laptops
                $laptopsCount = random_int(0, 10);
                $laptops = SqlexLaptopFactory::new()->count($laptopsCount)->for($product)->create();

                // создаем принтеры - Printers
                $printersCount = random_int(0, 10);
                $printers = SqlexPrinterFactory::new()->count($printersCount)->for($product)->create();

            }
    //        dd($products, $pcs);
//            DB::commit();
            echo 'готово'.PHP_EOL;
//        } catch (\Throwable $e) {
//            DB::rollBack();
//            echo 'откат'.PHP_EOL;
//        }
    }
}
