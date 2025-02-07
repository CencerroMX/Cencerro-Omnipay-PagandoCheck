<?php
    namespace Cencerro\OmnipayPagandoCheck;

    use Omnipay\Common\AbstractGateway;
    use Cencerro\OmnipayPagandoCheck\Message\GetTokenRequest;
    use Cencerro\OmnipayPagandoCheck\Message\CreateClientRequest;
    use Cencerro\OmnipayPagandoCheck\Message\AddCardRequest;
    use Cencerro\OmnipayPagandoCheck\Message\CreateOrderRequest;

    class Gateway extends AbstractGateway {
        public function getName() {
            return 'Pagando Check';
        }

        public function getDefaultParameters() {
            return [
                'user' => '',
                'password' => '',
                'token' => '',
                'userId' => '',
                'cardId' => '',
                'folio' => '',
            ];
        }

        public function getCurrentParameters() {
            return [
                'user' => $this->getUser(),
                'password' => $this->getPassword(),
                'token' => $this->getToken(),
                'userId' => $this->getUserId(),
                'cardId' => $this->getCardId(),
                'folio' => $this->getFolio(),
            ];
        }

        public function getUser() {
            return $this->getParameter('user');
        }

        public function setUser($value) {
            return $this->setParameter('user', $value);
        }

        public function getPassword() {
            return $this->getParameter('password');
        }

        public function setPassword($value) {
            return $this->setParameter('password', $value);
        }

        public function getToken() {
            return $this->getParameter('token');
        }

        public function setToken($value) {
            return $this->setParameter('token', $value);
        }

        public function getUserId() {
            return $this->getParameter('userId');
        }

        public function setUserId($value) {
            return $this->setParameter('userId', $value);
        }

        public function getCardId() {
            return $this->getParameter('cardId');
        }

        public function setCardId($value) {
            return $this->setParameter('cardId', $value);
        }

        public function getFolio() {
            return $this->getParameter('folio');
        }

        public function setFolio($value) {
            return $this->setParameter('folio', $value);
        }

        public function getAuthorizationToken() {
            return $this->createRequest(GetTokenRequest::class, []);
        }

        public function createClient(array $parameters = []) {
            return $this->createRequest(CreateClientRequest::class, $parameters);
        }

        public function addCard(array $parameters = []) {
            return $this->createRequest(AddCardRequest::class, $parameters);
        }

        public function purchase(array $parameters = []) {
            return $this->createRequest(CreateOrderRequest::class, $parameters);
        }
    }
?>