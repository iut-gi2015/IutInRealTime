<?php

/* IirtAnnouncementBundle:Announcement:ajouter.html.twig */
class __TwigTemplate_d37866d0defc6a4d58861cd76f9a3f1954d24860716565f2b03a9d87b79b8d76 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IirtAnnouncementBundle::layout.html.twig");

        $this->blocks = array(
            'bannierre' => array($this, 'block_bannierre'),
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
    public function block_bannierre($context, array $blocks = array())
    {
        // line 6
        echo "    
";
    }

    // line 9
    public function block_contenu($context, array $blocks = array())
    {
        // line 10
        echo "<h3>Formulaire Annonce</h3>
<div class=\"well\">
    <form method=\"post\" ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
         <input type=\"submit\" class=\"btn btn-primary\" />
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "IirtAnnouncementBundle:Announcement:ajouter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 13,  44 => 12,  40 => 10,  37 => 9,  32 => 6,  29 => 5,);
    }
}
