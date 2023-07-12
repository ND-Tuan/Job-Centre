var addEduBtn  = document.getElementById('addEdu');
var addExpBtn  = document.getElementById('addExp');
var addSkillBtn  = document.getElementById('addSkill');
var eduPopup  = document.getElementById('edu-extra-popup');
var expPopup  = document.getElementById('exp-extra-popup');
var skillPopup  = document.getElementById('skill-extra-popup');
var endOrNot  = document.getElementById('endOrNot');
var end       = document.getElementById('end');
var graduatedOrNot  = document.getElementById('graduatedOrNot');
var eduEnd       = document.getElementById('eduEnd');
var switchBtn       = document.getElementById('switch');
var jobPopup  = document.getElementById('job-looking-popup');
var check     = document.getElementById('check');
var btnJob     = document.getElementById('btnJob');

addEduBtn.onclick = function(){
    eduPopup.style.display = "block";
}

addExpBtn.onclick = function(){
    expPopup.style.display = "block";
}

addSkillBtn.onclick = function(){
    skillPopup.style.display = "block";
}

function closePopup(){
    expPopup.style.display = "none";
    skillPopup.style.display = "none";
    eduPopup.style.display = "none";
    if(jobPopup.style.display == "block" && btnJob.style.display == "none"){
        check.value = 0;
        document.getElementById("looking-form").submit();
    }
    jobPopup.style.display = "none";
}

endOrNot.onclick = function(e){
    if (this.checked){
        end.style.display = "none";
    }
    else{
        end.style.display = "block";
    }
};

graduatedOrNot.onclick = function(e){
    if (this.checked){
        eduEnd.style.display = "none";
    }
    else{
        eduEnd.style.display = "block";
    }
};

switchBtn.onclick = function(e){
    if (this.checked){
        jobPopup.style.display = "block";
        check.value = 1;
    } else {
        check.value = 0;
        document.getElementById("looking-form").submit();
    }
};

btnJob.onclick = function(e){
    jobPopup.style.display = "block";
}

function comfirm() {
    return confirm("Bạn có chắc muốn xóa nội dung này ?");
}

var endOrNot  = document.getElementById('endOrNot');
var end       = document.getElementById('end');

endOrNot.onclick = function(e){
    if (this.checked){
        end.style.display = "none";
    }
    else{
        end.style.display = "block";
    }
};
