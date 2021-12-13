<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Sync\Service\SyncList;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class SyncListItemContext extends InstanceContext {
    /**
     * Initialize the SyncListItemContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $listSid The list_sid
     * @param int $index The index
     */
    public function __construct(Version $version, $serviceSid, $listSid, $index) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'listSid' => $listSid, 'index' => $index, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Lists/' . \rawurlencode($listSid) . '/Items/' . \rawurlencode($index) . '';
    }

    /**
     * Fetch a SyncListItemInstance
     *
     * @return SyncListItemInstance Fetched SyncListItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): SyncListItemInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SyncListItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['listSid'],
            $this->solution['index']
        );
    }

    /**
     * Deletes the SyncListItemInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the SyncListItemInstance
     *
     * @param array $data The data
     * @return SyncListItemInstance Updated SyncListItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $data): SyncListItemInstance {
        $data = Values::of(['Data' => Serialize::jsonObject($data), ]);

        $payload = $this->version->update(
            'POST',
            $this->uri,
            [],
            $data
        );

        return new SyncListItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['listSid'],
            $this->solution['index']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Sync.SyncListItemContext ' . \implode(' ', $context) . ']';
    }
}