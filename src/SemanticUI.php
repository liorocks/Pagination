<?php namespace Landish\Pagination;

class SemanticUI extends Pagination {

    /**
     * Convert the URL window into Bootstrap HTML.
     *
     * @return string
     */
    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<div class="ui pagination menu">%s %s %s</div>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

    /**
     * Get HTML wrapper for an available page link.
     *
     * @param  string $url
     * @param  int $page
     * @param  string|null $rel
     * @param  string $class
     * @return string
     */
    protected function getAvailablePageWrapper($url, $page, $rel = null, $class = 'item')
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<a class="item'.($class ? ' ' . $class : '').'" href="'.htmlentities($url).'"'.$rel.'>'.$page.'</a>';
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string $text
     * @param  string $class
     * @return string
     */
    protected function getDisabledTextWrapper($text, $class = '')
    {
        return '<div class="item disabled'.( $class ? ' ' .$class : '').'">'.$text.'</div>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<div class="item active">'.$text.'</div>';
    }

    /**
     * Get the previous page pagination element.
     *
     * @param  string $text
     * @return string
     */
    protected function getPreviousButton($text = '<i class="left arrow icon"></i>')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text, 'icon');
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text, null, 'icon');
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string $text
     * @return string
     */
    protected function getNextButton($text = '<i class="right arrow icon"></i>')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (!$this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text, 'icon');
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text, null, 'icon');
    }

}