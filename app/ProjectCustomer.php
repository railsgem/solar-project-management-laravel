<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
use Kyslik\ColumnSortable\Sortable;

class ProjectCustomer extends Model
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
    protected $table = 'project_customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'contact_no', 'post_code', 'project_id'];

    /**
     * Get the project that the customer belongs to.
     *
     * @return void
     */
    public function project()
    {
        return $this->belongsTo('App\Project', 'id', 'project_id');
    }
}
