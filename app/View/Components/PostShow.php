<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $post; // 클래스의 멤버 변수 선언

    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-show');
    }
}
