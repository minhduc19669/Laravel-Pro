<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{

    protected $table = "categories";
    protected $fillable = [
        'category_product_name', 'category_product_desc', 'category_news_name', 'category_news_desc',
        'category_sub_product_name', 'category_sub_product_desc', 'cate_pro_id'
    ];
    protected $primaryKey = 'cate_pro_id';

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function SubCategories()
    {
        return $this->hasMany(Category::class, 'parent_id','cate_pro_id');

    }
}
