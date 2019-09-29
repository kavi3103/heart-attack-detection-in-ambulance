<? php
   $age ="36";
    $sex = "1";
    $cp = "2";
    $trestbps = "130";
    $chol = "248";
    $fbs = "0";
    $restecg = "1";
    $thalach = "187";
    $exang = "0";
    $oldpeak = "3";
    $slope = "0";
    $ca = "0";
    $thal = "2";
    //$a = 'python sample2.py '.$age.' '.$sex.' '.$cp.' '.$trestbps.' '.$chol.' '.$fbs.' '.$restecg.' '.$thalach.' '.$exang.' '.$oldpeak.' '.$slope.' '.$ca.' '.$thal;
	$command = escapeshellcmd('python sample2.py '.$age.' '.$sex.' '.$cp.' '.$trestbps.' '.$chol.' '.$fbs.' '.$restecg.' '.$thalach.' '.$exang.' '.$oldpeak.' '.$slope.' '.$ca.' '.$thal);
//$command = escapeshellcmd('python b.py');
    $out = shell_exec($command);
    //"python sample2.py ".$age." ".$sex." ".$cp." ".$trestbps." ".$chol." ".$fbs." ".$restecg." ".$thalach." ".$exang." ".$oldpeak." ".$slope." ".$ca." ".$thal
    // echo $command;
    echo $out;
?>