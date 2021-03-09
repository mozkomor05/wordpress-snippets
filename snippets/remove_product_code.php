<?php

$query = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => -1,
    'meta_query' => [
        [
            [
                'key' => 'product_specification_0_product_specification_title',
                'value' => 'Product code',
                'compare' => '='
            ]
        ]
    ]
]);


$query->get_posts();

foreach ($query->posts as $post) {
    delete_row('product_specification', 0, $post->ID);
    echo ">> Deleted row of post {$post->ID}" . PHP_EOL;
}