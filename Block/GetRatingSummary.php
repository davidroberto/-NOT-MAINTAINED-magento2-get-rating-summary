<?php

namespace DavidRobert\GetRatingSummary\Block;

use \Magento\Framework\Registry;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Review\Model\ReviewFactory;
use \Magento\Store\Model\StoreManagerInterface;

class GetRatingSummary extends Template
{

	/**
	 * @var Registry
	 */
	protected $_registry;

	/**
	 * @var ReviewFactory
	 */
	protected $_reviewFactory;

	/**
	 * @var StoreManagerInterface
	 */
	protected $_storeManager;

	public function __construct(
		Context $context,
		Registry $registry,
		ReviewFactory $reviewFactory,
		StoreManagerInterface $storeManager,
		array $data = []
	)
	{
		parent::__construct($context, $data);
		$this->_registry = $registry;
		$this->_reviewFactory = $reviewFactory;
		$this->_storeManager = $storeManager;
	}

    public function getRatingGlobal()
    {
	    $product = $this->getCurrentProduct();
	    $this->_reviewFactory->create()->getEntitySummary($product, $this->_storeManager->getStore()->getId());
	    $ratingGlobal = $product->getRatingSummary();

	    return $ratingGlobal;

    }

    public function getRatingSummary()
    {
    	return $this->getRatingGlobal()->getRatingSummary();
    }

	public function getRatingCount()
	{
		return $this->getCurrentProduct()->getRatingSummary()->getReviewsCount();
	}

    public function getCurrentProduct()
    {
	    $product = $this->_registry->registry('current_product');

	    return $product;
    }
}
