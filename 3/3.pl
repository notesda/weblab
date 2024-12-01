#!C:\xampp\perl\bin\perl.exe
use CGI;
my $cgi=CGI->new;
my $cookie_name = 'webmaster_logged_in';
my $status=$cgi->cookie($cookie_name);
print "Content-type:text/html;\n\n";
if($status){
    print "Logged in";
}else{
    print "Logged out";
}
($s,$m,$h)=localtime(time);
print "<br>";
if($h<12){
    print "Good Morning";
}else{
    print "Good Evening";
}