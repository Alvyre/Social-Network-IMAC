<?php

/* home.twig */
class __TwigTemplate_7ba911de8d1a2eed19a132fc7416411cdc4ea908f106464804896f61ae2471b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo twig_escape_filter($this->env, (isset($context["datas"]) ? $context["datas"] : null), "html", null, true);
        echo "

";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{datas}}*/
/* */
/* */
