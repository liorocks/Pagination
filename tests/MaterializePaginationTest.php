<?php

/**
* Materialize Pagination Test
*/
use Illuminate\Pagination\LengthAwarePaginator;
use Landish\Pagination\Materialize as MaterializePresenter;

class MaterializePaginationTest extends PHPUnit_Framework_TestCase
{
  protected $array = [];
  protected $dir;
  protected $presenter;

  public function __construct() {

    parent::__construct();

    for ($i = 1; $i <= 10; $i++) {
      $this->array[$i] = 'item'.$i;
    }

    $this->dir = __DIR__.'/fixtures/materialize/';
  }

  public function testMaterializePresenterCanGenerateLinksForTooCloseToBegining()
  {
    $p = new LengthAwarePaginator($this->array, count($this->array), 1, 2);
    $presenter = new MaterializePresenter($p);

    $this->assertEquals(
      trim(file_get_contents($this->dir.'beginning.html')),
      $presenter->render()
    );
  }

  public function testMaterializePresenterCanGenerateLinksForTooCloseToEnding()
  {
    $p = new LengthAwarePaginator($this->array, count($this->array), 1, 9);
    $presenter = new MaterializePresenter($p);

    $this->assertEquals(
      trim(file_get_contents($this->dir.'ending.html')),
      $presenter->render()
    );
  }

  public function testMaterializePresenterCanGenerateLinksForLastPage()
  {
    $p = new LengthAwarePaginator($this->array, count($this->array), 1, 10);
    $presenter = new MaterializePresenter($p);

    $this->assertEquals(
      trim(file_get_contents($this->dir.'last_page.html')),
      $presenter->render()
    );
  }

  public function testMaterializePresenterCanGenerateLinksForFirstPage()
  {
    $p = new LengthAwarePaginator($this->array, count($this->array), 1, 1);
    $presenter = new MaterializePresenter($p);

    $this->assertEquals(
      trim(file_get_contents($this->dir.'first_page.html')),
      $presenter->render()
    );
  }
}
