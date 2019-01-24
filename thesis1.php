   <?php
$input = 'hello'
$Standard=$_GET['standerd'];
$Sample=$_GET['sample'];

$command = escapeshellcmd("C:\Users\SOUROV\.spyder-py3\word2vec.py");
$output = shell_exec($command);

echo $output;

?>