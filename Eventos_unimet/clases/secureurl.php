<?php
class sql_inject{
    var $urlRedirect;
    var $bdestroy_session;
    var $rq;
    var $bLog;
    function sql_inject($mLog=FALSE,$bdestroy_session=FALSE,$urlRedirect=FALSE){
        $this->bLog = (($mLog!=FALSE)?$mLog:'');
        $this->urlRedirect = ($urlRedirect);
        $this->bdestroy_session = $bdestroy_session;
        $this->rq = '';
    }
    function test($sRQ){
        $this->rq = $sRQ;
        $sRQ = strtolower(urldecode($sRQ));
        $sRQ = str_replace( chr(0) , '' , $sRQ );
        $aValues = array();
        $aTemp = array();
        $aWords = array();
        $aSep = array(' and ',' or ');
        $sConditions = '(';
        $matches = array();
        $sSep = '';
		$sql_inject_patterns = array('--','\/\*','\*\/','\'','"','(union([\s\+\(\n\r\t]+)(select|all))','[\s\+\n\r\t\(]+select[\s\+\n\r\t\)\'"`]+','[\s\+\n\r\t\)`]+where[\s\+\n\r\t\(`]*','[\s\+\n\r\t\)\'"`]+(from|regexp|rlike|delete|update|insert|truncate|drop|create|rename)[\s\+\n\r\t\(`]+','exec','cmd','xp_','information_schema\.','[\s\+\n\r\t\)\'"`]*(\s+or+\s|\s+and\s+)[\s\+\n\r\t\(\'"]+(.*?)[\s\+\n\r\t\'"]*[=<>]+[\s\+\n\r\t\'"]*(.*?)','(concat|load_file|mid|like|ord|ascii|lower|lcase|find_in_set|substring|benchmark|md5)[\s\+\n\r\t]*\('        );        
		if (is_int((strpos($sRQ,"#")))&&$this->_in_post('#')) return $this->detect();
        if (preg_match('/' . implode('|', $sql_inject_patterns) . '/is', $sRQ, $regs)) return $this->detect();
        if (is_int(strpos($sRQ,';'))){ $aTemp = explode(';',$sRQ); if ($this->_in_post($aTemp[1])) return $this->detect(); }
        $aTemp = preg_split('/[\s\+\)]+where[\s\+\(]*/i', $sRQ, -1, PREG_SPLIT_NO_EMPTY);
        if (count($aTemp)==1) return FALSE;
        $sConditions = $aTemp[1];
        $aWords = explode(" ",$sConditions);
        if(strcasecmp($aWords[0],'select')!=0) $aSep[] = ',';
        $sSep = '('.implode('|',$aSep).')';
        $aValues = preg_split($sSep,$sConditions,-1, PREG_SPLIT_NO_EMPTY);
        foreach($aValues as $i => $v){
            if (is_int(strpos($v,'='))){ $aTemp = explode('=',$v); if (trim($aTemp[0])==trim($aTemp[1])) return $this->detect(); }
            if (is_int(strpos($v,'<>'))){ $aTemp = explode('<>',$v); if ((trim($aTemp[0])!=trim($aTemp[1]))&& ($this->_in_post('<>'))) return $this->detect(); }
        }
        if (strpos($sConditions,' null')){
            if (preg_match("/null +is +null/",$sConditions)) return $this->detect();
            if (preg_match("/is +not +null/",$sConditions,$matches)){ foreach($matches as $i => $v){ if ($this->_in_post($v))return $this->detect(); } }
        }
        if (preg_match("/[a-z0-9]+ +between +[a-z0-9]+ +and +[a-z0-9]+/",$sConditions,$matches)){
            $Temp = explode(' between ',$matches[0]);
            $Evaluate = $Temp[0];
            $Temp = explode(' and ',$Temp[1]);
            if ((strcasecmp($Evaluate,$Temp[0])>0) && (strcasecmp($Evaluate,$Temp[1])<0) && $this->_in_post($matches[0])) return $this->detect();
        }
        return FALSE;
    }
    function _in_post($value){
        foreach($_POST as $i => $v){ if (is_int(strpos(strtolower($v),$value))) return TRUE; }
        return FALSE;
    }
    function detect(){
        if ($this->bLog){
            $fp = @fopen($this->bLog,'a+');
            if ($fp){ fputs($fp,"\r\n".date("d-m-Y H:i:s").' ['.$this->rq.'] from: '.$this->sIp = getenv("REMOTE_ADDR").'; ServerName: '.$this->servAd = getenv("SERVER_NAME")); fclose($fp); }
			$this->sendMail();
        }
        return TRUE;
    }
    function sendMail(){
		require_once "secureurl/class.phpmailer.php";
		$UsuarioSMTP = "envios@nappo.net";
		$ClaveSMTP = "Pr123xsd";
		$ServidorSMTP = "mail.nappo.net";
		$Asunto = "Intento de Hackeo de ".$_SERVER['SERVER_NAME'];
		$Nombre = "NAPPO";
		$Cuerpo = "\r\n".date("d-m-Y H:i:s").' ['.$this->rq.'] from: '.$this->sIp = getenv("REMOTE_ADDR").'; ServerName: '.$this->servAd = getenv("SERVER_NAME");
		$CuerpoAlt = "Intento de Hackeo de ".$_SERVER['SERVER_NAME'];
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = $ServidorSMTP;
		$mail->SMTPDebug = 2; 
		$mail->SMTPAuth = true;
		$mail->Port = 25;
		$mail->Username = $UsuarioSMTP;
		$mail->Password = $ClaveSMTP;
		$mail->Subject = $Asunto;   
		$mail->AltBody = $CuerpoAlt;
		$mail->Body = $Cuerpo;
		$mail->IsHTML(true);
		$mail->SetFrom($UsuarioSMTP,"Secure Alert");
		$mail->AddAddress("raffaele@nappo.com.pa", $Nombre);
		$mail->AddAddress("vincenzo@nappo.com.pa", $Nombre);
		if(!$mail->Send()) { return false; } else { return true; }
    }
}
if ($_SERVER["QUERY_STRING"] != ""){
	$secure = new sql_inject('/sql.log',TRUE,"");
	if($secure->test($_SERVER["QUERY_STRING"])==TRUE){ echo "<script>location.href='./error.html';</script>"; }
}
?>