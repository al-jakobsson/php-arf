<?php

namespace Arf;

class PageConfiguration
{
    public string $view;
    public string $title;
    public string $header = 'Components/DefaultPageHeader';
    public array $beforeContent = [];
    public array $afterContent = [];

    public string $footer = 'Components/DefaultPageFooter';
    public array $pageData = [];

    /**
     * @param string $view
     * @param array $options Set values for: @var string $title @var string $header, @var array $beforeContent, @var array $afterContent, @var array $pageData
     */
    public function __construct(string $view, array $options = [])
    {
        $this->view = $view;

        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}