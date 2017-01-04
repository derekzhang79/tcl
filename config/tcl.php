<?php

return [//淘车乐配置
    
    //管理员角色对照表
    'user_role_type' =>[

        '超级管理员' => '1',
        '总部管理员' => '2',
        '总部客服'   => '3',
        '总部推广'   => '4',
        '总部财务'   => '5',
        '门店店长'   => '6',
        '门店店员'   => '7',
        '鉴定师'     => '8',
        '评估师'     => '9',
    ],

    //车款年份配置
    'year_type' => [
        '2002',
        '2003',
        '2004',
        '2005',
        '2006',
        '2007',
        '2009',
        '2010',
        '2011',
        '2012',
        '2013',
        '2014',
        '2015',
        '2016',
        '2017',
        '2018',
        '2019'
    ],

    //车型类别配置
    'category_type' =>[
        '1' => '轿车',
        '2' => 'SUV',
        '3' => '面包车',
        '4' => '客车',
        '5' => '货车',
    ],

    //变速箱配置
    'gearbox' =>[
        '0' => '不限',
        '1' => '手动',
        '2' => '自动',
        '3' => '手自一体',
    ],

    //外观颜色
    'out_color' =>[
        '0' => '其它',
        '1' => '黑',
        '2' => '白',
        '3' => '银白',
        '4' => '红',
        '5' => '蓝',
        '6' => '银白',
        '7' => '橙',
    ],

    //内饰颜色
    'inside_color' =>[
        '1' => '深色',
        '2' => '浅色',
        '3' => '其它',
    ],

    //过户次数(车源添加)
    'sale_number' =>[0, 1, 2, 3, 4, 5],

    //车源类型
    'car_type' =>[
        '1' => '用户自售',
        '2' => '淘车乐自售',
        '3' => '来自车商'
    ],

    //客户来源
    'customer_res' =>[
        '1' => '来电',
        '2' => '进店',
        '3' => '朋友介绍',
        '4' => '车商',
        '5' => '广告',
        '6' => '其它',
    ],

    //保险类别
    'safe_type' =>[
        '1' => '商业险',
        '2' => '交强险',
        '3' => '其它',
    ],

    //排量配置数组
    'capacity' =>['不限','1.0L','1.0T','1.2L','1.4L','1.6L','1.8L'],

    //车源状态类别
    'car_stauts' =>[
        '0' => '废弃',
        '1' => '正常',
        '2' => '待跟进',
        '3' => '约车',
        '4' => '订车',
        '5' => '交易',
        '6' => '交易完成',
    ],

    //求购信息状态类别
    'want_stauts' =>[
        '0' => '废弃',
        '1' => '正常',
        '2' => '待跟进',
        '3' => '约车',
        '4' => '订车',
        '5' => '交易',
        '6' => '交易完成',
    ],

    //行驶里程
    'mileage' =>[
        '1' => '无要求',
        '2' => '0-2万公里',
        '3' => '2-5万公里',
        '4' => '5-10万公里',
        '5' => '10万公里以上',
    ],

    //过户次数(求购信息添加)
    'want_sale_number' =>[
        '1' => '无要求',
        '2' => '1次',
        '3' => '2-3次',
        '4' => '3次以上',
    ],

    //销售机会状态
    'chance_status' =>[
        '0' => '废弃',
        '1' => '正常',
        '2' => '待确认',
        '3' => '已确认',
        '4' => '约车',
        '5' => '交易',
        '6' => '交易完成',
    ],

    //约车管理状态
    'plan_status' =>[
        '0' => '废弃',
        '1' => '正常',
        '2' => '交易',
    ],

    //交易状态
    'transcation_status' =>[
        '0' => '废弃',
        '1' => '正常',
        '3' => '交易完成',
    ],

    //置顶
    'is_top' =>[
        '0' => '不置顶',
        '1' => '置顶',
    ],

    //推荐
    'recommend' =>[
        '0' => '不推荐',
        '1' => '推荐',
    ],

    //跟踪来源
    'follow_type' =>[
        '1' => '系统',
        '2' => '互动',
    ],

    //车龄
    'age' =>[
        '1' => '不限',
        '2' => '1-3年',
        '3' => '3-5年',
        '4' => '5-10年以上',
        '5' => '10年以上',
    ],
];