img1= new Image();
img1.src="menu-animation.gif";
img2= new Image();
img2.src="menu-animation2.gif";

window.onload = function() {portrait()};
window.onresize = function() {portrait()};


function portrait() {
    if(window.innerWidth<window.innerHeight || window.innerWidth <730) {
        document.getElementById("title1").innerHTML="";
        document.getElementById("title2").innerHTML="";
        var text = document.querySelectorAll(".lefttext, .righttext");
        for (i=0 ; i<text.length ; i++) {
            text[i].style.marginTop="150px";
        }
        return true;
    }
    else { document.getElementById("title1").innerText="Lyric";
        document.getElementById("title2").innerText="Videos";
        var text = document.querySelectorAll(".lefttext, .righttext");
        for (i=0 ; i<text.length ; i++) {
            text[i].style.marginTop="3%";
        }
        return false;
        }
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {

    document.getElementById("title2").style.animation = "0.2s fadeOut";
    document.getElementById("title2").style.webkitAnimation = "0.2s fadeOut";
    document.getElementById("title1").style.animation = "0.2s fadeOut";
    document.getElementById("title1").style.webkitAnimation = "0.2s fadeOut";


    $("#menubtn").css({"margin-top" : "7px"});
    $("#myHeader").css({"height" : "10%" , "font-size" : "200%", "box-shadow" : "0px -10px 41px 5px rgba(0,0,0,0.5)", "-webkit-box-shadow" : "0px -10px 41px 5px rgba(0,0,0,0.5)"});
    setTimeout(() => {
        document.getElementById("title1").style.visibility="hidden";
        document.getElementById("title2").style.visibility="hidden";

    }, 100);
}

   else {

    document.getElementById("title2").style.animation = "0.2s fadeIn";
    document.getElementById("title2").style.webkitAnimation = "0.2s fadeIn";
    document.getElementById("title1").style.animation = "0.2s fadeIn";
    document.getElementById("title2").style.webkitAnimation = "0.2s fadeIn";

    $("#menubtn").css({"margin-top" : "20px"});
    $("#myHeader").css({"height" : "15%" , "font-size" : "240%", "box-shadow" : "0px -10px 41px 5px rgba(255,255,255,0.25)", "-webkit-box-shadow" : "0px -10px 41px 5px rgba(255,255,255,0.25)"});
    setTimeout(() => {
    document.getElementById("title1").style.visibility="visible";
    document.getElementById("title2").style.visibility="visible";
    
        }, 100);
    }
}

function sidemenuin() {
    var timestamp = new Date().getTime(); 
    document.getElementById("menu1").src= "menu-animation.gif?t" + timestamp;
    
    setTimeout(() => {

        document.getElementById("menubtn").style.transition="1.35s";
        document.getElementById("menubtn").style.webkitTransition="1.35s";
        document.getElementById("menubtn").style.marginLeft="300px";

        $("#blurall").fadeIn(500);
    },150);
    document.getElementById("menu").style.transform="translate(0%)";
    document.getElementById("menu").style.webkitTransform="translate(0%)";

    
    setTimeout(() => {
        document.getElementById("menu1").style.visibility="hidden";
        document.getElementById("menu2").style.visibility="visible";
        document.getElementById("menu1").src= "menu1.png";
    }, 1200);
    
}

function sidemenuout() {
    var timestamp = new Date().getTime(); 
    document.getElementById("menu2").src= "menu-animation2.gif?t" + timestamp;
    document.getElementById("menubtn").style.marginLeft="1%";
    document.getElementById("menu").style.transform="translate(-100%)";

    $("#blurall").fadeOut(500);


    
    setTimeout(() => {
        document.getElementById("menu2").style.visibility="hidden";
        document.getElementById("menu1").style.visibility="visible";
        document.getElementById("menu2").src= "menu2.png";
        document.getElementById("menubtn").style.transition="0.2s";
        document.getElementById("menubtn").style.webkitTransition="0.2s";
        
    }, 1200);
}


///LEFT paragraph videos transition on scroll

window.addEventListener('scroll', function() {
    var element = document.getElementsByClassName("leftv");
    for (i=0; i<element.length; i++) {
	var position = element[i].getBoundingClientRect();

	// checking whether fully visible
	if(position.top <= window.innerHeight && position.bottom>=0 ) {
        element[i].style.transform="translateX(-5%) scale(1)";
        element[i].play();
        
    }
    else {
        element[i].style.transform="translateX(300%) scale(0)";
        element[i].pause()}
}
})


