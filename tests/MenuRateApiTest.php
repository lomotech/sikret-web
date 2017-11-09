<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuRateApiTest extends TestCase
{
    use MakeMenuRateTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMenuRate()
    {
        $menuRate = $this->fakeMenuRateData();
        $this->json('POST', '/api/v1/menuRates', $menuRate);

        $this->assertApiResponse($menuRate);
    }

    /**
     * @test
     */
    public function testReadMenuRate()
    {
        $menuRate = $this->makeMenuRate();
        $this->json('GET', '/api/v1/menuRates/'.$menuRate->id);

        $this->assertApiResponse($menuRate->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMenuRate()
    {
        $menuRate = $this->makeMenuRate();
        $editedMenuRate = $this->fakeMenuRateData();

        $this->json('PUT', '/api/v1/menuRates/'.$menuRate->id, $editedMenuRate);

        $this->assertApiResponse($editedMenuRate);
    }

    /**
     * @test
     */
    public function testDeleteMenuRate()
    {
        $menuRate = $this->makeMenuRate();
        $this->json('DELETE', '/api/v1/menuRates/'.$menuRate->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/menuRates/'.$menuRate->id);

        $this->assertResponseStatus(404);
    }
}
