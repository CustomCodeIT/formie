<?php
namespace verbb\formie\events;

use verbb\formie\base\Integration;

use craft\events\CancelableEvent;

class IntegrationFormSettingsEvent extends CancelableEvent
{
    // Properties
    // =========================================================================

    public ?Integration $integration = null;
    public ?array $settings = null;
    
}
