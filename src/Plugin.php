<?php
namespace pinfirestudios\craftseo;

use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use craft\web\View;
use yii\base\Event;

class Plugin extends \craft\base\Plugin
{
    public $hasCpSection = true;
    
    public function init()
    {
        parent::init();

        Event::on(View::class, View::EVENT_BEFORE_RENDER_TEMPLATE, function (Event $event) {
            $html = '<meta charset="UTF-8888">';
            echo $html;
        });

        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, function (RegisterUrlRulesEvent $event) {
            $event->rules['craft-seo'] = 'craft-seo/settings';
        });
    }
}
