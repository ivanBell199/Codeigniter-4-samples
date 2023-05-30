<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'parent_id',
        'order_index'
    ];
  
    /**
     * Retrieves the tree of all categories.
     *
     * @return array The category tree.
     */
    public function getCategoryTree(): array
    {
        $categories = $this->orderBy('order_index', 'ASC')->findAll();
        $tree = $this->buildCategoryTree($categories);

        return $tree;
    }

    /**
     * Recursively builds the category tree.
     *
     * @param array $categories The categories to process.
     * @param int|null $parentId The parent category ID.
     * @return array The category tree.
     */
    private function buildCategoryTree(array $categories, ?int $parentId = null): array
    {
        $tree = [];

        foreach ($categories as $category)
        {
            if ($category['parent_id'] == $parentId)
            {
                // Fetch child categories recursively
                $category['children'] = $this->buildCategoryTree($categories, $category['id']);
                $tree[] = $category;
            }
        }

        return $tree;
    } 
}
