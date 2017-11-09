<?php

use App\Models\MenuRate;
use App\Repositories\MenuRateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuRateRepositoryTest extends TestCase
{
    use MakeMenuRateTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MenuRateRepository
     */
    protected $menuRateRepo;

    public function setUp()
    {
        parent::setUp();
        $this->menuRateRepo = App::make(MenuRateRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMenuRate()
    {
        $menuRate = $this->fakeMenuRateData();
        $createdMenuRate = $this->menuRateRepo->create($menuRate);
        $createdMenuRate = $createdMenuRate->toArray();
        $this->assertArrayHasKey('id', $createdMenuRate);
        $this->assertNotNull($createdMenuRate['id'], 'Created MenuRate must have id specified');
        $this->assertNotNull(MenuRate::find($createdMenuRate['id']), 'MenuRate with given id must be in DB');
        $this->assertModelData($menuRate, $createdMenuRate);
    }

    /**
     * @test read
     */
    public function testReadMenuRate()
    {
        $menuRate = $this->makeMenuRate();
        $dbMenuRate = $this->menuRateRepo->find($menuRate->id);
        $dbMenuRate = $dbMenuRate->toArray();
        $this->assertModelData($menuRate->toArray(), $dbMenuRate);
    }

    /**
     * @test update
     */
    public function testUpdateMenuRate()
    {
        $menuRate = $this->makeMenuRate();
        $fakeMenuRate = $this->fakeMenuRateData();
        $updatedMenuRate = $this->menuRateRepo->update($fakeMenuRate, $menuRate->id);
        $this->assertModelData($fakeMenuRate, $updatedMenuRate->toArray());
        $dbMenuRate = $this->menuRateRepo->find($menuRate->id);
        $this->assertModelData($fakeMenuRate, $dbMenuRate->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMenuRate()
    {
        $menuRate = $this->makeMenuRate();
        $resp = $this->menuRateRepo->delete($menuRate->id);
        $this->assertTrue($resp);
        $this->assertNull(MenuRate::find($menuRate->id), 'MenuRate should not exist in DB');
    }
}
