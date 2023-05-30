<ul>
    <?php foreach ($categories as $category) : ?>
    <li>
        <span><?= esc($category['name']) ?></span>
        
        <?php if (!empty($category['children'])) : ?>
        <!-- Call this view inside itself -->
        <?= view('categories_tree', ['categories' => $category['children']]) ?>
        <?php endif ?>
        
    </li>
    <?php endforeach ?>
</ul>
