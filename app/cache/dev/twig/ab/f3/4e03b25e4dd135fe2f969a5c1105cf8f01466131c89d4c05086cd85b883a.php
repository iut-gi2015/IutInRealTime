<?php

/* IirtMessageBundle::layout.html.twig */
class __TwigTemplate_abf34e03b25e4dd135fe2f969a5c1105cf8f01466131c89d4c05086cd85b883a extends Twig_Template
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
        echo " message ...
";
    }

    // line 6
    public function block_section($context, array $blocks = array())
    {
        // line 7
        echo "    
      <nav>
        <ul>
          <li class=\"current\">
              <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("iirt_message_homepage");
        echo "\" class=\"m2\" >liste </a>
          </li>
          <li>
              <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("iirt_message_ajout");
        echo "\" class=\"m2\" >rediger </a>
          </li>
        </ul>
      </nav>
      <div class=\"row\">
        ";
        // line 19
        $this->displayBlock('contenu', $context, $blocks);
        // line 22
        echo "        </div>

";
    }

    // line 19
    public function block_contenu($context, array $blocks = array())
    {
        // line 20
        echo "            
        ";
    }

    public function getTemplateName()
    {
        return "IirtMessageBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 20,  69 => 19,  63 => 22,  61 => 19,  53 => 14,  47 => 11,  41 => 7,  38 => 6,  33 => 3,  30 => 2,);
    }
}
