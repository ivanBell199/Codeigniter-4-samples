<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Example extends BaseController
{
    public function controllerForAJAX($someVariable)
    {
        $data = [
            // Usually I include models in BaseController
            // So here I need to get the needed data
            'some-name' => $this->myModel->getSomeData(),
        ];

        // Then pass the data to the view file
        // that is dedicated to the dynamic part of the page
        $newContent = view('view-with-the-dynamic-content', $data);
        
        // Pass the result back to index.php and update the content
        return $this->response->setJSON([
            'newContent' => $newContent,
        ]);
    }
}
