<?php
namespace imbin\restrouter;

use yii\base\BootstrapInterface;
use yii;

/**
 * load url route
 *
 * @package common\extensions
 */
class ModuleBootstrap implements BootstrapInterface
{
    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        $aModuleList = $app->getModules();

        foreach ($aModuleList as $sKey => $aModule) {
            if (is_array($aModule) && strpos($aModule['class'], '\\modules\\') !== false) {
                $rootPath = Yii::$app->getBasePath() . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $sKey . DIRECTORY_SEPARATOR . 'config';
                $fileList = glob($rootPath . '/route_*.php');
                foreach ($fileList as $file) {
                    if (file_exists($file)) {
                        Yii::trace('route file founded:' .$file, 'bootstrap');
                        $app->getUrlManager()->addRules(require($file), $append = true);
                    }
                }
            }
        }
    }
}