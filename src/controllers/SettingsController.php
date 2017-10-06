<?php
namespace pinfirestudios\craftseo\controllers;

use Craft;
use craft\db\Query;
use craft\web\Controller;

class SettingsController extends Controller
{
    public function actionIndex()
    {
        $metaTagAttributes = (new Query())
            ->select(['attribute'])
            ->from(['{{%craftseo_meta_tag_attribute}}'])
            ->column();

        return $this->renderTemplate('craft-seo/settings', [
            'metaTagAttributes' => $metaTagAttributes,
        ]);
    }
}
