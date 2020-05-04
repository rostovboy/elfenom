<?php namespace Fract\Fenom;


use Fenom\Provider;
use Fenom\ProviderInterface;

class FenomProvider implements ProviderInterface
{
    /**
     * @var Provider
     */
    protected $provider;

    /**
     * @var string
     */
    protected $extension;

    /**
     * @param string $extension
     */
    public function __construct($extension)
    {
        $this->extension = $extension;
    }

    /**
     * {@inheritdoc}
     */
    public function templateExists($tpl)
    {
        $path = $this->getTemplatePath($tpl);

        return file_exists($path) || \View::exists($path);
    }

    /**
     * {@inheritdoc}
     */
    public function getSource($tpl, &$time)
    {
        $path = $this->getTemplatePath($tpl);
        $time = filemtime($path);

        return file_get_contents($path);
    }

    /**
     * {@inheritdoc}
     */
    public function getLastModified($tpl)
    {
        $path = $this->getTemplatePath($tpl);

        return filemtime($path);
    }

    /**
     * {@inheritdoc}
     */
    public function verify(array $templates)
    {
        foreach ($templates as $tpl => $mtime) {
            $path = $this->getTemplatePath($tpl);
            if (@filemtime($path) !== $mtime) {
                return false;
            }

        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        // TODO use extension to find all templates
        return [];
    }

    /**
     * @param $tpl
     *
     * @return string
     */
    protected function getTemplatePath($tpl)
    {
        $tpl = str_replace('#', '::', $tpl);

        return file_exists($tpl) ? $tpl : \View::getFinder()->find($tpl);
    }
}