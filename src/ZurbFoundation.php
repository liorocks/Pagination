<?php namespace Landish\Pagination;

class ZurbFoundation extends Pagination {

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string $text
     * @param  string $class
     * @return string
     */
    protected function getDisabledTextWrapper($text, $class = 'unavailable')
    {
        return $this->getAvailablePageWrapper('', $text, null, $class);
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return $this->getAvailablePageWrapper('', $text, null, 'current');
    }

    /**
     * Get the previous page pagination element.
     *
     * @param  string $text
     * @return string
     */
    protected function getPreviousButton($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text, 'arrow unavailable');
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text, null, 'arrow');
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string $text
     * @return string
     */
    protected function getNextButton($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (!$this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text, 'arrow unavailable');
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text, null, 'arrow');
    }

}