<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 19/09/2017
 * Time: 10:50 PM
 */

$config = array(

    'signup' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
         ),

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
         ),
         
         array(
            'field' => 'firstname',
            'label' => 'First Name',
            'rules' => 'required'
         ),

         array(
            'field' => 'lastname',
            'label' => 'Last Name',
            'rules' => 'required'
         ),
    ),

    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
         ),

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
         ),
    ),

    'material' => array(
        array(
            'field' => 'material_name',
            'label' => 'Material Name',
            'rules' => 'required'
         ),

        array(
            'field' => 'author',
            'label' => 'Author Name',
            'rules' => 'required'
         )
    ),

    'due' => array(
        array(
            'field' => 'due_name',
            'label' => 'Due Name',
            'rules' => 'required'
         ),

        array(
            'field' => 'price',
            'label' => 'Amount',
            'rules' => 'required'
         )
    ),

    'exco' => array(
        array(
            'field' => 'fullname',
            'label' => 'Full Name',
            'rules' => 'required'
         ),

        array(
            'field' => 'position',
            'label' => 'Post',
            'rules' => 'required'
        ),

        array(
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'required'
        ),

        array(
            'field' => 'phone',
            'label' => 'Phone Number',
            'rules' => 'required'
        ),

        array(
            'field' => 'classSession',
            'label' => 'Session',
            'rules' => 'required'
         )
    ),

    'addcat' => array(
        array(
            'field' => 'category_name',
            'label' => 'Category Name',
            'rules' => 'required'
         )
    ),

    'blogpost' => array(
        array(
            'field' => 'title',
            'label' => 'Post Title',
            'rules' => 'required'
        ),

        array(
            'field' => 'post',
            'label' => 'Post Description',
            'rules' => 'required'
        ),

        array(
            'field' => 'category_id',
            'label' => 'Post Category',
            'rules' => 'required'
        )

    ),
    
    'news' => array(
        array(
            'field' => 'title',
            'label' => 'News Title',
            'rules' => 'required'
        ),

        array(
            'field' => 'news_post',
            'label' => 'News Description',
            'rules' => 'required'
        )

    ),

    'access' => array(
        array(
            'field' => 'user_id',
            'label' => 'Name',
            'rules' => 'required'
        ),

        array(
            'field' => 'privilege',
            'label' => 'Access Level',
            'rules' => 'required'
        ),

    ),

    'forgot' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
        )

    ),

        
    'confirm' => array(
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )

    )

);

$config['error_prefix'] = '<div class="badge" style="color: #ffffff;">';
$config['error_suffix'] = '</div>';
