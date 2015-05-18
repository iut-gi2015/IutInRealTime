<?php

/* IirtMessageBundle:message:index.html.twig */
class __TwigTemplate_2f9169e2e3148b11b7d795062c7a9f51dc98a7707e044a3be353d402f902d658 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IirtMessageBundle::layout.html.twig");

        $this->blocks = array(
            'contenu' => array($this, 'block_contenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IirtMessageBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenu($context, array $blocks = array())
    {
        // line 4
        echo "    
       <h2>liste des messages </h2>
        <ul class=\"list\">
          
        </ul>

  ";
    }

    public function getTemplateName()
    {
        return "IirtMessageBundle:message:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
