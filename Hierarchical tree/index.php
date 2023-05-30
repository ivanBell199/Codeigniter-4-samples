<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  
<body>
  <h3>List of categories:</h3>
  <!-- Call here the view that recursively displays categories -->
  <?= view('admin/categories/categories_tree', ['categories' => $categories]) ?>
</body>
  
</html>
