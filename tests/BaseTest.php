<?php
namespace ZepSDK\Tests;


use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use ZepSDK\ZepClient;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
	protected $zepClient;

	public function __construct($apiKey)
	{
		$this->zepClient = new ZepClient('z_1dWlkIjoiYmM1NzcxODAtMzE4NC00NzVkLTk5NmQtNTY5MmZhMDMzOGUwIn0.u8GZV2ZGBiYNZLE2VJ9N4mU48ZlM9SPLceATzDdbnf8axqPG_EYK2xrNYzQPtP3M8Za-AGYrjc28HlTBh65Bdg');
	}

    protected function getEnvironmentSetUp($app)
    {
        // make sure, our .env file is loaded
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }

	/**
	 * @throws \JsonException
	 */
	protected function testSessionsOrdered() {
		// Call the sessionsOrdered method
		$response = $this->zepClient->getSessionsOrdered();

		// Assert that the response status is 200
		$this->assertEquals(200, $response->getStatusCode());
	}
}
