<?php
/**
 * Date: 10/11/2017
 * Time: 11:30
 * @author Bartłomiej Nowak <barteknowak90@gmail.com>
 */

namespace Sdk\Common;

use Sdk\ConfigTools\ConfigFileLoader;
use Sdk\HttpTools\CDSApiSoapRequest;

abstract class Point
{
    /**
     * @var null|CDSApiSoapRequest
     */
    private $_lastRequest;

    /**
     * @param string $method
     * @param string $data
     * @return string
     */
    protected function _sendRequest($method, $data)
    {
        $headerRequestURL = ConfigFileLoader::getInstance()->getConfAttribute('methodurl');
        $apiURL = ConfigFileLoader::getInstance()->getConfAttribute('url');
        $this->_lastRequest = new CDSApiSoapRequest($method, $headerRequestURL, $apiURL, $data);

        return $this->_lastRequest->call();
    }

    /**
     * @return null|CDSApiSoapRequest
     */
    public function getLastRequest()
    {
        return $this->_lastRequest;
    }

    /**
     * @return bool
     */
    public function hasLastRequest()
    {
        return isset($this->_lastRequest);
    }
}