<?php

use ZepSDK\ZepSDKServiceProvider;
use ZepSDK\Tests\BaseTest;

class ZepSDKServiceProviderTest extends BaseTest
{
    protected function getPackageProviders($app): array
    {
        return [ZepSDKServiceProvider::class];
    }

    public function testZepSDKServiceProviderIsRegistered()
    {
        $this->assertTrue($this->app->getProvider(ZepSDKServiceProvider::class) instanceof ZepSDKServiceProvider);
        $this->assertFileExists('config/zep.php');
    }
}