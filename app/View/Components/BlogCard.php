<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $image;
    public $category;
    public $title;
    public $urlpost;
    public $urlcategory;
    public $date;
    public $user;
    public function __construct($image, $category, $title, $urlpost, $date, $urlcategory, $user)
    {
        $this->image = $image;
        $this->category = $category;
        $this->title = $title;
        $this->urlpost = $urlpost;
        $this->date = $date;
        $this->urlcategory = $urlcategory;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-card');
    }
}
