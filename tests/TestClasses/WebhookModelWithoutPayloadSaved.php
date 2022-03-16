<?php

namespace Spatie\WebhookClient\Tests\TestClasses;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\Models\WebhookCall;

class WebhookModelWithoutPayloadSaved extends WebhookCall
{
    public static function storeWebhook(WebhookConfig $config, Request $request)
    {
        return WebhookCall::create([
            'name' => $config->name,
            'payload' => [],
        ]);
    }
}
