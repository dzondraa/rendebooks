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
      ]
  ]
];
