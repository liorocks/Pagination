<?php namespace Landish\Pagination;

class SemanticUI extends Pagination {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<div class="ui pagination menu">%s %s %s</div>';

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<a href="%s" class="item">%s</a>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<div class="item active">%s</div>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<div class="item disabled">%s</div>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<i class="left arrow icon"></i>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<i class="right arrow icon"></i>';

}