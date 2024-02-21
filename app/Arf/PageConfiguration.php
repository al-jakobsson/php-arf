<?php

namespace Arf;

class PageConfiguration
{
    public string $view;
    public string $title;
    public string $header = 'components/page-header';
    public array $beforeContent = ['components/navbar' => []];
    public array $afterContent = ['components/page-footer' => []];
    public array $pageData = [];

    /**
     * @param string $view
     * @param string $title
     * @param array $options Set values for: @var string $header, @var array $beforeContent, @var array $afterContent, @var array $pageData
     */
    public function __construct(string $view, string $title, array $options = [])
    {
        $this->view = $view;
        $this->title = $title;

        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}