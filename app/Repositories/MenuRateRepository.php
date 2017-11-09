<?php

namespace App\Repositories;

use App\Models\MenuRate;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MenuRateRepository
 * @package App\Repositories
 * @version November 9, 2017, 3:41 am UTC
 *
 * @method MenuRate findWithoutFail($id, $columns = ['*'])
 * @method MenuRate find($id, $columns = ['*'])
 * @method MenuRate first($columns = ['*'])
*/
class MenuRateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'menu_id',
        'name',
        'location',
        'comments',
        'rate'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MenuRate::class;
    }
}
