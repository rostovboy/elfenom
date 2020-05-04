<?php namespace Fract\Fenom;

use Fenom;
use Illuminate\View\Engines\EngineInterface;

class FenomEngine implements EngineInterface
{

    /**
     * @param Fenom $fenom
     */
    public function __construct(Fenom $fenom)
    {
        $this->fenom = $fenom;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param  string $path
     * @param  array  $data
     *
     * @return string
     */
    public function get($path, array $data = array())
    {
        return $this->fenom->fetch($path, $data);
    }

}