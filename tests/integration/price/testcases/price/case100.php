<?php
/* RRP = 10
 * Price enter mode: brutto
 * Price view mode: netto
 * Product count: 4
 * VAT info: 15
 * Discount number: 4
 *  1. shop; %
 */
$aData = array (
        'articles' => array (
                0 => array (
                        'oxid'            => '1000',
                        'oxprice'         => 9.99,
                        'oxtprice'        => 10
                ),
                1 => array (
                        'oxid'            => '1001',
                        'oxprice'         => 9.99,
                        'oxtprice'        => 10
                ),
                2 => array (
                        'oxid'            => '1002',
                        'oxprice'         => 9.99,
                        'oxtprice'        => 10
                ),
                3 => array (
                        'oxid'            => '1003',
                        'oxprice'         => 9.99,
                        'oxtprice'        => 10
                ),
        ),
        'discounts' => array (
                0 => array (
                        'oxid'             => 'percentFor1000',
                        'oxaddsum'         => 20,
                        'oxaddsumtype'     => '%',
                        'oxprice'          => 0,
                        'oxpriceto'        => 99999,
                        'oxamount'         => 0,
                        'oxamountto'       => 99999,
                        'oxactive'         => 1,
                        'oxarticles'       => array ( 1000 ),
                ),
                1 => array (
                        'oxid'         => 'percentFor1001',
                        'oxaddsum'     => -10,
                        'oxaddsumtype' => '%',
                        'oxprice'    => 0,
                        'oxpriceto' => 99999,
                        'oxamount' => 0,
                        'oxamountto' => 99999,
                        'oxactive' => 1,
                        'oxarticles' => array ( 1001 ),
                ),
                2 => array (
                        'oxid'             => 'percentFor1002',
                        'oxaddsum'         => -5.2,
                        'oxaddsumtype'     => '%',
                        'oxprice'          => 0,
                        'oxpriceto'        => 99999,
                        'oxamount'         => 0,
                        'oxamountto'       => 99999,
                        'oxactive'         => 1,
                        'oxarticles'       => array ( 1002 ),
                ),
                3 => array (
                        'oxid'         => 'percentFor1003',
                        'oxaddsum'     => 5.5,
                        'oxaddsumtype' => '%',
                        'oxprice'    => 0,
                        'oxpriceto' => 99999,
                        'oxamount' => 0,
                        'oxamountto' => 99999,
                        'oxactive' => 1,
                        'oxarticles' => array ( 1003 ),
                ),
        ),
        'expected' => array (
                1000 => array (
                        'base_price'        => '9,99',
                        'price'             => '6,95',
                        'rrp_price'         => '8,70',
                        'show_rrp'          => true
                ),
                1001 => array (
                        'base_price'        => '9,99',
                        'price'             => '9,56',
                        'rrp_price'         => '',
                        'show_rrp'          => false
                ),
                1002 => array (
                        'base_price'        => '9,99',
                        'price'             => '9,14',
                        'rrp_price'         => '',
                        'show_rrp'          => false
                ),
                1003 => array (
                        'base_price'        => '9,99',
                        'price'             => '8,21',
                        'rrp_price'         => '8,70',
                        'show_rrp'          => true
                ),
        ),
        'options' => array (
                'config' => array(
                        'blEnterNetPrice' => false,
                        'blShowNetPrice' => true,
                        'dDefaultVAT' => 15,
                ),
                'activeCurrencyRate' => 1,
        ),
);