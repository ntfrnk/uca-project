<svg 
    version="1.1" 
    xmlns="http://www.w3.org/2000/svg" 
    width="{{ $size }}" 
    height="{{ $size }}" 
    viewBox="0 0 20 20" 
    class="{{ $class ?? '' }}" 
    style="{{ $style ?? '' }}"
>
    <path d="{{ getIcon($name) }}" fill="{{ $color }}"></path>
</svg>