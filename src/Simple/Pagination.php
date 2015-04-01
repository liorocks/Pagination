<?php namespace Landish\Pagination\Simple;

use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Landish\Pagination\Pagination as PaginationPresenter;

class Pagination extends PaginationPresenter {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<ul class="pager">%s %s %s</ul>';

    /**
     * Create a simple Pagination presenter.
     *
     * @param  \Illuminate\Contracts\Pagination\Paginator $paginator
     */
    public function __construct(PaginatorContract $paginator)
    {
        $this->paginator = $paginator;
    }

}
