<?php

return [
    'category'=> [
        'create'=> [
            'success' => 'Category has been added successfully!',
            'error' => 'Create category failed!',
        ],
        'delete'=> [
            'success' => 'Category has been deleted successfully!',
            'error' => 'Delete category failed!',
        ],
        'update'=> [
            'success' => 'Category has been updated successfully!',
            'error' => 'Update category failed!',
        ],
    ],

    'product'=> [
        'create'=> [
            'success' => 'Product has been added successfully!',
            'error' => 'Create product failed!',
        ],
        'delete'=> [
            'success' => 'Product has been deleted successfully!',
            'error' => 'Delete product failed!',
        ],
        'update'=> [
            'success' => 'Product has been updated successfully!',
            'error' => 'Update product failed!',
        ],
    ],

    'cart'=> [
        'update'=> [
            'success' => 'Order has been updated successfully!',
            'error' => 'Update order failed!',
        ],

        'cancel' => [
            'success' => 'Order has been canceled successfully!',
            'error' => 'Cancel order failed!',
        ],
    ],

    'password'=> [
        'update'=> [
            'success' => 'password has been updated successfully!',
            'error' => [
                'not_match' => 'The password doesn`t match',
                'incorrect' => 'Password is not correct',
            ],
        ],
    ],

    'comment'=> [
        'update'=> [
            'success' => 'Comment has been updated successfully!',
            'error' => 'Update comment failed!',
        ],
    ],

    'user'=> [
        'role'=> [
            'success' => 'updated successfully!',
            'error' => 'Update failed!',
        ],
    ],

    'notification'=> [
        'delete'=> [
            'success' => 'Notification has been deleted successfully!',
            'error' => 'Delete notification failed!',
        ],
    ],
];
