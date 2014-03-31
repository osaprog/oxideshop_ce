<?php
/**
 * This file is part of OXID eShop Community Edition.
 *
 * OXID eShop Community Edition is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eShop Community Edition is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2014
 * @version   OXID eShop CE
 */

require_once realpath(".") . '/unit/OxidTestCase.php';
require_once realpath(".") . '/unit/test_config.inc.php';

/**
 * Testing oxArticle class.
 */
class Unit_Core_oxShopMapperTest extends OxidTestCase
{

    /**
     * Test set/get database gateway.
     */
    public function testSetGetDbGateway()
    {
        $oShopMapper = new oxShopMapper();

        // assert default gateway
        $this->isInstanceOf('oxShopMapperDbGateway', $oShopMapper->getDbGateway());

        $oCustomDbGateway = new stdClass();

        $oShopMapper->setDbGateway($oCustomDbGateway);
        $this->assertSame($oCustomDbGateway, $oShopMapper->getDbGateway());
    }

    /**
     * Provides shop id or list of shops.
     *
     * @return array
     */
    public function _dpTestListOfShops()
    {
        return array(
            array(45),
            array(array()),
            array(array(27)),
            array(array(3, 46, 5)),
        );
    }

    /**
     * Tests add object to shop or list of shops.
     *
     * @param int|array $mShops Shop id or list of shop ids.
     *
     * @dataProvider _dpTestListOfShops
     */
    public function testAddObjectToShops($mShops)
    {
        $iItemId   = 123;
        $sItemType = 'oxarticles';

        $oItem = new oxBase();
        $oItem->init($sItemType);
        $oItem->setId($iItemId);

        /** @var oxShopMapper|PHPUnit_Framework_MockObject_MockObject $oShopMapper */
        $oShopMapper = $this->getMock('oxShopMapper', array('addItemToShops'));
        $oShopMapper->expects($this->once())->method('addItemToShops')
            ->with($iItemId, $sItemType, $mShops)->will($this->returnValue(true));

        $this->assertTrue($oShopMapper->addObjectToShops($oItem, $mShops));
    }

    /**
     * Tests remove object from shop or list of shops.
     *
     * @param int|array $mShops Shop id or list of shop ids.
     *
     * @dataProvider _dpTestListOfShops
     */
    public function testRemoveObjectFromShops($mShops)
    {
        $iItemId   = 123;
        $sItemType = 'oxarticles';

        $oItem = new oxBase();
        $oItem->init($sItemType);
        $oItem->setId($iItemId);

        /** @var oxShopMapper|PHPUnit_Framework_MockObject_MockObject $oShopMapper */
        $oShopMapper = $this->getMock('oxShopMapper', array('removeItemFromShops'));
        $oShopMapper->expects($this->once())->method('removeItemFromShops')
            ->with($iItemId, $sItemType, $mShops)->will($this->returnValue(true));

        $this->assertTrue($oShopMapper->removeObjectFromShops($oItem, $mShops));
    }

    /**
     * Tests add item to shop or list of shops.
     *
     * @param int|array $mShops Shop id or list of shop ids.
     *
     * @dataProvider _dpTestListOfShops
     */
    public function testAddItemToShops($mShops)
    {
        $iItemId   = 123;
        $sItemType = 'oxarticles';

        $oShopMapper = new oxShopMapper();

        $this->assertTrue($oShopMapper->addItemToShops($iItemId, $sItemType, $mShops));
    }

    /**
     * Tests remove item from shop or list of shops.
     *
     * @param int|array $mShops Shop id or list of shop ids.
     *
     * @dataProvider _dpTestListOfShops
     */
    public function testRemoveItemFromShops($mShops)
    {
        $iItemId   = 123;
        $sItemType = 'oxarticles';

        $oShopMapper = new oxShopMapper();

        $this->assertTrue($oShopMapper->removeItemFromShops($iItemId, $sItemType, $mShops));
    }

    /**
     * Tests add item group to shop.
     */
    public function testAddItemGroupToShop()
    {
        $sItemType = 'oxarticles';
        $iShopId   = 456;

        $oShopMapper = new oxShopMapper();

        $this->assertTrue($oShopMapper->addItemGroupToShop($sItemType, $iShopId));
    }

    /**
     * Tests remove item group from shop.
     */
    public function testRemoveItemGroupFromShop()
    {
        $sItemType = 'oxarticles';
        $iShopId   = 456;

        $oShopMapper = new oxShopMapper();

        $this->assertTrue($oShopMapper->removeItemGroupFromShop($sItemType, $iShopId));
    }
}