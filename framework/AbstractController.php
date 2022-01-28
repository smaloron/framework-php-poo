<?php
namespace m2i\framework;


class abstractController {

    protected Request $request;

    protected array $container;

    public function __construct(Request $request, array $container){
        $this->request = $request;
        $this->container = $container;
    }


}