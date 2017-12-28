# magento2-get-rating-summary
Display rating summary on product page: average stars and reviews counts

## Installation
Clone this repo into app/code/[VendorName]. Enable the module in the shell "php bin/magento setup:upgrade". 
You can now call the module anywhere in the product layout: 

<block name="rating.summary.product" class="DavidRobert\GetRatingSummary\Block\GetRatingSummary" template="DavidRobert_GetRatingSummary::display_rating_summary.phtml"/>
