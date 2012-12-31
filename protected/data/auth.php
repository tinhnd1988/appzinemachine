<?php
return array (
  'Member' => 
  array (
    'type' => 2,
    'description' => 'Can only read a post',
    'bizRule' => '',
    'data' => '',
  ),
  'Guest' => 
  array (
    'type' => 2,
    'description' => 'Guest',
    'bizRule' => '',
    'data' => '',
  ),
  'User' => 
  array (
    'type' => 2,
    'description' => 'Can post a comment',
    'bizRule' => '',
    'data' => '',
    'assignments' => 
    array (
      3 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'Admin' => 
  array (
    'type' => 2,
    'description' => 'Admin',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'Member',
    ),
    'assignments' => 
    array (
      7 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      1 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
