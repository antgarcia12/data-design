<?php
namespace agarcia707\DataDesign;
require_once (dirname(__DIR__,1) ."/Classes/Article.php");
require_once(dirname(__DIR__, 2). "/vendor/autoload.php");
$ok = new Article("04983618-f543-48a8-ab4c-bd7635b84e0d", "72de1bf5-d60e-4178-8eb5-25a3a811c255",
	"723c2f9d-2c22-477a-bd04-173a73828372","J. Cole KOD","Album review on KOD");
var_dump($ok);