/**
 * Created by Tian on 2017/4/27.
 */

// hide form
var flag = "rest_3";

var iniForm = function () {
    if ( document.getElementById("form_ga_1").classList.contains('has-success') ){
        document.getElementById("form_ga_1").classList.remove('has-success');
    }else if ( document.getElementById("form_ga_1").classList.contains('has-error') ){
        document.getElementById("form_ga_1").classList.remove('has-error');
    }
    document.getElementById("span_Emei").innerHTML = "Saissez votre code EMEI";
    document.getElementById("step_2").style.display="none";
    document.getElementById("step_3").style.display="none";
    document.getElementById("step_1_button").style.display="block";
    document.getElementById("step_2_button").style.display="none";
    document.getElementById("inputEmei").readOnly = false;
};


// garantie step one
var checkEmei =  function () {
    var temp = "";
    var str = $("#inputEmei").val(); // get value from input
    if(str === ""){
        document.getElementById("form_ga_1").classList.add('has-error');
    } else {
        if (window.XMLHttpRequest) { //code for IE7+
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                temp = this.responseText;
                console.log(temp);
                if(temp === ""){
                    document.getElementById("span_Emei").innerHTML = "Veilleuez-vous valid";
                    errorInformation("form_ga_1");
                }else {
                    successInformation("form_ga_1");
                    document.getElementById("span_Emei").innerHTML = "le code est bon";
                    document.getElementById("inputEmei").readOnly = true;
                    document.getElementById("step_1_button").style.display="none";
                    $("#step_2").slideDown("slow");
                    document.getElementById("step_2_button").style.display="block";
                }
            }
        };
        xmlhttp.open("GET", "/PHP/Garantie/step_one.php?q=" + str, true);
        xmlhttp.send();
    }
};
var backToStepOne = function () {
    console.log('1');
    document.getElementById("form_ga_1").classList.remove('has-success');
    document.getElementById("span_Emei").innerHTML = "Saissez votre code EMEI";
    document.getElementById("inputEmei").readOnly = false;
    document.getElementById("step_2_button").style.display="none";
    $("#step_2").slideUp("slow");
    $("#step_1_button").slideDown()
};

function errorInformation(id) {
    if ( document.getElementById(id).classList.contains('has-success') )
        document.getElementById(id).classList.remove('has-success');
    document.getElementById(id).classList.add('has-error');
}

function successInformation(id) {
    if ( document.getElementById(id).classList.contains('has-error') )
        document.getElementById(id).classList.remove('has-erroe');
    document.getElementById(id).classList.add('has-success');
}
