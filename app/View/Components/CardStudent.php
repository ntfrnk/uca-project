<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardStudent extends Component
{
    /**
     * Objeto usuario
     *
     * @var App\Models\User
     */
    public $user;

    /**
     * Objeto curso
     *
     * @var App\Models\Course
     */
    public $course;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-student');
    }
}
