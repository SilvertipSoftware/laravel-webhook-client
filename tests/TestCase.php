<?php

namespace Spatie\WebhookClient\Tests;

use CreateWebhookCallsTable;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\WebhookClient\WebhookClientServiceProvider;

class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();

        $this->setUpDatabase();
        ini_set('memory_limit', '2G');
    }

    protected function getPackageProviders($app)
    {
        return [
            WebhookClientServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    protected function setUpDatabase()
    {
        include_once __DIR__.'/../database/migrations/create_webhook_calls_table.php.stub';

        (new CreateWebhookCallsTable())->up();
    }
}
