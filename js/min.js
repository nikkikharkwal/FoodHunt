function validt()
{
var fn=document.getElementById('fname').value;
var ln=document.getElementById('lname').value;
var e_m=document.getElementById('emaill').value;
//document.write(e_m);
var cem=document.getElementById('cfemail').value;
var mob=document.getElementById('mobile').value;
var pswd=document.getElementById('pswd').value;
var cpswd=document.getElementById('cpwd').value;
if(fn=="")
{
	document.getElementById('msg1').innerHTML="please fill first name";
}
if(fn!=="")
{
	document.getElementById('msg1').innerHTML="";
}
if(ln=="")
{
	document.getElementById('msg2').innerHTML="please fill last name";
}
if(ln!=="")
{
	document.getElementById('msg2').innerHTML="";
}


if(e_m=="")
{
	document.getElementById('msg3').innerHTML="please fill email";
}
if(e_m!=="")
{
	document.getElementById('msg3').innerHTML="";
}

if(cem=="")
{
	document.getElementById('msg4').innerHTML="please re enter email";
}
if(cem!=="")
{
	document.getElementById('msg4').innerHTML="";
}
if(mob=="")
{
	document.getElementById('msg5').innerHTML="please fill mobile number";
}
if(mob!=="")
{
	document.getElementById('msg5').innerHTML="";
}
if(pswd=="")
{
	document.getElementById('msg6').innerHTML="please fill password";
}
if(pswd!="")
{
	document.getElementById('msg6').innerHTML="";
}
if(cpswd=="")
{
	document.getElementById('msg7').innerHTML="please re enter password";
}
if(cpswd!=="")
{
	document.getElementById('msg7').innerHTML="";
}

}
//onbur checkblank
 function chckblank(idd,msg,msgtitle)
 {
	 var x=document.getElementById(idd).value;
	 if(x=="")
	 {
		 document.getElementById(msg).innerHTML=msgtitle;
	 }
	 if(x!=="")
	 {
		 document.getElementById(msg).innerHTML="";
	 }
	 
	 
 }
 // onkeypress check asci values
 
 function chck_val(e,ermsg){
    if(!((e.which>=65 && e.which<=90) || (e.which>=97 && e.which<=122) || (e.which==32)))//(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==32))
	{   document.getElementById(ermsg).innerHTML="invalid parametres";
		
		return false;
	}
	else{
	document.getElementById(ermsg).innerHTML="";
	return true;
	}
}
//email match
function em_mtch()
{
	var e_m=document.getElementById('emaill').value;
//document.write(e_m);
    var cem=document.getElementById('cfemail').value;
	if(!(e_m=="" || cem==""))
	{
		if(e_m!==cem)
		{
			alert("email mismatched");
			document.getElementById('emaill').focus();
			document.getElementById('cfemail').value="";
			
		}
	}
}
//email validation
function validt_emaill()
{
	var e_m_ch=document.getElementById('emaill').value;
	var atpos=e_m_ch.indexOf("@");
	var dotpos=e_m_ch.indexOf(".");
	//alert(atpos);
	//alert(dotpos);
	if((atpos<3 || dotpos<atpos+3))
	{
		document.getElementById('msg3').innerHTML="invalid email";
	}
	
	
	
}
//password matching
function pwd_mtch()
{
	var m_pswd=document.getElementById('pswd').value;

    var  m_cpwd=document.getElementById('cpwd').value;
	if(!(m_pswd=="" || m_cpwd==""))
	{
		if(m_pswd!==m_cpwd)
		{
			alert("password mismatch");
			document.getElementById('pswd').focus();
			document.getElementById('cpwd').value="";
			
			
		}
	}
}
function mob_valdt(event,ermsg)
{
	
	if(!(event.which>=48 && event.which<=57))
	{
		document.getElementById(ermsg).innerHTML="invalid input";
		return false;
	}
}
function mob_length(id,ermsg)
{
	var x=document.getElementById(id).value;
	var y=x.length;
	if(y!=10)
	{
		document.getElementById(ermsg).innerHTML="mobile no should be of 10 numbers";
		return false;
	}
}


