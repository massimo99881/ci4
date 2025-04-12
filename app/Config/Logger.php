<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;

class Logger extends BaseConfig
{
    public $threshold = 9;
    public string $dateFormat = 'Y-m-d H:i:s';
    public array $handlers = [
        FileHandler::class => [
            'handles' => [
                'critical',
                'alert',
                'emergency',
                'debug',
                'error',
                'info',
                'notice',
                'warning',
            ],
            'fileExtension' => '.log',
            'filePermissions' => 0644,
            'path' => WRITEPATH . 'logs/',
        ],
    ];
}
