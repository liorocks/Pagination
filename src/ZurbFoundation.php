<?php namespace Landish\Pagination;

class ZurbFoundation extends Pagination {

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<li class="current"><a href="">%s</a></li>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<li class="unavailable"><a href="">%s</a></li>';

}