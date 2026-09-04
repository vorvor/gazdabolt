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

/* themes/custom/gazda/templates/layout/page--front.html.twig */
class __TwigTemplate_74c5532fe079e9c5ae75f2bcfe060bc8 extends Template
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

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 7
        return "@gazda/layout/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("@gazda/layout/page.html.twig", 7);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "asset_path", "gazda_categories", "gazda_discount", "gazda_current_news", "gazda_news", "gazda_reviews"]);    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "<main id=\"main-content\">
  ";
        // line 11
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 11), "html", null, true);
        yield "
  ";
        // line 12
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 12), "html", null, true);
        yield "
  <div id=\"content\">
    <section id=\"hero\" aria-labelledby=\"hero-title\">
      <div id=\"hero-image\"><img src=\"";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/hero-image-woman-2.png\" alt=\"\" fetchpriority=\"high\"></div>
      <div id=\"hero-text\">
        <h1 id=\"hero-title\">";
        // line 17
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Minden, ami"));
        yield "<br>";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("a kerthez kell."));
        yield "</h1>
        <h2>";
        // line 18
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Szentendrén - egy helyen."));
        yield "</h2>
        <p>";
        // line 19
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Kertészeti termékek, vetőmagok, vegyszerek, műhelyfelszerelés - és sok más. Szakértelemmel és sok szeretettel."));
        yield "</p>
      </div>
    </section>

    <section id=\"introduction\" aria-label=\"";
        // line 23
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("About Gazdabolt"));
        yield "\">
      <div class=\"text\">";
        // line 24
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 24), "html", null, true);
        yield "</div>
      <div class=\"icons\" aria-label=\"";
        // line 25
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Gazdabolt in numbers"));
        yield "\">
        <div class=\"block\"><div class=\"icon\"><img src=\"";
        // line 26
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/icons/clock.png\" alt=\"\"></div><div class=\"text\"><strong>45</strong><span>";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("év tapasztalat"));
        yield "</span></div></div>
        <div class=\"block\"><div class=\"icon\"><img src=\"";
        // line 27
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/icons/gardening.png\" alt=\"\"></div><div class=\"text\"><strong>4000+</strong><span>";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("termék"));
        yield "</span></div></div>
        <div class=\"block\"><div class=\"icon\"><img src=\"";
        // line 28
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/icons/user.png\" alt=\"\"></div><div class=\"text\"><strong>10000+</strong><span>";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("elégedett vásárló"));
        yield "</span></div></div>
      </div>
    </section>

    <div class=\"separator\" role=\"heading\" aria-level=\"2\"><div class=\"separator-line\"></div><div class=\"separator-icon\"><img src=\"";
        // line 32
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/separators/sep-tomato-2.png\" alt=\"\"></div><div class=\"separator-text\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Termékkategóriák"));
        yield "</div><div class=\"separator-line\"></div></div>
    <section id=\"categories\" aria-label=\"";
        // line 33
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Product categories"));
        yield "\">
      ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["gazda_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 35
            yield "        <article class=\"category\"><a href=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "url", [], "any", false, false, true, 35), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "image", [], "any", false, false, true, 35), "html", null, true);
            yield "<div class=\"cat-label\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, true, 35), "html", null, true);
            yield "</div></a></article>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 37
        yield "    </section>

    ";
        // line 39
        if ((($tmp = ($context["gazda_discount"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "      <section id=\"discount\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Current discount"));
            yield "\">
        <div id=\"discount-img\">";
            // line 41
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "image", [], "any", false, false, true, 41), "html", null, true);
            yield "</div>
        <div id=\"discount-text\"><div id=\"discount-subtitle\">";
            // line 42
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "rate", [], "any", false, false, true, 42), "html", null, true);
            yield "% ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("kedvezmény"));
            yield "</div><div id=\"discount-title\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "description", [], "any", false, false, true, 42), "html", null, true);
            yield "</div></div>
        <div id=\"discount-dates\">
          <time class=\"date\" datetime=\"";
            // line 44
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "date_from", [], "any", false, false, true, 44), "raw", [], "any", false, false, true, 44), "html", null, true);
            yield "\"><span class=\"date-label\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("kezdet"));
            yield "</span><span class=\"date-value\"><span class=\"date-value-year-month\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "date_from", [], "any", false, false, true, 44), "year_month", [], "any", false, false, true, 44), "html", null, true);
            yield "</span><span class=\"date-value-day\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "date_from", [], "any", false, false, true, 44), "day", [], "any", false, false, true, 44), "html", null, true);
            yield "</span></span></time>
          <time class=\"date\" datetime=\"";
            // line 45
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "date_to", [], "any", false, false, true, 45), "raw", [], "any", false, false, true, 45), "html", null, true);
            yield "\"><span class=\"date-label\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("vége"));
            yield "</span><span class=\"date-value\"><span class=\"date-value-year-month\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "date_to", [], "any", false, false, true, 45), "year_month", [], "any", false, false, true, 45), "html", null, true);
            yield "</span><span class=\"date-value-day\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_discount"] ?? null), "date_to", [], "any", false, false, true, 45), "day", [], "any", false, false, true, 45), "html", null, true);
            yield "</span></span></time>
        </div>
      </section>
    ";
        }
        // line 49
        yield "
    <div class=\"separator\" role=\"heading\" aria-level=\"2\"><div class=\"separator-line\"></div><div class=\"separator-icon\"><img src=\"";
        // line 50
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/separators/sep-saw-2.png\" alt=\"\"></div><div class=\"separator-text\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Népszerű"));
        yield "</div><div class=\"separator-line\"></div></div>
    ";
        // line 51
        $context["products"] = [["product-1.jpg", "Univerzális tisztítószer", "Sokoldalú tisztítószer a háztartás mindennapi feladataihoz."], ["product-2.jpg", "Oltó olló", "Pontos és tiszta vágást biztosító megbízható kerti szerszám."], ["product-3.jpg", "Gyeptrágya", "Tápanyag a sűrű, egészséges és üde zöld gyephez."], ["product-4.jpg", "Konyhai mérleg", "Praktikus és pontos segítség a mindennapi sütéshez-főzéshez."], ["product-5.jpg", "Mosogatószer", "Hatékony tisztítás és ragyogóan tiszta edények."]];
        // line 58
        yield "    <section id=\"top-products\" aria-label=\"";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Popular products"));
        yield "\">
      <div class=\"arrow-wrapper\" aria-hidden=\"true\"><div class=\"arrow\"></div></div>
      <div id=\"products-slider\">
        ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            yield "<article class=\"product\"><div class=\"product-image\"><img src=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
            yield "/images/products/";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($_v0 = $context["product"]) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["product"], 0, [], "array", false, false, true, 61)), "html", null, true);
            yield "\" alt=\"\" loading=\"lazy\"></div><h3 class=\"product-name\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t((($_v1 = $context["product"]) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[1] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["product"], 1, [], "array", false, false, true, 61))));
            yield "</h3><div class=\"product-desc\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t((($_v2 = $context["product"]) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[2] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["product"], 2, [], "array", false, false, true, 61))));
            yield "</div></article>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 62
        yield "      </div>
      <div class=\"arrow-wrapper arrow-wrapper-right\" aria-hidden=\"true\"><div class=\"arrow arrow-right\"></div></div>
    </section>

    ";
        // line 66
        if ((($tmp = ($context["gazda_current_news"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 67
            yield "      <section id=\"actual-wrapper\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Seasonal advice"));
            yield "\">
        <article id=\"actual\">
          <div class=\"actual-text\">
            <div class=\"actual-subtitle\"><time datetime=\"";
            // line 70
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_current_news"] ?? null), "date_raw", [], "any", false, false, true, 70), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_current_news"] ?? null), "month", [], "any", false, false, true, 70), "html", null, true);
            yield "</time></div>
            <h2 class=\"actual-title\">";
            // line 71
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_current_news"] ?? null), "title", [], "any", false, false, true, 71), "html", null, true);
            yield "</h2>
            <div class=\"actual-desc\">";
            // line 72
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_current_news"] ?? null), "description", [], "any", false, false, true, 72), "html", null, true);
            yield "</div>
          </div>
          ";
            // line 74
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_current_news"] ?? null), "image", [], "any", false, false, true, 74), "html", null, true);
            yield "
        </article>
      </section>
    ";
        }
        // line 78
        yield "
    ";
        // line 79
        if ((($tmp = ($context["gazda_news"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 80
            yield "      <div class=\"separator\" role=\"heading\" aria-level=\"2\"><div class=\"separator-line\"></div><div class=\"separator-icon\"><img src=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
            yield "/images/separators/sep-leaf-2.png\" alt=\"\"></div><div class=\"separator-text\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Friss hírek"));
            yield "</div><div class=\"separator-line\"></div></div>
      <section id=\"news-wrapper\" aria-label=\"";
            // line 81
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Latest news"));
            yield "\">
        <article id=\"news\">
          <div class=\"news-col-1\"><a href=\"";
            // line 83
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "url", [], "any", false, false, true, 83), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "image", [], "any", false, false, true, 83), "html", null, true);
            yield "</a></div>
          <div class=\"news-col-2\">
            <div class=\"news-header\"><div class=\"left\">";
            // line 85
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Újdonság"));
            yield "</div><time class=\"right\" datetime=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "date_raw", [], "any", false, false, true, 85), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "date_display", [], "any", false, false, true, 85), "html", null, true);
            yield "</time></div>
            <h2 class=\"news-title\"><a href=\"";
            // line 86
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "url", [], "any", false, false, true, 86), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "title", [], "any", false, false, true, 86), "html", null, true);
            yield "</a></h2>
            <div class=\"news-lead\">";
            // line 87
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gazda_news"] ?? null), "description", [], "any", false, false, true, 87), "html", null, true);
            yield "</div>
          </div>
        </article>
      </section>
    ";
        }
        // line 92
        yield "
    <div class=\"separator\" role=\"heading\" aria-level=\"2\"><div class=\"separator-line\"></div><div class=\"separator-icon\"><img src=\"";
        // line 93
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
        yield "/images/separators/sep-sun-2.png\" alt=\"\"></div><div class=\"separator-text\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Vásárlóink mondták"));
        yield "</div><div class=\"separator-line\"></div></div>
    <section id=\"customer-reviews\" aria-label=\"";
        // line 94
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Customer reviews"));
        yield "\">
      ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["gazda_reviews"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
            // line 96
            yield "        <article";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["review"], "attributes", [], "any", false, false, true, 96), "html", null, true);
            yield "><div class=\"customer-review-image\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["review"], "image", [], "any", false, false, true, 96), "html", null, true);
            yield "</div><h3 class=\"customer-name\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["review"], "name", [], "any", false, false, true, 96), "html", null, true);
            yield "</h3><div class=\"rev-separator\"></div><div class=\"customer-review-text\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["review"], "description", [], "any", false, false, true, 96), "html", null, true);
            yield "</div></article>
      ";
            $context['_iterated'] = true;
        }
        // line 97
        if (!$context['_iterated']) {
            // line 98
            yield "        ";
            $context["fallback_reviews"] = [["customer3.png", "Peredy Márta", "Meglepően nagy az áruválaszték, szinte mindig megtalálom, amit keresek. Ha bizonytalan vagyok, készségesen segítenek kiválasztani a megfelelő terméket."], ["customer2.png", "Kovács Lajos", "Kedves, türelmes és hozzáértő kiszolgálás fogad minden alkalommal. Jó érzés olyan helyen vásárolni, ahol valóban figyelnek az ember kérdéseire."], ["customer1.png", "Németh Albert", "Sokféle termék kapható egy helyen, ezért ritkán kell máshová mennem. Megbízható, barátságos helyi üzlet, ahová szívesen térek vissza."]];
            // line 103
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["fallback_reviews"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
                yield "<article class=\"customer-review\"><div class=\"customer-review-image\"><img src=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["asset_path"] ?? null), "html", null, true);
                yield "/images/";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($_v3 = $context["review"]) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["review"], 0, [], "array", false, false, true, 103)), "html", null, true);
                yield "\" alt=\"\" loading=\"lazy\"></div><h3 class=\"customer-name\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($_v4 = $context["review"]) && is_array($_v4) || $_v4 instanceof ArrayAccess && in_array($_v4::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v4[1] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["review"], 1, [], "array", false, false, true, 103)), "html", null, true);
                yield "</h3><div class=\"rev-separator\"></div><div class=\"customer-review-text\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t((($_v5 = $context["review"]) && is_array($_v5) || $_v5 instanceof ArrayAccess && in_array($_v5::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v5[2] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["review"], 2, [], "array", false, false, true, 103))));
                yield "</div></article>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['review'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 104
            yield "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['review'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 105
        yield "    </section>
  </div>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/gazda/templates/layout/page--front.html.twig";
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
        return array (  385 => 105,  378 => 104,  359 => 103,  356 => 98,  354 => 97,  341 => 96,  336 => 95,  332 => 94,  326 => 93,  323 => 92,  315 => 87,  309 => 86,  301 => 85,  294 => 83,  289 => 81,  282 => 80,  280 => 79,  277 => 78,  270 => 74,  265 => 72,  261 => 71,  255 => 70,  248 => 67,  246 => 66,  240 => 62,  222 => 61,  215 => 58,  213 => 51,  207 => 50,  204 => 49,  191 => 45,  181 => 44,  172 => 42,  168 => 41,  163 => 40,  161 => 39,  157 => 37,  143 => 35,  139 => 34,  135 => 33,  129 => 32,  120 => 28,  114 => 27,  108 => 26,  104 => 25,  100 => 24,  96 => 23,  89 => 19,  85 => 18,  79 => 17,  74 => 15,  68 => 12,  64 => 11,  61 => 10,  54 => 9,  42 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/gazda/templates/layout/page--front.html.twig", "/app/web/themes/custom/gazda/templates/layout/page--front.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["extends" => 7, "for" => 34, "if" => 39, "set" => 51];
        static $filters = ["escape" => 11, "t" => 17];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "extends", 1 => "for", 2 => "if", 3 => "set"],
                [0 => "escape", 1 => "t"],
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
