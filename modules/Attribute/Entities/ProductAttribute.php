<?php

namespace Modules\Attribute\Entities;

use Modules\Support\Eloquent\Model;

class ProductAttribute extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['attribute', 'values'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attribute_id','product_id'];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];


    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }


    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }


    public function getNameAttribute()
    {
        return $this->attribute->name;
    }


    public function getAttributeSetAttribute()
    {
        return $this->attribute->attributeSet->name;
    }
}
