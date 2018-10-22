<?php
namespace agarcia707\DataDesign;
require_once (dirname(__DIR__, 1). "/Classes/Article.php");
require_once (dirname(__DIR__, 2). "/vendor/autoload.php");
$article = new Article("04983618f54348a8ab4cbd7635b84e0d", "72de1bf5d60e41788eb525a3a811c255",
	"723c2f9d2c22477abd04173a73828372","J. Cole KOD","Album review on KOD");