<?php

namespace Spatie\WebhookClient;

class WebhookConfigRepository
{
    /** @var \Spatie\WebhookClient\WebhookConfig[] */
    protected $configs;

    public function addConfig(WebhookConfig $webhookConfig)
    {
        $this->configs[$webhookConfig->name] = $webhookConfig;
    }

    public function getConfig($name)
    {
        return !empty($this->configs[$name]) ? $this->configs[$name] : null;
    }
}