///RIGHT paragraph videos transition on scroll

window.addEventListener('scroll', function() {
    var element = document.getElementsByClassName("rightv");
    for (i=0; i<element.length; i++) {
	var position = element[i].getBoundingClientRect();

	// checking whether fully visible
	if(position.top <= window.innerHeight && position.bottom>=0 ) {
        element[i].style.transform="translateX(5%) scale(1)";
        element[i].play();
        
    }
    else {
        element[i].style.transform="translateX(-300%) scale(0)";
        element[i].pause()}
}
})




var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split("\\").pop() ;

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});



//REQUEST FORM

function checkemail() {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
     {
        document.getElementById("emailerror").innerText="";
        document.getElementById("email").style.border="none";
        return true;
        } 
    else {document.getElementById("emailerror").innerText="Please enter a valid email adress";
        document.getElementById("email").style.border="red 2px solid";
        return false;
        }
}

function checktitle() {
    if (document.getElementById("song").value.length>0) 
        {document.getElementById("titleerror").innerText="";
        document.getElementById("song").style.border="none";
        return true;} 
    else 
        {document.getElementById("titleerror").innerText="";
        document.getElementById("song").style.border="red 2px solid";
        return false}
}

function checkartist() {
    if (document.getElementById("artist").value.length>0) 
        {document.getElementById("artisterror").innerText="";
        document.getElementById("artist").style.border="none";
        return true;} 
    else 
        {document.getElementById("artisterror").innerText="";
        document.getElementById("artist").style.border="red 2px solid";
        return false}
}

function checklyrics() {
    if (document.getElementById("lyrics").value.length>125) 
        {document.getElementById("lyricserror").innerText="";
        document.getElementById("lyrics").style.border="none";
        return true;} 
    else 
        {document.getElementById("lyricserror").innerText="Lyrics should be at least 125 charachters long";
        document.getElementById("lyrics").style.border="red 2px solid";
        return false}
}

function checkfile() {
    if (document.getElementById("songfile").files.length>0) 
    {document.getElementById("fileerror").innerText="";
    return true;} 
else 
    {document.getElementById("fileerror").innerText="* Required";
    return false}
}

function validaterequest() {
    if (checkemail() && checktitle() && checkartist() && checklyrics() && checkfile()) {
        return true;
    }
    else return false;

}

function checkfname() {
    if (document.getElementById("fname").value.length>0) 
        {document.getElementById("fnameerror").innerText="";
        return true;} 
    else 
        {document.getElementById("fnameerror").innerText="* Required";
        return false}
}

function checklname() {
    if (document.getElementById("lname").value.length>0) 
        {document.getElementById("lnameerror").innerText="";
        return true;} 
    else 
        {document.getElementById("lnameerror").innerText="* Required";
        return false}
}

function checkusername() {
    $("#loaderIcon").show();
    $("#signup").prop('disabled', true);
    jQuery.ajax({
    url: "checkusername.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
    $("#user-availability-status").html(data);
    $("#loaderIcon").hide();
    $("#signup").prop('disabled', false);
    },
    error:function (){}
    });
    }

function checku() {

        
    if (document.getElementById("available") != 'undefined' && document.getElementById("available") !=null) {
        
        return true;
    }
    else {
        return false;}

}

function checkpass() {
    if (document.getElementById("password").value.length>5) 
        {document.getElementById("passerror").innerText="";
        return true;} 
    else 
        {document.getElementById("passerror").innerText="Your password should be at least 6 characters";
        return false;}
}

function checkreppass() {
    if (document.getElementById("reppassword").value==document.getElementById("password").value) 
        {document.getElementById("reppasserror").innerText="";
        return true;} 
    else 
        {document.getElementById("reppasserror").innerText="Passwords don't match";
        return false}
}

function validatesignup() {
        
    
    if (checkfname() && checklname() && checku() && checkemail() && checkpass() && checkreppass() )
        {return true;
    }
    else return false;
}



function readmore (n){
    var dots = document.getElementById(`dots${n}`);
    var moreText = document.getElementById(`more${n}`);
    var btnText = document.getElementById(`myBtn${n}`);

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
        }
    }

    
function message(){
    $("#message").fadeIn(200)
    setTimeout(() => {
        $("#message").fadeOut("slow");
    }, 5000);
}
function xmessage() {
    $("#message").fadeOut(150);
}




