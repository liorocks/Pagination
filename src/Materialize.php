<?php namespace Landish\Pagination;

class Materialize extends Pagination {

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<li class="waves-effect"><a href="%s">%s</a></li>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<li class="active"><a href="#!">%s</a></li>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<li class="disabled"><a href="#!">%s</a></li>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<i class="material-icons">keyboard_arrow_left</i>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<i class="material-icons">keyboard_arrow_right</i>';

}
