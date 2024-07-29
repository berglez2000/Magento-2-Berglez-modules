<?php

namespace Berglez\AddUidAttribute\Observer;

use Berglez\AddUidAttribute\Helper\Data;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class AddUidAttribute implements ObserverInterface
{
    /**
     * @var Data
     */
    protected Data $data;

    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;

    /**
     * @param Data $data
     * @param RequestInterface $request
     */
    public function __construct(
        Data $data,
        RequestInterface $request
    )
    {
        $this->data = $data;
        $this->request = $request;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $layout = $observer->getLayout();

        $fullActionName = $this->request->getFullActionName();

        $dataUid = $this->getDataUidName($fullActionName);

        if(!empty($dataUid)) {
            $layout->getUpdate()->addHandle('add_data_uid');
            $layout->getUpdate()->addUpdate('<body><attribute name="data-uid" value="' . $dataUid . '"></attribute></body>');
        }
    }

    /**
     * @param string $fullActionName
     * @return string
     */
    protected function getDataUidName(string $fullActionName): string
    {
        if($fullActionName === 'cms_index_index') {
            return $this->data->getUidPrefixHomePage();
        }

        if($fullActionName === 'catalog_category_view') {
            return $this->data->getUidPrefixCategoryPage();
        }

        if($fullActionName === 'catalog_product_view') {
            return $this->data->getUidPrefixProductPage();
        }

        return "";
    }
}
