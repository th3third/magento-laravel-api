<?php

namespace Grayloon\Magento\Api;

class GuestCarts extends AbstractApi
{
    /**
     * Enable an customer or guest user to create an empty cart and quote for an anonymous customer.
     *
     * @return string
     */
    public function create()
    {
        return $this->post('/guest-carts');
    }

    /**
     * Enable a guest user to return information for a specified cart.
     *
     * @return array
     */
    public function cart($cartId)
    {
        return $this->get('/guest-carts/'.$cartId);
    }

    /**
     * List items that are assigned to a specified cart.
     *
     * @return array
     */
    public function items($cartId)
    {
        return $this->get('/guest-carts/'.$cartId.'/items');
    }

    /**
     * Add/update the specified cart item.
     *
     * @param  string  $cartId
     * @param  string  $sku
     * @param  string  $quantity
     * @return array
     */
    public function addItem($cartId, $sku, $quantity)
    {
        return $this->post('/guest-carts/'.$cartId.'/items', [
            'cartItem' => [
                'quote_id' => $cartId,
                'sku'      => $sku,
                'qty'      => $quantity,
            ],
        ]);
    }

    /**
     * Return quote totals data for a specified cart.
     *
     * @return array
     */
    public function totals($cartId)
    {
        return $this->get('/guest-carts/'.$cartId.'/totals');
    }

    /**
     * Estimate shipping by address and return list of available shipping methods.
     *
     * @param  string $cartId
     * @param  array  $body
     * @return array
     */
    public function estimateShippingMethods($cartId, $body = [])
    {
        return $this->post('/guest-carts/'.$cartId.'/estimate-shipping-methods', $body);
    }

    /**
     * Calculate quote totals based on address and shipping method.
     *
     * @param  string $cartId
     * @param  array  $body
     * @return array
     */
    public function totalsInformation($cartId, $body = [])
    {
        return $this->post('/guest-carts/'.$cartId.'/totals-information', $body);
    }
}
