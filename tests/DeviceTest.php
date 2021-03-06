<?php

use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;

class DeviceTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testRegister()
    {
        $inputs = ['device_name' => 'iPhone',
            'device_id' => '555555'];
        $data = ['name' => 'iPhone',
            'id' => '555555'];
        $this->call('POST', 'register_device', $inputs);
        $this->seeStatusCode(200);
        $this->seeInDatabase('devices', $data);
    }

    public function testDelete()
    {
        $inputs = ['device_pk' => '59a67486-6dd8-11ea-bc55-0242ac130003'];
        $data = ['pk' => '59a67486-6dd8-11ea-bc55-0242ac130003'];
        $this->call('POST', 'delete_device', $inputs);
        $this->seeStatusCode(200);
        $this->notSeeInDatabase('devices', $data);
    }
}
