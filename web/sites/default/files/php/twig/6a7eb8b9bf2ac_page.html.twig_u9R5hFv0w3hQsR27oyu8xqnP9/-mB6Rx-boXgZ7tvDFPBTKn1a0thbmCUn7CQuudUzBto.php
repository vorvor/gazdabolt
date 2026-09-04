<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @gazda/layout/page.html.twig */
class __TwigTemplate_c85cdf679315d97d8fe9706c35c53dad extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        $context["asset_path"] = (($context["base_path"] ?? null) . ($context["directory"] ?? null));
        // line 8
        yield "<header id=\"header\" role=\"banner\">
  <div id=\"header-top\">
    ";
        // line 10
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "utility", [], "any", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 11
            yield "      ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "utility", [], "any", false, false, true, 11), "html", null, true);
            yield "
    ";
        } else {
            // line 13
            yield "      <div id=\"col-first\" class=\"header-col\"><div class=\"icon\"><img src=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
            yield "/images/phone.png\" alt=\"\" width=\"30\" height=\"30\"></div><div class=\"text\"><a href=\"tel:+3626311993\">+36 26 311 993</a></div></div>
      <div id=\"col-second\" class=\"header-col\"><div class=\"icon\"><img src=\"";
            // line 14
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
            yield "/images/pin.png\" alt=\"\" width=\"30\" height=\"30\"></div><div class=\"text\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Szentendre, Bolgár u. 2."));
            yield "</div></div>
      <div class=\"header-col\"><div class=\"icon\"><img src=\"";
            // line 15
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
            yield "/images/email.png\" alt=\"\" width=\"30\" height=\"30\"></div><div class=\"text\"><a href=\"mailto:info@gazdaboltszentendre.hu\">info@gazdaboltszentendre.hu</a></div></div>
      <div id=\"col-third\" class=\"header-col\"><div class=\"icon\"><img src=\"";
            // line 16
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
            yield "/images/fb.png\" alt=\"Facebook\" width=\"30\" height=\"30\"></div><div class=\"text\">/szentendre-gazdabolt</div></div>
    ";
        }
        // line 18
        yield "  </div>
  <div id=\"header-bottom\">
    <a id=\"logo\" href=\"";
        // line 20
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["front_page"] ?? null), "html", null, true);
        yield "\" rel=\"home\"><img src=\"";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/gazdabolt-logo.jpg\" alt=\"";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Gazdabolt home"));
        yield "\" width=\"76\" height=\"76\"></a>
    <div class=\"title\"><div class=\"site-name\">";
        // line 21
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("site_name", $context)) ? (Twig\Extension\CoreExtension::default(($context["site_name"] ?? null), t("Gazdabolt"))) : (t("Gazdabolt"))), "html", null, true);
        yield "</div><div class=\"site-location\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Szentendre"));
        yield "</div></div>
    ";
        // line 22
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 22), "html", null, true);
        yield "
  </div>
  ";
        // line 24
        if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = ($context["is_front"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            yield "<nav class=\"primary-menu\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Primary navigation"));
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 24), "html", null, true);
            yield "</nav>";
        }
        // line 25
        yield "</header>

";
        // line 27
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 35
        yield "
<footer id=\"footer\" role=\"contentinfo\">
  <div id=\"footer-left\" aria-label=\"";
        // line 37
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Map showing the shop location"));
        yield "\"></div>
  <div id=\"footer-center\">
    <div class=\"logo\"><img src=\"";
        // line 39
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/gazdabolt-logo-mono.png\" alt=\"\" width=\"100\" height=\"100\"></div>
    <div class=\"text\">
      <div class=\"name\">";
        // line 41
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Gazdabolt Szentendre"));
        yield "</div>
      <div class=\"contact\"><div class=\"icon\"><img src=\"";
        // line 42
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/phone.png\" alt=\"\"></div><div class=\"data\"><a href=\"tel:+3626311993\">+36 26 311 993</a></div></div>
      <div class=\"contact\"><div class=\"icon\"><img src=\"";
        // line 43
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/pin.png\" alt=\"\"></div><div class=\"data\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Szentendre, Bolgár u. 2."));
        yield "</div></div>
      <div class=\"contact\"><div class=\"icon\"><img src=\"";
        // line 44
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/email.png\" alt=\"\"></div><div class=\"data\"><a href=\"mailto:info@gazdaboltszentendre.hu\">info@gazdaboltszentendre.hu</a></div></div>
    </div>
  </div>
  <div id=\"footer-right\">
    ";
        // line 48
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "newsletter", [], "any", false, false, true, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "      <div class=\"contact newsletter\">
        <h2>";
            // line 50
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Iratkozz fel hírlevelünkre!"));
            yield "</h2>
        <p>";
            // line 51
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Értesülj elsőként a helyi újdonságokról és ajánlatokról."));
            yield "</p>
        ";
            // line 52
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "newsletter", [], "any", false, false, true, 52), "html", null, true);
            yield "
      </div>
    ";
        } else {
            // line 55
            yield "      <div class=\"contact newsletter\">
        <h2>";
            // line 56
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Iratkozz fel hírlevelünkre!"));
            yield "</h2>
        <p>";
            // line 57
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Értesülj elsőként a helyi újdonságokról és ajánlatokról."));
            yield "</p>
        <div class=\"newsletter-actions\">
          <a class=\"newsletter-email\" href=\"mailto:info@gazdaboltszentendre.hu?subject=";
            // line 59
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::urlencode(t("Hírlevél feliratkozás")), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("e-mail cím"));
            yield "</a>
          <a class=\"newsletter-button\" href=\"mailto:info@gazdaboltszentendre.hu?subject=";
            // line 60
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::urlencode(t("Hírlevél feliratkozás")), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Feliratkozás"));
            yield "</a>
        </div>
      </div>
    ";
        }
        // line 64
        yield "    ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 64), "html", null, true);
        yield "
  </div>
</footer>
<div id=\"post-footer\"><div class=\"footer-separator\"></div>";
        // line 67
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("© @year Gazdabolt Szentendre.", ["@year" => $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y")]));
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["base_path", "directory", "page", "front_page", "site_name", "is_front"]);        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "<main id=\"main-content\" class=\"gazda-main\">
  ";
        // line 29
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"gazda-breadcrumb\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 29), "html", null, true);
            yield "</div>";
        }
        // line 30
        yield "  ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 30), "html", null, true);
        yield "
  ";
        // line 31
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 31), "html", null, true);
        yield "
  ";
        // line 32
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 32), "html", null, true);
        yield "
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@gazda/layout/page.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  237 => 32,  233 => 31,  228 => 30,  222 => 29,  219 => 28,  212 => 27,  204 => 67,  197 => 64,  188 => 60,  182 => 59,  177 => 57,  173 => 56,  170 => 55,  164 => 52,  160 => 51,  156 => 50,  153 => 49,  151 => 48,  144 => 44,  138 => 43,  134 => 42,  130 => 41,  125 => 39,  120 => 37,  116 => 35,  114 => 27,  110 => 25,  102 => 24,  97 => 22,  91 => 21,  83 => 20,  79 => 18,  74 => 16,  70 => 15,  64 => 14,  59 => 13,  53 => 11,  51 => 10,  47 => 8,  45 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@gazda/layout/page.html.twig", "/app/web/themes/custom/gazda/templates/layout/page.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 10, "block" => 27];
        static $filters = ["escape" => 11, "t" => 14, "default" => 21, "url_encode" => 59, "date" => 67];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "block"],
                [0 => "escape", 1 => "t", 2 => "default", 3 => "url_encode", 4 => "date"],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
