<?php

/* IirtAnnouncementBundle:Announcement:modifier.html.twig */
class __TwigTemplate_74b6dbf62abb18bf54634723c2434e712a45652c699775d48d9f066688d2e6eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IirtAnnouncementBundle::layout.html.twig");

        $this->blocks = array(
            'contenu' => array($this, 'block_contenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IirtAnnouncementBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_contenu($context, array $blocks = array())
    {
        // line 6
        echo "<h3>Formulaire Utilisateur</h3>
<div class=\"well\">
    <form method=\"post\" ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
         <input type=\"submit\" class=\"btn btn-primary\" />
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "IirtAnnouncementBundle:Announcement:modifier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 9,  35 => 8,  31 => 6,  28 => 5,);
    }
}
