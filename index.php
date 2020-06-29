<!DOCTYPE html>
<head><title>Sadekur Rahaman's MD5 Cracker</title></head>
<body>
<p>This application takes an MD5 hash
of a four digit pin number and 
attempts to hash all four digit combinations
to determine the original four digits.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    $txt = "abcdefghijklmnopqrstuvwxyz0123456789";
    $show = 15;

    for($i=0; $i<strlen($txt); $i++ ) {
        $ch1 = $txt[$i]; 

        for($j=0; $j<strlen($txt); $j++ ) {
            $ch2 = $txt[$j];  

            for($k=0; $k<strlen($txt); $k++ ) {
                $ch3 = $txt[$k];  

                for($l=0; $l<strlen($txt); $l++ ) {
                    $ch4 = $txt[$l];

	                $try = $ch1.$ch2.$ch3.$ch4;
	                 
	                $check = hash('md5', $try);

	                if ( $check == $md5 ) {
	                    $goodtext = $try;
	                    break;
	                }

	                if ( $show > 0 ) {
	                    print "$check $try\n";
	                    $show = $show - 1;
	                }
                }
            }
        }
    }
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<p>Pin: <?= htmlentities($goodtext); ?></p>
<form>
	<input type="text" name="md5" size="40" />
	<input type="submit" value="Crack MD5"/>
</form>
	<ul>
		<li><a href="index.php">Reset</a></li>
		<li><a href="md5.php">MD5 Encoder</a></li>
		<li><a href="makecode.php">MD5 Code Maker</a></li>
	</ul>
</body>
</html>