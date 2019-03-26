<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
use Kyslik\ColumnSortable\Sortable;

class EavAttribute extends Model
{
    use SoftDeletes, Sortable;

    /**
     * The attributes that sortable.
     *
     * @var array
     */
    public $sortable =  ['id', 'eav_entity_id'];

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
    protected $table = 'eav_attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['eav_entity_id', 'attribute_code', 'backend_type', 'frontend_input', 'frontend_label', 'is_required'];

    /**
     * Get the project_attributes for the project.
     *
     * @return void
     */
    public function eav_entity()
    {
        return $this->belongsTo('App\EavEntity', 'eav_entity_id', 'id');
    }
}
