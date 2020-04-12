<?php

/*  ============= DATABASE ============= */
define('DB_HOST',             'localhost');
define('DB_DATABASE',         'ilearning');
define('DB_USERNAME',         'root');
define('DB_PASS',             '');
define('DB_TABLE',            'user');

/*  ============= ROOT PATH============= */
define('DS',             '/');
define('ROOT_PATH',             __DIR__ . DS);
define('CONFIG',                'config.ini');
define('MODULE_DEFAULT',        'default');
define('CONTROLLER_DEFAULT',    'index');
define('ACTION_DEFAULT',        'index');
define('VIEW_DEFAULT',          'index');

/*  ============= APP - MODULE - ADMIN - DEFAULT PATH============= */
define('APP_PATH',                  ROOT_PATH . 'App' . DS);
define('MODULE_PATH',               APP_PATH . 'Module' .DS);
define('ADMIN_PATH',                MODULE_PATH . 'admin' .DS);
define('DEFAULT_PATH',              MODULE_PATH . 'default' .DS);

/*  ============= APP - INIT DEFAULT PATH============= */
define('CONTROLLER_DEFAULT_PATH',   DEFAULT_PATH . 'Controller' .DS);
define('MODEL_DEFAULT_PATH',        DEFAULT_PATH . 'Model' .DS);
define('VIEW_DEFAULT_PATH',         DEFAULT_PATH . 'View' .DS);

/*  ============= ROOT - LIBS PATH============= */
define('LIBS_PATH',             ROOT_PATH . 'Libs' .DS);

/*  ============= ROOT - PUBLIC PATH============= */
define('PUBLIC_PATH',                    ROOT_PATH . 'Public' .DS);
define('TEMPLATE_PATH',                  PUBLIC_PATH . 'Template' .DS);
define('TEMPLATE_DEFAULT_PATH',          TEMPLATE_PATH . 'default' .DS);
define('TEMPLATE_CN_PATH',               TEMPLATE_PATH . 'cn_version' .DS);

/*  ============= PUBLIC URL============= */
define('ROOT_URL',              DS . 'mycv' . DS);
define('PUBLIC_URL',            ROOT_URL . 'Public' . DS);

/*  ============= PUBLIC - CSS - JS - IMAGES URL============= */
define('PUB_CSS_URL',           PUBLIC_URL . 'css' .DS);
define('PUB_JS_URL',            PUBLIC_URL . 'js' .DS);
define('PUB_IMG_URL',           PUBLIC_URL . 'images' .DS);

/*  ============= TEMPLATE URL============= */
define('TEMPLATE_URL',          PUBLIC_URL . 'Template' .DS);
define('DEFAULT_URL',           TEMPLATE_URL . 'default' .DS);
define('CN_URL',                TEMPLATE_URL . 'cn_version' .DS);



