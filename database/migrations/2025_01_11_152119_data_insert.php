<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->insert(
            array(
            [  
                'name' => 'Sergey',
                'email' => 'Seregatop@yandex.ru',
                'password' => '1234',
                'last_name' => 'Petrov',
                'passport' => '1212 456478',
                'email' => 'name@domain.example',
                'is_admin' => false,
                "password"=> "\$2y\$10\$PXlLgvmSlRdZ3hf3uapCR.HTRx57v5P36V7hMt9Vu8lsDILQ/xsbO" //1234
            ],
            [  
                'name' => 'Egor',
                'email' => 'Surgut@mail.ru',
                'password' => '4321',
                'last_name' => 'Zemelya',
                'passport' => '5673 897645',
                'email' => 'name1@domain.example',
                'is_admin' => true,
                "password"=> "\$2y\$10\$c6pMvWuX5/JilkCK2RREVetHMqniHgye3WiMw.IxKLT.gEJQKAJP." //4321
            ]
            )
        );
        DB::table('houses')->insert(
            array(
            [  
                'address' => 'Domostoitel 12',
                'area' => '42.1',
                'price' => '20000'
                ],
            [  
                'address' => 'Lenina 5',
                'area' => '74.3',
                'price' => '20000'
            ]
            )
        );
        DB::table('contracts')->insert(
            array(
            [  
                'num' => '1',
                'price' => '25000',
                'date_begin' => '13.01.2025',
                'date_end' => '14.02.2025',
                'buyer_id' => 1,
                'house_id' => 1
                ],
            [  
                'num' => '2',
                'price' => '40000',
                'date_begin' => '01.01.2025',
                'date_end' => '02.02.2025',
                'buyer_id' => 2,
                'house_id' => 2
            ]
            )
        );
   
        DB::table('bills')->insert(
            array(
            [  
                'amount' => '25000',
                'payment_date' => '13.01.2025',
                'contract_id' => 1
                ],
            [  
                'amount' => '40000',
                'payment_date' => '01.01.2025',
                'contract_id' => 2
            ]
            )
        );
        DB::table('categories')->insert(
            array(
            [  
                'category' => 'жилые'
            ],
            [   
                'category' => 'не жилые'
            ],
            [   
                'category' => 'под ремонт'
            ],
            [   
                'category' => 'евроремонт'
            ],
            [   
                'category' => 'животные ДА!'
            ]
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->truncate();
        DB::table('bills')->truncate();
        DB::table('contracts')->truncate();
        DB::table('houses')->truncate();
    }
};
