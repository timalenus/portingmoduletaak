<?php

/* modules/drupalmoduleupgrader/templates/Report.html.twig */
class __TwigTemplate_0fb49b38864721ec352f963b1f06338c8449a08592a02c0b961af42df8920391 extends Twig_Template
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
        $tags = array("for" => 84);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>Drupal Module Upgrader analysis report</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700,600' rel='stylesheet' type='text/css' />
    <style type=\"text/css\">
    <!--

body {
  width: 80%;
  color: #343434;
  margin: 1em auto;
  font-family: 'Open Sans', Verdana, sans-serif;
}

details {
  font-size: 18px;
  line-height: 25px;
  margin-bottom: 2em;
  display: list-item;
  list-style: none;
}

details summary {
  padding: 1em;
  margin-bottom: 1em;
  display: list-item;
  cursor: pointer;
}

details.error summary {
  background-color: #ffd5d5;
}

details.warning summary {
  background-color: #fff3bb;
}

a {
  color: #095cb1;
  font-weight: bold;
  text-decoration: none;
}

h5 {
  font-size: 1em;
}

aside {
  font-style: italic;
  line-height: 20px;
  font-size: 15px;
}

.group {
  border: 1px solid #ececec;
  padding: 1em;
  display: block;
}

.group > summary {
  padding: 0;
  color: #c8c8c8;
  margin-bottom: 0;;
  font-weight: bold;
  letter-spacing: .1em;
  text-transform: uppercase;
  display: list-item;
}

.group[open] > summary {
  margin-bottom: 1em;
}

.group > details:last-child {
  margin-bottom: 0;
}

    -->
    </style>
  </head>
  <body>
    <h1>Drupal Module Upgrader analysis report</h1>
  ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["issues"] ?? null));
        foreach ($context['_seq'] as $context["tag"] => $context["tagged_issues"]) {
            // line 85
            echo "    <details open=\"true\" class=\"group\">
      <summary>";
            // line 86
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["tag"], "html", null, true));
            echo "</summary>
      ";
            // line 87
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["tagged_issues"], "html", null, true));
            echo "
    </details>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tag'], $context['tagged_issues'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "modules/drupalmoduleupgrader/templates/Report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 90,  139 => 87,  135 => 86,  132 => 85,  128 => 84,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/drupalmoduleupgrader/templates/Report.html.twig", "/Users/timalenus/Sites/devdesktop/porting_module_taak/modules/drupalmoduleupgrader/templates/Report.html.twig");
    }
}
