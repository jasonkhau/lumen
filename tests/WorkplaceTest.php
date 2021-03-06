<?php

use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;

class WorkplaceTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testCreate()
    {
        $inputs = ['workplace_name' => 'site 2'];
        $data = ['name' => 'site 2'];
        $this->call('POST', 'create_workplace', $inputs);
        $this->seeStatusCode(200);
        $this->seeInDatabase('workplaces', $data);
    }

    public function testDelete()
    {
        $input = ['workplace_pk' => '07fc0a0c-719c-11ea-bc55-0242ac130003'];
        $data = ['pk' => '07fc0a0c-719c-11ea-bc55-0242ac130003'];
        $this->call('POST', 'delete_workplace', $input);
        $this->seeStatusCode(200);
        $this->notSeeInDatabase('workplaces', $data);
    }
}
