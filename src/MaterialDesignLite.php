<?php namespace Landish\Pagination;

class MaterialDesignLite extends Pagination {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<nav class="pagination-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">%s %s %s</nav>';

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<a href="%s"><button class="mdl-button mdl-js-button mdl-button--colored">%s</button></a>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" disabled>%s</button>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<button class="mdl-button mdl-js-button" disabled>%s</button>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<i class="material-icons">arrow_back</i>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<i class="material-icons">arrow_forward</i>';

    /***
     * "Dots" text.
     *
     * @var string
     */
    protected $dotsText = '...';

}
