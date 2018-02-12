<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 2:18 AM
 */
class Page_data
{
    public $data = [


        'admin_addproductcategory' => [
            'title' => 'Product',
            'info' => 'Add Product Category',
            'tab' => 'Edtel Admin | Product Category',
            'links' => [

            ]
        ],

        'admin_addproduct' => [
            'title' => 'Product',
            'info' => 'Add Product',
            'tab' => 'Edtel Admin | Product',
            'links' => [

            ]
        ],

        'admin_allproduct' => [
            'title' => 'Products',
            'info' => 'View Products',
            'tab' => 'Edtel Admin | Product List',
            'links' => [

            ]
        ],

        'admin_createpost' => [
            'title' => 'Blog',
            'info' => 'Create Post',
            'tab' => 'Edtel Admin | Blog ',
            'links' => [

            ]
        ],

        'admin_allpost' => [
            'title' => 'Blog',
            'info' => 'View Posts',
            'tab' => 'Edtel Admin | Blog',
            'links' => [

            ]
        ],

        'admin_orders' => [
            'title' => 'Orders',
            'info' => 'View Orders',
            'tab' => 'Edtel Admin | Orders',
            'links' => [

            ]
        ],

        'admin_access' => [
            'title' => 'Access Control',
            'info' => 'Change user access',
            'tab' => 'Edtel Admin | Access Control',
            'links' => [

            ]
        ]

    ];

    function get_data($page_id)
    {
        $data = [
            'title' => '',
            'info' => '',
            'tab' => '',
            'links' => []
        ];

        $d = element($page_id, $this->data);

        if ($d)
        {
            $data['title'] = element('title', $d);
            $data['info'] = element('info', $d);
            $data['tab'] = element('tab' , $d);
            $data['links'] = element('links', $d, []);

        }

        return $data;
    }
}