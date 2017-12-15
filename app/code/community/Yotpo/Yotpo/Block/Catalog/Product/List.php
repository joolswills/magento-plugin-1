<?php

class Yotpo_Yotpo_Block_Catalog_Product_List extends Mage_Catalog_Block_Product_List {

    protected function _getProductCollection() {
        $_productCollection = parent::_getProductCollection();
        $enableBottomlineCategoryPage = Mage::getStoreConfig('yotpo/yotpo_general_group/enable_bottomline_category_page');
        if ($enableBottomlineCategoryPage) {

            foreach ($_productCollection as $_product) {
                $_product->setRatingSummary(true);
            }
        }
        return $_productCollection;
    }

    public function getReviewsSummaryHtml(Mage_Catalog_Model_Product $product, $templateType = false, $displayIfNoReviews = false) {

        $enableBottomlineCategoryPage = Mage::getStoreConfig('yotpo/yotpo_general_group/enable_bottomline_category_page');
        if ($enableBottomlineCategoryPage) {
            return $this->helper('yotpo')->showBottomline($this, $product);
        } else {
            return parent::getReviewsSummaryHtml($product, $templateType, $displayIfNoReviews);
        }
    }

}
