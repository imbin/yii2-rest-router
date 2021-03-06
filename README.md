# yii2-rest-router
Config rest routes for Yii2.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist imbin/yii2-rest-router "*"
```

or add

```
"imbin/yii2-rest-router": "*"
```

to the require section of your `composer.json` file.


## Configuration

Once the extension is installed, simply add it in your config by:

Basic ```config/web.php```

Advanced ```frontend/config/main.php```

```php
    'bootstrap' => [
            'log',
            'imbin\restrouter\ModuleBootstrap'
        ],
```

## Code

Code File: frontend/modules/sample/Module.php
```php
<?php

namespace frontend\modules\sample;

/**
 * order module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\sample\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}

```

Code File: frontend/modules/sample/config/routes_default.php
```php

<?php
return [
    'GET sample/list/<page:\d+>/<pageSize:\d+>' => 'sample/default/index',
    'GET sample/<id:\d+>' => 'sample/default/detail',
    'POST sample/cate/<cate:(a|b|c)>' => 'sample/default/category',
    //more...
];

```

Code File: frontend/modules/sample/controllers/DefaultController.php
```php

<?php
namespace frontend\modules\sample\controllers;

use yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function init()
    {
        parent::init();
    }

    public function actionIndex($page, $pageSize = 10)
    {
        //your code here
    }
    public function actionDetail($id)
    {
        //your code here
    }
    public function actionCategory($cate)
    {
        //your code here
    }
}
```

## Usage

```

# id=1
http://localhost/sample/1

# first page
http://localhost/sample/list/1

# the first page and 10 rows per page
http://localhost/sample/list/1/10

# category=a
http://localhost/sample/cate/a
```
