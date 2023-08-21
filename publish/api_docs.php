<?php

declare(strict_types=1);

use Hyperf\ApiDocs\DTO\GlobalResponse;
use function Hyperf\Support\env;

return [
    /*
    |--------------------------------------------------------------------------
    | 启动 swagger 服务
    |--------------------------------------------------------------------------
    |
    | false 将不会启动 swagger 服务
    |
    */
    'enable' => env('APP_ENV') !== 'prod',

    /*
    |--------------------------------------------------------------------------
    | 生成swagger文件格式
    |--------------------------------------------------------------------------
    |
    | 支持json和yaml
    |
    */
    'format' => 'json',

    /*
    |--------------------------------------------------------------------------
    | 生成swagger文件
    |--------------------------------------------------------------------------
    */
    'output_dir' => BASE_PATH . '/runtime/swagger',

    /*
    |--------------------------------------------------------------------------
    | 生成代理类路径
    |--------------------------------------------------------------------------
    */
    'proxy_dir' => BASE_PATH . '/runtime/container/proxy',

    /*
    |--------------------------------------------------------------------------
    | 设置路由前缀
    |--------------------------------------------------------------------------
    */
    'prefix_url' => env('API_DOCS_PREFIX_URL', '/swagger'),

    /*
    |--------------------------------------------------------------------------
    | 设置swagger资源路径,不设置默认prefix_url
    |--------------------------------------------------------------------------
    */
    // 'prefix_resources' => env('API_DOCS_PREFIX_resources', '/swagger'),

    /*
    |--------------------------------------------------------------------------
    | 设置全局返回的代理类
    |--------------------------------------------------------------------------
    |
    | 全局返回 如:[code=>200,data=>null] 格式,设置会后会全局生成对应文档
    | 配合ApiVariable注解使用,示例参考GlobalResponse类
    | 返回数据格式可以利用AOP统一返回
    |
    */
    // 'global_return_responses_class' => GlobalResponse::class,

    /*
    |--------------------------------------------------------------------------
    | 替换验证属性
    |--------------------------------------------------------------------------
    |
    | 通过获取注解ApiModelProperty的值,来提供数据验证的提示信息
    |
    */
    'validation_custom_attributes' => true,

    /*
    |--------------------------------------------------------------------------
    | 设置DTO类默认值等级
    |--------------------------------------------------------------------------
    |
    | 设置:0 默认(不设置默认值)
    | 设置:1 简单类型会为设置默认值,复杂类型(带?)会设置null
    |        - 简单类型默认值: int:0  float:0  string:''  bool:false  array:[]  mixed:null
    | 设置:2 (慎用)包含等级1且复杂类型(联合类型除外)会设置null
    |
    */
    'dto_default_value_level' => 0,

    /*
    |--------------------------------------------------------------------------
    | 全局responses,映射到ApiResponse注解对象
    |--------------------------------------------------------------------------
    */
    'responses' => [
        ['response' => 401, 'description' => 'Unauthorized'],
        ['response' => 500, 'description' => 'System error'],
    ],

    /*
    |--------------------------------------------------------------------------
    | swagger 的基础配置
    |--------------------------------------------------------------------------
    |
    | 该属性会映射到OpenAPI对象
    |
    */
    'swagger' => [
        'info' => [
            'title' => 'API DOC',
            'version' => '0.1',
            'description' => 'swagger api desc',
        ],
        'servers' => [
            [
                'url' => 'http://127.0.0.1:9501',
                'description' => 'OpenApi host',
            ],
        ],
        'components' => [
            'securitySchemes' => [
                [
                    'securityScheme' => 'Authorization',
                    'type' => 'apiKey',
                    'in' => 'header',
                    'name' => 'Authorization',
                ],
            ],
        ],
        'security' => [
            ['Authorization' => []],
        ],
        'externalDocs' => [
            'description' => 'Find out more about Swagger',
            'url' => 'https://github.com/tw2066/api-docs',
        ],
    ],
];
