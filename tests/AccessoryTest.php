<?php

use Illuminate\Http\UploadedFile;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AccessoryTest extends TestCase
{
    use DatabaseTransactions;

    public function testDelete()
    {
        $inputs = ['accessory_pk' => '59a67c4c-6dd8-11ea-bc55-0242ac130003'];
        $data = ['pk' => '59a67c4c-6dd8-11ea-bc55-0242ac130003'];
        $this->call('DELETE', 'delete_accessory', $inputs);
        $this->seeStatusCode(200);
        $this->notSeeInDatabase('accessories', $data);
    }

    public function testDeactivate()
    {
        $inputs = ['accessory_pk' => '59a67b8e-6dd8-11ea-bc55-0242ac130003'];
        $data = ['pk' => '59a67b8e-6dd8-11ea-bc55-0242ac130003',
            'is_active' => False];
        $this->call('PATCH', 'deactivate_accessory', $inputs);
        $this->seeStatusCode(200);
        $this->seeInDatabase('accessories', $data);
    }

    public function testReactivate()
    {
        $inputs = ['accessory_pk' => '59a67c4c-6dd8-11ea-bc55-0242ac130003'];
        $data = ['pk' => '59a67c4c-6dd8-11ea-bc55-0242ac130003',
            'is_active' => True];
        $this->call('PATCH', 'reactivate_accessory', $inputs);
        $this->seeStatusCode(200);
        $this->seeInDatabase('accessories', $data);
    }

//    public function testUploadPhoto()
//    {
//        $this->call('POST', 'upload_accessory_photo', ['accessory_pk' => '59a67c4c-6dd8-11ea-bc55-0242ac130003'], [], ['image' => UploadedFile::fake()->image('image.png')], []);
//        $file_name = app('db')->table('accessories')->where('pk', '59a67c4c-6dd8-11ea-bc55-0242ac130003')->value('photo');
//        $this->assertFileExists($file_name);
//        $this->seeStatusCode(200);
//    }


}
