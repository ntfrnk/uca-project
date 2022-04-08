<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * Nombre del ícono
     * (ver archivo config/icons.php)
     *
     * @var string
     */
    public $name;

    /**
     * Tamaño (en pixeles) del ícono
     *
     * @var int|null
     */
    public $size;

    /**
     * Clase CSS específica para el ícono
     *
     * @var string|null
     */
    public $class;

    /**
     * Estilos inline para el ícono
     *
     * @var string|null
     */
    public $style;

    /**
     * Color del ícono en Hexadecimal
     *
     * @var string|null
     */
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $name,
        $size = '20',
        $class = '',
        $style = '',
        $color = '#000'
    )
    {
        $this->name = $name;
        $this->size = $size;
        $this->class = $class;
        $this->style = $style;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon');
    }
}
