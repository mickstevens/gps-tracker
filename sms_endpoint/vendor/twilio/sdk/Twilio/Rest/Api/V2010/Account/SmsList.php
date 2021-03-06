<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Rest\Api\V2010\Account\Sms\ShortCodeList;
use Twilio\Rest\Api\V2010\Account\Sms\SmsMessageList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\Sms\SmsMessageList messages
 * @property \Twilio\Rest\Api\V2010\Account\Sms\ShortCodeList shortCodes
 * @method \Twilio\Rest\Api\V2010\Account\Sms\SmsMessageContext messages(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\Sms\ShortCodeContext shortCodes(string $sid)
 */
class SmsList extends ListResource {
    protected $_messages = null;
    protected $_shortCodes = null;

    /**
     * Construct the SmsList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return \Twilio\Rest\Api\V2010\Account\SmsList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
    }

    /**
     * Access the messages
     */
    protected function getMessages() {
        if (!$this->_messages) {
            $this->_messages = new SmsMessageList(
                $this->version,
                $this->solution['accountSid']
            );
        }
        
        return $this->_messages;
    }

    /**
     * Access the shortCodes
     */
    protected function getShortCodes() {
        if (!$this->_shortCodes) {
            $this->_shortCodes = new ShortCodeList(
                $this->version,
                $this->solution['accountSid']
            );
        }
        
        return $this->_shortCodes;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }
        
        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.SmsList]';
    }
}