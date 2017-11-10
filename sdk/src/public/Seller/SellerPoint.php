<?php
/**
 * Created by CDiscount
 * Created by CDiscount
 * Date: 27/09/2016
 * Time: 15:19
 */

namespace Sdk\Seller;
use Sdk\Common\Point;
use Sdk\Soap\Common\Body;
use Sdk\Soap\Common\Envelope;
use Sdk\Soap\HeaderMessage\HeaderMessage;
use Sdk\Soap\Seller\GetSellerIndicators;
use Sdk\Soap\Seller\GetSellerInformation;
use Sdk\Soap\Seller\GetSellerInformationResponse;
use Sdk\Soap\Seller\Response\GetSellerIndicatorsResponse;

/**
 * Class SellerPoint
 * @package Seller
 */
class SellerPoint extends Point
{

    /**
     * SellerPoint constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return GetSellerInformationResponse
     */
    public function getSellerInformation()
    {
        $envelope = new Envelope();
        $body = new Body();
        $getSellerInfo = new GetSellerInformation();
        $header = new HeaderMessage();

        $headerXML = $header->generateHeader();
        $getSellerInfoXML = $getSellerInfo->generateEnclosingBalise($headerXML);
        $bodyXML = $body->generateXML($getSellerInfoXML);
        $envelopeXML = $envelope->generateXML($bodyXML);

        $response = $this->_sendRequest('GetSellerInformation', $envelopeXML);

        $sellerInfoResponse = new GetSellerInformationResponse($response);
        return $sellerInfoResponse;
    }

    /**
     * @return GetSellerIndicatorsResponse
     */
    public function getSellerIndicators()
    {
        $envelope = new Envelope();
        $body = new Body();
        $getSellerInfo = new GetSellerIndicators();
        $header = new HeaderMessage();

        $headerXML = $header->generateHeader();
        $getSellerInfoXML = $getSellerInfo->generateEnclosingBalise($headerXML);
        $bodyXML = $body->generateXML($getSellerInfoXML);
        $envelopeXML = $envelope->generateXML($bodyXML);

        //echo '<p>'.nl2br(htmlentities($envelopeXML , ENT_QUOTES | ENT_IGNORE, "UTF-8")).'</p>';

        $response = $this->_sendRequest('GetSellerIndicators', $envelopeXML);

        //echo '<p>'.nl2br(htmlentities($response , ENT_QUOTES | ENT_IGNORE, "UTF-8")).'</p>';

        $getSellerIndicatorsResponse = new GetSellerIndicatorsResponse($response);
        return $getSellerIndicatorsResponse;
    }
}