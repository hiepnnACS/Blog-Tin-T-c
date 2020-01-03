<?php 
namespace App\Http;

use Illuminate\Contracts\View\View;
use App\Category;

class ViewComposer {

  /**
   * Create a new ViewComposer instance.
   */
  public function __construct()
  {
    $this->category = Category::orderBy('name', 'ASC')
                              ->where('is_menu' , 1)
                              ->with('childrenCategory')
                              ->get();
  }

  /**
   * Compose the view.
   *
   * @return void
   */
  public function compose(View $view)
  {
    $view->with('category', $this->category);
  }

}