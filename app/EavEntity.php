<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
use Kyslik\ColumnSortable\Sortable;


class EavEntity extends Model
{
    use SoftDeletes, Sortable;

    /**
     * The attributes that sortable.
     *
     * @var array
     */
    public $sortable =  ['id', 'eav_entity_name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eav_entity';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['eav_entity_name', 'eav_entity_model'];

    /**
     * Get the project_attributes for the project.
     *
     * @return void
     */
    public function eav_attributes()
    {
        return $this->hasMany('App\EavAttribute', 'eav_entity_id', 'id');
    }
}
