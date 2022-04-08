<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardCourseStudent extends Component
{
    /**
     * Objeto curso
     *
     * @var App\Models\Course
     */
    public $course;

    /**
     * Mostrar botón de desuscripción
     *
     * @var bool
     */
    public $unsubscription;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $unsubscription = false)
    {
        $this->course = $course;
        $this->unsubscription = $unsubscription;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-course-student');
    }
}
