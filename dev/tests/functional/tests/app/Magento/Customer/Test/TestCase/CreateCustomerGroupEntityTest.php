<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Customer\Test\TestCase;

use Magento\Customer\Test\Fixture\CustomerGroupInjectable;
use Magento\Customer\Test\Page\Adminhtml\CustomerGroupIndex;
use Magento\Customer\Test\Page\Adminhtml\CustomerGroupNew;
use Mtf\TestCase\Injectable;

/**
 * Test Creation for CreateCustomerGroupEntity
 *
 * Test Flow:
 * 1.Log in to backend as admin user.
 * 2.Navigate to Stores>Other Settings>Customer Groups.
 * 3.Start to create new Customer Group.
 * 4.Fill in all data according to data set.
 * 5.Click "Save Customer Group" button.
 * 6.Perform all assertions.
 *
 * @group Customer_Groups_(MX)
 * @ZephyrId MAGETWO-23422
 */
class CreateCustomerGroupEntityTest extends Injectable
{
    /**
     * Customer group index
     *
     * @var CustomerGroupIndex
     */
    protected $customerGroupIndex;

    /**
     * New customer group
     *
     * @var CustomerGroupNew
     */
    protected $customerGroupNew;

    /**
     * @param CustomerGroupIndex $customerGroupIndex
     * @param CustomerGroupNew $customerGroupNew
     */
    public function __inject(
        CustomerGroupIndex $customerGroupIndex,
        CustomerGroupNew $customerGroupNew
    ) {
        $this->customerGroupIndex = $customerGroupIndex;
        $this->customerGroupNew = $customerGroupNew;
    }

    /**
     * Create customer group
     *
     * @param CustomerGroupInjectable $customerGroup
     */
    public function testCreateCustomerGroup(
        CustomerGroupInjectable $customerGroup
    ) {
        //Steps
        $this->customerGroupIndex->open();
        $this->customerGroupIndex->getGridPageActions()->addNew();
        $this->customerGroupNew->getPageMainForm()->fill($customerGroup);
        $this->customerGroupNew->getPageMainActions()->save();
    }
}
