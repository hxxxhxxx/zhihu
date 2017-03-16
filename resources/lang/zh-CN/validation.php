<?php

return [
    'required' => ':attribute 不能为空',
    'confirmed' => ':attribute 不匹配',
    'email' => '邮件地址不正确',
    'unique' => '邮箱已被使用',
    'min' => [
        'numeric' => ':attribute 必须不小于 :min',
        'file'    => ':attribute 必须不小于 :min KB',
        'string'  => ':attribute 必须不小于 :min 字符',
        'array'   => ':attribute 必须不小于 :min 项',
    ],
    'max' => [
        'numeric' => ':attribute 不能大于 :max',
        'file'    => ':attribute 不能大于 :max KB',
        'string'  => ':attribute 不能大于 :max 字符',
        'array'   => ':attribute 不能大于 :max 项',
    ],

    'custom' => [
        'name' => [
            'required' => '用户名 不能为空',
            'min' => '用户名 必须不小于 :min 字符',
            'max' => '用户名 必须不大于 :max 字符',
        ],
        'email' => [
            'required' => '邮箱 不能为空',
            'min' => '邮箱 必须不小于 :min 字符',
            'max' => '邮箱 必须不大于 :max 字符',
        ],
        'password' => [
            'required' => '密码 不能为空',
            'confirmed' => '密码 不匹配',
            'min' => '密码 必须不小于 :min 字符',
            'max' => '密码 必须不大于 :max 字符',
        ],

    ],
];