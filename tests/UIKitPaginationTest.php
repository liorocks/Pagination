<?php
use Illuminate\Pagination\LengthAwarePaginator;
use Landish\Pagination\UIKit as UIKitPresenter;

class UIKitPaginationTest extends PHPUnit_Framework_TestCase {

    protected $array = [];
    protected $dir;

    public function __construct() {
        for ($i = 1; $i <= 13; $i++) {
            $this->array[$i] = 'item' . $i;
        }
        $this->dir = __DIR__ . '/fixtures/uikit/';
    }

    public function testUIKitPresenterCanGeneratorLinksForSlider() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 7);
        $presenter = new UIKitPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'slider.html')),
            $presenter->render()
        );
    }

    public function testUIKitPresenterCanGeneratorLinksForTooCloseToBeginning() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 2);
        $presenter = new UIKitPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'beginning.html')),
            $presenter->render()
        );
    }

    public function testUIKitPresenterCanGeneratorLinksForTooCloseToEnding() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 12);
        $presenter = new UIKitPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'ending.html')),
            $presenter->render()
        );
    }

    public function testUIKitPresenterCanGeneratorLinksForWhenOnLastPage() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 13);
        $presenter = new UIKitPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'last_page.html')),
            $presenter->render()
        );
    }

    public function testUIKitPresenterCanGeneratorLinksForWhenOnFirstPage() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 1);
        $presenter = new UIKitPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'first_page.html')),
            $presenter->render()
        );
    }

}