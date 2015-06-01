<?php
use Illuminate\Pagination\LengthAwarePaginator;
use Landish\Pagination\SemanticUI as SemanticUIPresenter;

class SemanticUIPaginationTest extends PHPUnit_Framework_TestCase {

    protected $array = [];
    protected $dir;

    public function __construct() {
        for ($i = 1; $i <= 13; $i++) {
            $this->array[$i] = 'item' . $i;
        }
        $this->dir = __DIR__ . '/fixtures/semantic/';
    }

    public function testSemanticUIPresenterCanGeneratorLinksForSlider() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 7);
        $presenter = new SemanticUIPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'slider.html')),
            $presenter->render()
        );
    }

    public function testSemanticUIPresenterCanGeneratorLinksForTooCloseToBeginning() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 2);
        $presenter = new SemanticUIPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'beginning.html')),
            $presenter->render()
        );
    }

    public function testSemanticUIPresenterCanGeneratorLinksForTooCloseToEnding() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 12);
        $presenter = new SemanticUIPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'ending.html')),
            $presenter->render()
        );
    }

    public function testSemanticUIPresenterCanGeneratorLinksForWhenOnLastPage() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 13);
        $presenter = new SemanticUIPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'last_page.html')),
            $presenter->render()
        );
    }

    public function testSemanticUIPresenterCanGeneratorLinksForWhenOnFirstPage() {
        $p = new LengthAwarePaginator($this->array, count($this->array), 1, 1);
        $presenter = new SemanticUIPresenter($p);
        $this->assertEquals(
            trim(file_get_contents($this->dir . 'first_page.html')),
            $presenter->render()
        );
    }

}