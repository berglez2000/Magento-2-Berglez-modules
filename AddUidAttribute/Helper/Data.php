<?php

namespace Berglez\AddUidAttribute\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper {
    const string XML_PATH_UID_PREFIX_HOME_PAGE = 'berglez_section/general/uid_prefix_home_page';
    const string XML_PATH_UID_PREFIX_CATEGORY_PAGE = 'berglez_section/general/uid_prefix_category_page';
    const string XML_PATH_UID_PREFIX_PRODUCT_PAGE = 'berglez_section/general/uid_prefix_product_page';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
         Context $context
    )
    {
        $this->scopeConfig = $context->getScopeConfig();
        parent::__construct($context);
    }

    /**
     * @param $storeId
     * @return mixed
     */
    public function getUidPrefixHomePage($storeId = null): mixed
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_UID_PREFIX_HOME_PAGE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param $storeId
     * @return mixed
     */
    public function getUidPrefixCategoryPage($storeId = null): mixed
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_UID_PREFIX_CATEGORY_PAGE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param $storeId
     * @return mixed
     */
    public function getUidPrefixProductPage($storeId = null): mixed
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_UID_PREFIX_PRODUCT_PAGE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
