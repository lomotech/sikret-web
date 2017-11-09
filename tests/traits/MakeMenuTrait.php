<?php

use Faker\Factory as Faker;
use App\Models\Menu;
use App\Repositories\MenuRepository;

trait MakeMenuTrait
{
    /**
     * Create fake instance of Menu and save it in database
     *
     * @param array $menuFields
     * @return Menu
     */
    public function makeMenu($menuFields = [])
    {
        /** @var MenuRepository $menuRepo */
        $menuRepo = App::make(MenuRepository::class);
        $theme = $this->fakeMenuData($menuFields);
        return $menuRepo->create($theme);
    }

    /**
     * Get fake instance of Menu
     *
     * @param array $menuFields
     * @return Menu
     */
    public function fakeMenu($menuFields = [])
    {
        return new Menu($this->fakeMenuData($menuFields));
    }

    /**
     * Get fake data of Menu
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMenuData($menuFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'avg_rate' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $menuFields);
    }
}
