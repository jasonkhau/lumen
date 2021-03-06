<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    public function run()
    {
        app('db')->table('suppliers')->insert([
            'id' => 'ADR',
            'name' => 'CTY TNHH Avery Dennison Ris VN',
            'address' => 'Lô E.01, Đường Trung Tâm, KCN Long Hậu,Xã Long Hậu,Huyện Cần Giuộc, Tỉnh Long An, Việt Nam',
        ]);
        app('db')->table('suppliers')->insert([
            'id' => 'CLC',
            'name' => 'CTY TNHH Công nghiệp Long Cương',
            'address' => '364 Đường Nguyễn Thị Kiểu, Khu Phố 6, Phường Hiệp Thành, Q. 12, TP.HCM',
        ]);
        app('db')->table('suppliers')->insert([
            'id' => 'CPP',
            'name' => 'Tổng CTY Cổ phần Phong Phú',
            'address' => '48 Tăng Nhơn Phú, KP3, P. Tăng Nhơn Phú B, Q.9, TP. HCM, Việt Nam',
        ]);
        app('db')->table('suppliers')->insert([
            'id' => 'CPV',
            'name' => 'CTY Cổ phần chỉ may Phong Việt',
            'address' => '127 Lê Văn Chí, KP.1, Phường Linh Trung, Q.Thủ Đức, TP. HCM, Việt Nam',
        ]);
        app('db')->table('suppliers')->insert([
            'pk' => '59a67724-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True,
            'id' => 'ABC',
            'name' => 'ABC',
        ]);
        app('db')->table('suppliers')->insert([
            'pk' => '59a677ec-6dd8-11ea-bc55-0242ac130003',
            'is_active' => False,
            'id' => 'XYZ',
            'name' => 'XYZ',
        ]);
        app('db')->table('suppliers')->insert([
            'pk' => '1b4a1706-771a-11ea-bc55-0242ac130003',
            'is_active' => True,
            'id' => 'AAA',
            'name' => 'SUPPLIER A',
        ]);
        app('db')->table('suppliers')->insert([
            'pk' => '1b4a17ec-771a-11ea-bc55-0242ac130003',
            'is_active' => True,
            'id' => 'BBB',
            'name' => 'SUPPLIER B',
        ]);
    }
}
