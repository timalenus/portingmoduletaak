<?php

/* core/themes/stable/templates/admin/image-scale-summary.html.twig */
class __TwigTemplate_25c2ed14a44578c303d8ed6fe6db2df3c31165b9bc20ddb525ce0565726dc5c0 extends Twig_Template
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
        $tags = array("if" => 17, "trans" => 21);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'trans'),
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

        // line 17
        if (($this->getAttribute(($context["data"] ?? null), "width", array()) && $this->getAttribute(($context["data"] ?? null), "height", array()))) {
            // line 18
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["data"] ?? null), "width", array()), "html", null, true));
            echo "×";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["data"] ?? null), "height", array()), "html", null, true));
        } else {
            // line 20
            if ($this->getAttribute(($context["data"] ?? null), "width", array())) {
                // line 21
                echo "    ";
                echo t("width @data.width", array("@data.width" => $this->getAttribute(                // line 22
($context["data"] ?? null), "width", array()), ));
                // line 24
                echo "  ";
            } elseif ($this->getAttribute(($context["data"] ?? null), "height", array())) {
                // line 25
                echo "    ";
                echo t("height @data.height", array("@data.height" => $this->getAttribute(                // line 26
($context["data"] ?? null), "height", array()), ));
                // line 28
                echo "  ";
            }
        }
        // line 30
        echo "
";
        // line 31
        if ($this->getAttribute(($context["data"] ?? null), "upscale", array())) {
            // line 32
            echo "  ";
            echo t("(upscaling allowed)", array());
        }
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/admin/image-scale-summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 32,  70 => 31,  67 => 30,  63 => 28,  61 => 26,  59 => 25,  56 => 24,  54 => 22,  52 => 21,  50 => 20,  45 => 18,  43 => 17,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "core/themes/stable/templates/admin/image-scale-summary.html.twig", "/Users/timalenus/Sites/devdesktop/porting_module_taak/core/themes/stable/templates/admin/image-scale-summary.html.twig");
    }
}
