<?php
/*
    |--------------------------------------------------------------------------
    | Definition of endpoints
    |--------------------------------------------------------------------------
    |
    | You can define here main entities of your application with and define
    | data types. You can use text, text-area, file, file-multiple, number
    |
    |
    */

return [

  'book' => [
      'title' => 'Book',
      'store-route-name' => 'books.store',
      'fields' => [
          'title' => [
              'label' => 'Title',
              'type' => 'text',
              'name' => 'title'
          ],
          'description' => [
              'label' => 'Description',
              'type' => 'textarea',
              'name' => 'description',
              'rows' => '5'
          ],
          'teaser' => [
              'label' => 'Book teaser',
              'type' => 'textarea',
              'name' => 'teaser',
              'rows' => '5'
          ],
          'isbn' => [
              'label' => 'ISBN',
              'type' => 'text',
              'name' => 'isbn'
          ],
          'publishing-year' => [
              'label' => 'Publishing year',
              'type' => 'number',
              'name' => 'publishing_year'
          ],
          'photo' => [
              'label' => 'Main book photo',
              'type' => 'file',
              'name' => 'photo',
              'multiple' => false
          ],
          'gallery' => [
              'label' => 'Book gallery',
              'type' => 'file',
              'name' => 'gallery',
              'multiple' => true
          ],
          'category' => [
              'label' => 'Category',
              'type' => 'select',
              'name' => 'category',
              'options' => [
                  '0' => 'Select category'
              ]
          ],
          'edition' => [
              'label' => 'Edition',
              'type' => 'select',
              'name' => 'edition',
              'options' => [
                  '0' => 'Select edition'
              ]
          ]
      ]
  ],
  'user' => [
      'title' => 'User',
      'store-route-name' => 'users.store',
      'fields' => [
          'first-name' => [
              'label' => 'First name',
              'type' => 'text',
              'name' => 'first_name'
          ],
          'last-name' => [
              'label' => 'Last name',
              'type' => 'text',
              'name' => 'last_name'
          ],
          'username' => [
              'label' => 'Username',
              'type' => 'text',
              'name' => 'username'
          ],
          'password' => [
              'label' => 'Password',
              'type' => 'password',
              'name' => 'password'
          ],
          'email' => [
              'label' => 'Email',
              'type' => 'text',
              'name' => 'email'
          ],

          'phone-number' => [
              'label' => 'Phone number',
              'type' => 'text',
              'name' => 'phone_number'
          ],
          'role' => [
              'label' => 'Phone number',
              'type' => 'select',
              'name' => 'role',
              'options' => [
                  '0' => 'Select user role',
                  '1' => 'Admin',
                  '2' => 'User'
              ]
          ]
      ]
  ],
  'edition' => [
      'title' => 'Edition',
      'store-route-name' => 'editions.store',
      'fields' => [
          'name' => [
              'label' => 'Edition name',
              'type' => 'text',
              'name' => 'name'
          ],
          'description' => [
              'label' => 'Description',
              'type' => 'textarea',
              'name' => 'decription'
          ],
          'photo' => [
              'label' => 'Edition photo',
              'type' => 'file',
              'name' => 'photo'
          ],
        ]
    ]
];
