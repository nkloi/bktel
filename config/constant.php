<?php

return [   
    'roles' => [
        'administrator' => 1,
        'supervisor' => 2,
        'teacher' => 3,
        'student' => 4,
    ],

    'column_teacher' => [
        'email' => 0,
        'password' => 1,
        'first_name' => 2,
        'last_name' => 3,
        'teacher_code' => 4,
        'department' => 5,
        'faculty' => 6,
        'address' => 7,
        'phone' => 8,
        'note' => 9
    ],

    'column_student' => [
        'email' => 0,
        'password' => 1,
        'first_name' => 2,
        'last_name' => 3,
        'student_code' => 4,
        'department' => 5,
        'faculty' => 6,
        'address' => 7,
        'phone' => 8,
        'note' => 9
    ],

    'column_subject' =>[
        'name' => 0,
        'code' => 1,
        'note' => 2,
    ]
];

