<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2019/2/1
 * Time: 9:18
 */

namespace think\composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * activate() 插件载入后被调用
 *
 * Composer\Composer 和 Composer\IO\IOInterface。
 * 使用这两个对象可以读取所有的配置，操作所有的内部对象和状态。
 *
 *
 * Class Plugin
 * @package think\composer
 */
class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $manager = $composer->getInstallationManager();

        //框架核心
        $manager->addInstaller(new ThinkFramework($io, $composer));

        //单元测试
        $manager->addInstaller(new ThinkTesting($io, $composer));

        //扩展
        $manager->addInstaller(new ThinkExtend($io, $composer));

    }
}