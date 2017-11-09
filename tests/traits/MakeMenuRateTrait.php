<?php

use Faker\Factory as Faker;
use App\Models\MenuRate;
use App\Repositories\MenuRateRepository;

trait MakeMenuRateTrait
{
    /**
     * Create fake instance of MenuRate and save it in database
     *
     * @param array $menuRateFields
     * @return MenuRate
     */
    public function makeMenuRate($menuRateFields = [])
    {
        /** @var MenuRateRepository $menuRateRepo */
        $menuRateRepo = App::make(MenuRateRepository::class);
        $theme = $this->fakeMenuRateData($menuRateFields);
        return $menuRateRepo->create($theme);
    }

    /**
     * Get fake instance of MenuRate
     *
     * @param array $menuRateFields
     * @return MenuRate
     */
    public function fakeMenuRate($menuRateFields = [])
    {
        return new MenuRate($this->fakeMenuRateData($menuRateFields));
    }

    /**
     * Get fake data of MenuRate
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMenuRateData($menuRateFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'menu_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'location' => $fake->word,
            'comments' => $fake->text,
            'rate' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $menuRateFields);
    }
}
