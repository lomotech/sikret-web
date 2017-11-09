<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MenuRate
 * @package App\Models
 * @version November 9, 2017, 3:41 am UTC
 *
 * @property \App\Models\Menu menu
 * @property integer menu_id
 * @property string name
 * @property string location
 * @property string comments
 * @property boolean rate
 */
class MenuRate extends Model
{
    use SoftDeletes;

    public $table = 'menu_rates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'menu_id',
        'name',
        'location',
        'comments',
        'rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menu_id' => 'integer',
        'name' => 'string',
        'location' => 'string',
        'comments' => 'string',
        'rate' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class);
    }
}
