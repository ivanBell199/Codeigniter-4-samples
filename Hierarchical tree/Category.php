<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
        $categoryTree = $this->categoryModel->getCategoryTree();
        return view('index', ['categories' => $categoryTree]);
    }
}
