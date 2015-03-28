<?php namespace Landish\Pagination;

class UIKit extends Pagination {

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
                '<ul class="uk-pagination">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '<li class="uk-disabled"><span>'.$text.'</span></li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="uk-active"><span>'.$text.'</span></li>';
    }

    /**
     * Get the previous page pagination element.
     *
     * @param  string $text
     * @return string
     */
    protected function getPreviousButton($text = '<i class="uk-icon-angle-double-left"></i>')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text, 'prev');
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string $text
     * @return string
     */
    protected function getNextButton($text = '<i class="uk-icon-angle-double-right"></i>')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (!$this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text, 'next');
    }

}