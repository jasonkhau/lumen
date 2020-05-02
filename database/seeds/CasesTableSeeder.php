<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('db')->table('cases')->insert([
            'id' => 'QT-040120-AA',
            'pk' => '1bd2a750-758b-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-050120-AA',
            'pk' => '1bd2b1be-758b-11ea-bc55-0242ac130003',
            'shelf_pk' => '59a68228-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-060120-AA',
            'pk' => '1bd2b286-758b-11ea-bc55-0242ac130003',
            'shelf_pk' => '59a68228-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-070120-AA',
            'pk' => '1bd2b34e-758b-11ea-bc55-0242ac130003',
            'shelf_pk' => '59a68228-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-080120-AA',
            'pk' => '1bd2b420-758b-11ea-bc55-0242ac130003',
            'shelf_pk' => '59a68228-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-040120-AB',
            'pk' => '30ddcb36-7629-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-091120-AA',
            'pk' => '3ad6ef14-7688-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-080101-AA',
            'pk' => '3ce5a32c-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311edb4e-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-080201-AB',
            'pk' => '3ce5a548-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311edb4e-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-080302-AA',
            'pk' => '3ce5a7dc-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311edd56-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-080402-AB',
            'pk' => '3ce5a8c2-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311edd56-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-090501-AA',
            'pk' => '3ce5a994-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311ede50-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-090601-AB',
            'pk' => '3ce5aa5c-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311ede50-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-090702-AA',
            'pk' => '3ce5ab38-79b2-11ea-bc55-0242ac130003',
            'shelf_pk' => '311ee04e-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-090802-AB',
            'pk' => '3ce5ac0a-79b2-11ea-bc55-0242ac130003pg',
            'shelf_pk' => '311ee04e-79b2-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-090120-AA',
            'pk' => '102c9726-821f-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-100120-AA',
            'pk' => 'a561a838-8227-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-110120-AA',
            'pk' => '82770a98-8254-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-010120-AA',
            'pk' => '59a68160-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-030120-AA',
            'pk' => '5b4ca804-7388-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
        app('db')->table('cases')->insert([
            'id' => 'QT-020120-AA',
            'pk' => 'd993f450-7190-11ea-bc55-0242ac130003',
            'is_active' => True
        ]);
    }
}
