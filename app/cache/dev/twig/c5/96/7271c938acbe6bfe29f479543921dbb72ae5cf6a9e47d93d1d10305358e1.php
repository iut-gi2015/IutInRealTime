<?php

/* ::layout.html.twig */
class __TwigTemplate_c5967271c938acbe6bfe29f479543921dbb72ae5cf6a9e47d93d1d10305358e1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'bannierre' => array($this, 'block_bannierre'),
            'section' => array($this, 'block_section'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
<title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        // line 6
        echo "</title>

<meta charset=\"utf-8\">
";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "</head>
<body id=\"page1\">
<!-- START PAGE SOURCE -->
<div class=\"container\">
<div class=\"wrap\">
  <header>
    <div class=\"row\" class=\"cont\">
      
      <nav>
        <ul>
          <li class=\"current\"><a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("iirt_announcement");
        echo "\" class=\"m1\">Accueil</a></li>
          <li><a href=\"about-us.html\" class=\"m2\">anciens articles</a></li>
          <li><a href=\"articles.html\" class=\"m3\">info utiles</a></li>
          <li><a href=\"contact-us.html\" class=\"m4\">tchat</a></li>
          <li class=\"last\"><a href=\"sitemap.html\" class=\"m5\">faq</a></li>
        </ul>
      </nav>
\t  </div>
\t  <div class=\"row\">
\t  <div class=\"col-lg-7\" >
\t  <h1><a href=\"#\">Student's site</a></h1>
\t  </div>
\t  <div class=\"col-lg-5\">
\t  <div  id=\"\">
\t\t
\t<div  >
            <a class=\"trigger\" href=\"#\"> connexion </a>
            <div id=\"connexion\" class=\"col-lg-8\"  hidden >
            <form action=\"#\" method=\"post\" id=\"form_connect\"  >
                
\t\t<div class=\"form-group\">
                    <input type=\"text\" id=\"pseud\" name=\"pseudo\" placeholder=\"pseudo\" class=\"form-control\" />
                    </div>
\t\t<div class=\"form-group\">
                    <input type=\"password\" id=\"passwrd\" name=\"password\" placeholder=\"mot de passe\" class=\"form-control\" />
                    </div>
\t\t<div class=\"form-group\">
                    <label for=\"souvenir\" >
                    <input style=\"width: 25px;\" type=\"checkbox\" id=\"souvenir\" name=\"souvenir\" value=\"souvenir\" />se souvenir de moi</label>
                    </div>
                    <input class=\"btn btn-primary pullright\" type=\"submit\" value=\"connexion\" />

            </form>
                
            <div class='gauche' >
            <a href=\"\" id=\"mplost\" > mot de passe oublié</a>
            </div>
\t</div>
    </div></div> </div>
\t</div>
  </header>
  <div class=\"row\">
    <aside class=\"col-lg-3\">
       ";
        // line 68
        echo "      <h2>menu <span>utilisateur</span></h2>
      <ul class=\"\">
        <li><a href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("iirt_announcement");
        echo "\">annonces</a></li>
        <li><a href=\"";
        // line 71
        echo $this->env->getExtension('routing')->getPath("iirt_message_homepage");
        echo "\">messages</a></li>
        <li><a href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("iirt_user");
        echo "\">gestion éditeur</a></li>
      </ul>
      <h2>Fresh <span>News</span></h2>
      <ul class=\"news\">
        <li><strong>June 30, 2010</strong>
          <h4><a href=\"#\">Sed ut perspiciatis unde</a></h4>
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque. </li>
      </ul>
\t  <h2>Calendrier</h2>
    </aside>
    <section class=\"col-lg-9\" id=\"content\">
      ";
        // line 83
        $this->displayBlock('bannierre', $context, $blocks);
        // line 85
        echo " 
       
       ";
        // line 87
        $this->displayBlock('section', $context, $blocks);
        // line 89
        echo "    </section>
  </div>
</div>
    <footer>
      <div class=\"foot\">
            <div style=\"clear:both;\">
                <p class=\"lf\">Copyright &copy; 2015 <a href=\"#\">club gi (iut in real time)</a> - All Rights Reserved</p>
            <!-- <p class=\"rf\">Design by <a href=\"http://www.templatemonster.com/\">TemplateMonster</a></p> -->
            </div>
      </div>
    </footer>
</div>
";
        // line 101
        $this->displayBlock('javascript', $context, $blocks);
        // line 114
        echo "<!--<script type=\"text/javascript\"> Cufon.now(); </script>
 END PAGE SOURCE -->
</body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "
";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/reset.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 83
    public function block_bannierre($context, array $blocks = array())
    {
        // line 84
        echo "          
       ";
    }

    // line 87
    public function block_section($context, array $blocks = array())
    {
        // line 88
        echo "       ";
    }

    // line 101
    public function block_javascript($context, array $blocks = array())
    {
        // line 102
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
    
    /* LA CONNEXION */
    \$(\".trigger\").click(function(e){
            e.preventDefault();
            \$(\"#connexion\").slideToggle();
    });
\t\t
</script>
";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 103,  198 => 102,  195 => 101,  191 => 88,  188 => 87,  183 => 84,  180 => 83,  174 => 12,  170 => 11,  165 => 10,  162 => 9,  157 => 5,  154 => 4,  146 => 114,  144 => 101,  130 => 89,  128 => 87,  124 => 85,  122 => 83,  108 => 72,  104 => 71,  100 => 70,  96 => 68,  50 => 24,  38 => 14,  36 => 9,  31 => 6,  29 => 4,  24 => 1,);
    }
}
