<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class OutgoingCallerIdContext extends InstanceContext {
    /**
     * Initialize the OutgoingCallerIdContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     *                           to fetch
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid, ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/OutgoingCallerIds/' . \rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a OutgoingCallerIdInstance
     *
     * @return OutgoingCallerIdInstance Fetched OutgoingCallerIdInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): OutgoingCallerIdInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new OutgoingCallerIdInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the OutgoingCallerIdInstance
     *
     * @param array|Options $options Optional Arguments
     * @return OutgoingCallerIdInstance Updated OutgoingCallerIdInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): OutgoingCallerIdInstance {
        $options = new Values($options);

        $data = Values::of(['FriendlyName' => $options['friendlyName'], ]);

        $payload = $this->version->update(
            'POST',
            $this->uri,
            [],
            $data
        );

        return new OutgoingCallerIdInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the OutgoingCallerIdInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Api.V2010.OutgoingCallerIdContext ' . \implode(' ', $context) . ']';
    }
}