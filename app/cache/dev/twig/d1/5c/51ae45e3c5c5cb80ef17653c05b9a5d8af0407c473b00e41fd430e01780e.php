<?php

/* IirtAnnouncementBundle::layout.html.twig */
class __TwigTemplate_d15c51ae45e3c5c5cb80ef17653c05b9a5d8af0407c473b00e41fd430e01780e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'bannierre' => array($this, 'block_bannierre'),
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo " annonces ...
";
    }

    // line 8
    public function block_bannierre($context, array $blocks = array())
    {
        // line 9
        echo "          <div class=\"row\" >
\t\t<div class=\"col-lg-12\" id=\"banner\" >
        <h2>IUT in Real Time <span>information en ligne <span>depuis 2015</span></span></h2>
      </div></div>
";
    }

    // line 15
    public function block_section($context, array $blocks = array())
    {
        // line 16
        echo "    
      <nav>
       ";
        // line 20
        echo "        <ul>
          <li class=\"current\"><a href=\"\" class=\"m1\">liste des annonces</a></li>
          <li><a href=\"\" class=\"m2\">rediger un annonce</a></li>
        </ul> 
      </nav>
      <div class=\"row\">
        ";
        // line 26
        $this->displayBlock('contenu', $context, $blocks);
        // line 29
        echo "        </div>

";
    }

    // line 26
    public function block_contenu($context, array $blocks = array())
    {
        // line 27
        echo "            
        ";
    }

    public function getTemplateName()
    {
        return "IirtAnnouncementBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 27,  73 => 26,  67 => 29,  65 => 26,  57 => 20,  53 => 16,  50 => 15,  42 => 9,  39 => 8,  34 => 5,  31 => 4,);
    }
}
