<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
        // The tree is built in the model
        $categoryTree = $this->categoryModel->getCategoryTree();
        // Display normal view, the tree is displayed in a separate view
        return view('index', ['categories' => $categoryTree]);
    }
}
