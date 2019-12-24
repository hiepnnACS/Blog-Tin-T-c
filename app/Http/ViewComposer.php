<?php 
namespace App\Http;

use Illuminate\Contracts\View\View;
use App\Category;

class ViewComposer {

  protected $data_cate;

  /**
   * Create a new ViewComposer instance.
   */
  public function __construct()
  {
    $this->data_cate = Category::all();
    // dd($this->data_cate);
  }

  /**
   * Compose the view.
   *
   * @return void
   */
  public function compose(View $view)
  {
    $view->with('data_cate', $this->data_cate);
  }

}