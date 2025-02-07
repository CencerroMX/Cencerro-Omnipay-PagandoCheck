<?php
    namespace Cencerro\OmnipayPagandoCheck\Message;

    class CreateOrderRequest extends AbstractRequest {
        public function getData() {
            $this->validate('userId', 'amount', 'concept', 'cardId', 'items');

            return [
                'userId' => $this->getUserId(),
                'amount' => $this->getAmount(),
                'concept' => $this->getConcept(),
                'cardId' => $this->getCardId(),
                'aftToken' => $this->getAFTToken(),
                'pin' => $this->getPin(),
                'street' => $this->getStreet(),
                'noExt' => $this->getNoExt(),
                'district' => $this->getDistrict(),
                'zipCode' => $this->getZipCode(),
                'city' => $this->getCity(),
                'state' => $this->getState(),
                'country' => $this->getCountry(),
                'expediteShipping' => $this->getExpediteShipping(),
                'items' => $this->getItems(),
            ];
        }

        public function sendData($data) {                
            $httpResponse = $this->httpClient->request(
                'POST',
                'https://api.pagandocheck.com/v1/pagando/orders/create-order',
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'bearer ' . $this->getToken()
                ],
                json_encode($data)
            );

            return $this->response = new CreateOrderResponse($this, json_decode($httpResponse->getBody()->getContents(), true));
        }
    }
?>