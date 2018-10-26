<?hh
namespace quicklexerheredocvarnewlines;
  $info = "hello";
echo <<<SCRIPT
<?hh
namespace quicklexerheredocvarnewlines;
$info
throw new Exception(<<<TXT
$info

Fix the above and then run `arc build`
TXT
);
SCRIPT;
