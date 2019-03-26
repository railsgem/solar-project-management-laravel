<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use SoftDeletes, Sortable;

    /**
     * The attributes that sortable.
     *
     * @var array
     */
    public $sortable =  ['id', 'name'];

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
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    /**
     * Get the user that the project belongs to.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    /**
     * Get the project_attributes for the project.
     *
     * @return void
     */
    public function project_attributes()
    {
        return $this->hasMany('App\ProjectAttribute', 'project_id', 'id');
    }
}
