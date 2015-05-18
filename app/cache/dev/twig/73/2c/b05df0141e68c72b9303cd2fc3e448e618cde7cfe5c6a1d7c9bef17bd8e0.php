<?php

/* IirtAnnouncementBundle:Announcement:afficher.html.twig */
class __TwigTemplate_732cb05df0141e68c72b9303cd2fc3e448e618cde7cfe5c6a1d7c9bef17bd8e0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IirtUserBundle::layout.html.twig");

        $this->blocks = array(
            'contenu' => array($this, 'block_contenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IirtUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_contenu($context, array $blocks = array())
    {
        // line 5
        echo "<h3>Formulaire Utilisateur</h3>
<div class=\"well\">
    ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["annonce"]) ? $context["annonce"] : $this->getContext($context, "annonce")), "title", array()), "html", null, true);
        echo "
         
</div>
";
    }

    public function getTemplateName()
    {
        return "IirtAnnouncementBundle:Announcement:afficher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 7,  31 => 5,  28 => 4,);
    }
}
