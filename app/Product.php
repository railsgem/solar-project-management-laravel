<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use SoftDeletes, Sortable;

    /**
     * The attributes that sortable.
     *
     * @var array
     */
    public $sortable =  ['id', 'name', 'price', 'image', 'description'];

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
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'image', 'description'];

    /**
     * Get the product's image path.
     *
     * @return string
     */
    public function getImagePathAttribute()
    {
        $defaultFileStorage= Config::get('filesystems.default');
        $imagefolderUrl= Config::get('filesystems.disks.' . $defaultFileStorage . '.folderUrl') ;
        return $imagefolderUrl . '/' . $this->image;
    }
}
