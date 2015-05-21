<?php

/* IirtUserBundle::layout.html.twig */
class __TwigTemplate_6d17d2a4d27003be9191079b6ce3d41ee8671d7b24565ac4052a1729efa0fb3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'section' => array($this, 'block_section'),
            'contenu' => array($this, 'block_contenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo " nom de l'utilisateur
";
    }

    // line 6
    public function block_section($context, array $blocks = array())
    {
        // line 7
        echo "    
      <nav>
        <ul>
          <li class=\"current\"><a href=\"\" class=\"m1\">liste des messages</a></li>
          <li><a href=\"\" class=\"m2\">rediger un message</a></li>
        </ul>
      </nav>
      <div class=\"row\">
        ";
        // line 15
        $this->displayBlock('contenu', $context, $blocks);
        // line 18
        echo "        </div>

";
    }

    // line 15
    public function block_contenu($context, array $blocks = array())
    {
        // line 16
        echo "            
        ";
    }

    public function getTemplateName()
    {
        return "IirtUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 16,  59 => 15,  53 => 18,  51 => 15,  41 => 7,  38 => 6,  33 => 3,  30 => 2,);
    }
}
