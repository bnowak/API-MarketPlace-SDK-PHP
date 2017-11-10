<?php
/**
 * Created by CDiscount
 * Created by CDiscount
 * Date: 07/11/2016
 * Time: 10:49
 */

namespace Sdk\Relays;


use Sdk\Common\Point;
use Sdk\Soap\Common\Body;
use Sdk\Soap\Common\Envelope;
use Sdk\Soap\HeaderMessage\HeaderMessage;
use Sdk\Soap\Relays\GetParcelShopList;

class RelaysPoint extends Point
{

    /**
     * Get Parcel Shop List
     */
    public function getParcelShopList()
    {
        $envelope = new Envelope();
        $body = new Body();
        $getParcelShopList = new GetParcelShopList();
        $header = new HeaderMessage();

        $headerXML = $header->generateHeader();
        $submitProductPackageXML = $getParcelShopList->generateEnclosingBalise($headerXML);
        $bodyXML = $body->generateXML($submitProductPackageXML);
        $envelopeXML = $envelope->generateXML($bodyXML);

        $response = $this->_sendRequest('GetParcelShopList', $envelopeXML);

        //$getProductPackageSubmissionResultResponse = new GetProductPackageSubmissionResultResponse($response);
        //return $getProductPackageSubmissionResultResponse;
    }
}