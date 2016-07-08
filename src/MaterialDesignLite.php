<?php namespace Landish\Pagination;

class MaterialDesignLite extends Pagination {

    /**
     * Pagination wrapper HTML.
     * Use class 'Pagination__container' for extra container styling, 'Pagination__nav' for extra nav styling
     * @var string
     */
    protected $paginationWrapper = '<div class="mdl-grid Pagination__container" style="display: flex;justify-content: center;">' .
            '<nav style="display: flex;justify-content: center;" class="mdl-cell mdl-cell--12-col Pagination__nav">%s %s %s</nav>' .
        '</div>';

    /**
     * Available page wrapper HTML.
     * Use class 'Pagination__available-page-button' for extra available page button styling
     * @var string
     */
    protected $availablePageWrapper = '<a href="%s">' .
            '<button class="mdl-button mdl-js-button mdl-button--colored Pagination__available-page-button">%s</button>' .
        '</a>';

    /**
     * Get active page wrapper HTML.
     * Use class 'Pagination__active-page-button' for extra active page button styling
     * @var string
     */
    protected $activePageWrapper = '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored Pagination__active-page-button" disabled>%s</button>';

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
