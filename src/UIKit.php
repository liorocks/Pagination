<?php namespace Landish\Pagination;

class UIKit extends Pagination {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<ul class="uk-pagination">%s %s %s</ul>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<li class="uk-disabled"><span>%s</span></li>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<li class="uk-active"><span>%s</span></li>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<i class="uk-icon-angle-double-left"></i>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<i class="uk-icon-angle-double-right"></i>';

}