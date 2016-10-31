<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\SubAccountFacade;

/**
 * Class SubAccountClient
 */
class SubAccountClient extends AbstractClient
{
    /**
     * @param string $appUserId
     * @param int    $appAccountId
     */
    public function getAccounts($appUserId)
    {
        $uri = 'users/'.$appUserId.'/subaccounts';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\SubAccountFacade>', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function getAccount($appUserId, $appAccountId)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$appAccountId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\SubAccountFacade', 'json');
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     */
    public function createSubAccount($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts';
        $body = $this->serializer->serialize($subAccount, 'json');
        return $this->action('POST', $uri, $body);
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     */
    public function updateAccount($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$subAccount->appAccountId;
        $body = $this->serializer->serialize($subAccount, 'json');

        return $this->action('PUT', $uri, $body);
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     */
    public function deleteSubAccount($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$subAccount->appAccountId;
        $body = $this->serializer->serialize($subAccount, 'json');

        return $this->action('DELETE', $uri, $body);
    }
}
