<?php

/*  ============= DATABASE ============= */
define('DB_HOST',             'localhost');
define('DB_DATABASE',         'ilearning');
define('DB_USERNAME',         'root');
define('DB_PASS',             '');
define('DB_TABLE',            'user');

/*  ============= ROOT PATH============= */
define('SEPARATOR',             '/');
define('ROOT_PATH',             __DIR__ . SEPARATOR);
define('CONFIG',                'config.ini');
define('MODULE_DEFAULT',        'default');
define('CONTROLLER_DEFAULT',    'index');
define('ACTION_DEFAULT',        'index');
define('VIEW_DEFAULT',          'index');

/*  ============= APP - MODULE - ADMIN - DEFAULT PATH============= */
define('APP_PATH',                  ROOT_PATH . 'App' . SEPARATOR);
define('MODULE_PATH',               APP_PATH . 'Module' .SEPARATOR);
define('ADMIN_PATH',                MODULE_PATH . 'admin' .SEPARATOR);
define('DEFAULT_PATH',              MODULE_PATH . 'default' .SEPARATOR);

/*  ============= APP - INIT DEFAULT PATH============= */
define('CONTROLLER_DEFAULT_PATH',   DEFAULT_PATH . 'Controller' .SEPARATOR);
define('MODEL_DEFAULT_PATH',        DEFAULT_PATH . 'Model' .SEPARATOR);
define('VIEW_DEFAULT_PATH',         DEFAULT_PATH . 'View' .SEPARATOR);

/*  ============= ROOT - LIBS PATH============= */
define('LIBS_PATH',             ROOT_PATH . 'Libs' .SEPARATOR);

/*  ============= ROOT - PUBLIC PATH============= */
define('PUBLIC_PATH',           ROOT_PATH . 'Public' .SEPARATOR);
define('TEMPLATE_PATH',         PUBLIC_PATH . 'Template' .SEPARATOR);
define('TEMPLATE_DEFAULT_PATH',          TEMPLATE_PATH . 'default' .SEPARATOR);
define('TEMPLATE_CN_PATH',               TEMPLATE_PATH . 'cn_version' .SEPARATOR);

/*  ============= PUBLIC URL============= */
define('PUBLIC_URL',            SEPARATOR . 'Public' . SEPARATOR);

/*  ============= PUBLIC - CSS - JS - IMAGES URL============= */
define('PUB_CSS_URL',           PUBLIC_URL . 'css' .SEPARATOR);
define('PUB_JS_URL',            PUBLIC_URL . 'js' .SEPARATOR);
define('PUB_IMG_URL',           PUBLIC_URL . 'images' .SEPARATOR);

/*  ============= TEMPLATE URL============= */
define('TEMPLATE_URL',          PUBLIC_URL . 'Template' .SEPARATOR);
define('DEFAULT_URL',           PUBLIC_URL . 'default' .SEPARATOR);
define('CN_URL',                PUBLIC_URL . 'cn_version' .SEPARATOR);



