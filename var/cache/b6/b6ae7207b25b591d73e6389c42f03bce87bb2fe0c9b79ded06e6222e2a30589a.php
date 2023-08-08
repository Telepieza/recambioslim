<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* docs/swagger.twig */
class __TwigTemplate_259934946b3c0c2e827da8d7165f0e7d35cebb23220c851a915afecff53825ae extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<link type=\"text/css\" rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.52.4/swagger-ui.css\">
<link type=\"text/css\" rel=\"stylesheet\" href=\"/css/bootstrap5.min.css\">
<link type=\"text/css\" rel=\"stylesheet\" href=\"/css/style.css\">   
<script src=\"/js/include.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.52.4/swagger-ui-bundle.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.52.4/swagger-ui-standalone-preset.js\"></script>
<link rel=\"icon\" type=\"image/png\" href=\"/images/favicon-32x32.png\" sizes=\"32x32\" />
<link rel=\"icon\" type=\"image/png\" href=\"/images/favicon-16x16.png\" sizes=\"16x16\" />

<html lang=\"en\">
<header>
    <meta charset=\"UTF-8\">
    <title>API Specification - Swagger UI</title>
</head>
<body>
  <div class=\"row\">
     <include src=\"/template/navbar.php\"></include>
  </div>
   <div class=\"col-md-8\">
  <div class=\"container-fluid\">
    <div class=\"row\">
         <div class=\"color-1\" id=\"swagger-ui\"></div>
      </div>
    </div>
  </div>

     <script>
    window.onload = function () {
        const ui = SwaggerUIBundle({
            spec: ";
        // line 31
        echo ($context["spec"] ?? null);
        echo ",
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
        })
        window.ui = ui
    }

</script>
 

</body>
</html>



";
    }

    public function getTemplateName()
    {
        return "docs/swagger.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 31,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<link type=\"text/css\" rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.52.4/swagger-ui.css\">
<link type=\"text/css\" rel=\"stylesheet\" href=\"/css/bootstrap5.min.css\">
<link type=\"text/css\" rel=\"stylesheet\" href=\"/css/style.css\">   
<script src=\"/js/include.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.52.4/swagger-ui-bundle.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.52.4/swagger-ui-standalone-preset.js\"></script>
<link rel=\"icon\" type=\"image/png\" href=\"/images/favicon-32x32.png\" sizes=\"32x32\" />
<link rel=\"icon\" type=\"image/png\" href=\"/images/favicon-16x16.png\" sizes=\"16x16\" />

<html lang=\"en\">
<header>
    <meta charset=\"UTF-8\">
    <title>API Specification - Swagger UI</title>
</head>
<body>
  <div class=\"row\">
     <include src=\"/template/navbar.php\"></include>
  </div>
   <div class=\"col-md-8\">
  <div class=\"container-fluid\">
    <div class=\"row\">
         <div class=\"color-1\" id=\"swagger-ui\"></div>
      </div>
    </div>
  </div>

     <script>
    window.onload = function () {
        const ui = SwaggerUIBundle({
            spec: {{ spec|raw }},
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
        })
        window.ui = ui
    }

</script>
 

</body>
</html>



", "docs/swagger.twig", "C:\\xampp\\htdocs\\recambioslim\\Templates\\docs\\swagger.twig");
    }
}
