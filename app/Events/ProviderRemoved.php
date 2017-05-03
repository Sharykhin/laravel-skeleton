<?php

namespace App\Events;

use App\Models\Provider;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProviderRemoved
 * @package App\Events\Provider
 */
class ProviderRemoved
{
    use SerializesModels;

    /** @var Provider $provider */
    public $provider;

    /**
     * ProviderRemoved constructor.
     * @param Provider $provider
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }
}
