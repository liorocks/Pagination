<?php
use Illuminate\Pagination\LengthAwarePaginator;
use Landish\Pagination\Pagination as BootstrapPresenter;

class BootstrapPaginationTest extends PHPUnit_Framework_TestCase {

    protected $array = [];
    protected $dir;

    public function __construct() {
        for ($i = 1; $i <= 13; $i++) {
            $this->array[$i] = 'item' . $i;
        }
        $this->dir = __DIR__ . '/fixtures/bootstrap/';
    }

    public function testBootstrapPresenterCanGeneratorLinksForSlider() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 7);
        $presenter = new BootstrapPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'slider.html')),
            $presenter->render()
        );
    }

    public function testBootstrapPresenterCanGeneratorLinksForTooCloseToBeginning() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 2);
        $presenter = new BootstrapPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'beginning.html')),
            $presenter->render()
        );
    }

    public function testBootstrapPresenterCanGeneratorLinksForTooCloseToEnding() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 12);
        $presenter = new BootstrapPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'ending.html')),
            $presenter->render()
        );
    }

    public function testBootstrapPresenterCanGeneratorLinksForWhenOnLastPage() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 13);
        $presenter = new BootstrapPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'last_page.html')),
            $presenter->render()
        );
    }

    public function testBootstrapPresenterCanGeneratorLinksForWhenOnFirstPage() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 1);
        $presenter = new BootstrapPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'first_page.html')),
            $presenter->render()
        );
    }

}