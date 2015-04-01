<?php namespace Landish\Pagination;

class PaginationHTML {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<ul class="pagination">%s %s %s</ul>';

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<li><a href="%s">%s</a></li>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<li class="active"><span>%s</span></li>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<li class="disabled"><span>%s</span></li>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '&laquo;';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '&raquo;';

    /***
     * "Dots" text.
     *
     * @var string
     */
    protected $dotsText = '...';

    /**
     * Get pagination wrapper HTML.
     *
     * @return string
     */
    protected function getPaginationWrapperHTML() {
        return $this->paginationWrapper;
    }

    /**
     * Get available page wrapper HTML.
     *
     * @return string
     */
    protected function getAvailablePageWrapperHTML() {
        return $this->availablePageWrapper;
    }

    /**
     * Get active page wrapper HTML.
     *
     * @return string
     */
    protected function getActivePageWrapperHTML() {
        return $this->activePageWrapper;
    }

    /**
     * Get disabled page wrapper HTML.
     *
     * @return string
     */
    protected function getDisabledPageWrapperHTML() {
        return $this->disabledPageWrapper;
    }

    /**
     * Get previous button text.
     *
     * @return string
     */
    protected function getPreviousButtonText() {
        return $this->previousButtonText;
    }

    /**
     * Get next button text.
     *
     * @return string
     */
    protected function getNextButtonText() {
        return $this->nextButtonText;
    }

    /***
     * Get "dots" text.
     *
     * @return string
     */
    protected function getDotsText() {
        return $this->dotsText;
    }

}