<?php namespace Landish\Pagination\Simple;

use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Landish\Pagination\SemanticUI as SemanticUIPresenter;

class SemanticUI extends SemanticUIPresenter {

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