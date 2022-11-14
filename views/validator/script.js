const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const fullname = document.getElementById('fname');
let a = 0;

function showerror(input , msg){
    const form = input.parentElement;
    form.className = 'form-control error';
    const small = form.querySelector('small');
    small.innerText = msg;
    a++;
}
function showsuccess(input){
    const form = input.parentElement;
    form.className = 'form-control success';
    
}
function checkemail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(email.value)){
        showsuccess(email);
    } else {
        showerror(email,'Email is not valid');
    }
}

function getfield (input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function checkreq(inputarr){
    inputarr.forEach(function (input) {
       if(input.value.trim() === ''){
        showerror(input , `${getfield(input)} is required`);
       } else {
        showsuccess(input);
       }
    });
}
function checklength(input,min,max){
    if(input.value.length < min){
        showerror(input , `${getfield(input)} must be more than ${min} characters `);
    } else if (input.value.length >max){
        showerror(input , `${getfield(input)} must be less than ${max} characters `);
    } else {
        showsuccess(input);
        
    }
}
function checkpass(pass1,pass2){
    if(pass1.value !== pass2.value){
        showerror(pass2,'passwords not matching');
    }
}

function checkfname(fname){

    for(let i=0 ;i<fname.value.length;i++){
        if(fname.value[i]<=9 && fname.value[i]>=0 && fname.value[i]!=' '){
           
            showerror(fname,'Error');
            return 1;
        }
    }
    showsuccess(fname);
    return 0;
}
form.addEventListener('submit',function(e){
    e.preventDefault();
    checkreq([username , email , password , password2]);
      checklength(username,3,15);
     checklength(password,8,20);
    checkemail(email);
    checkpass(password,password2);
   checkfname(fullname);
    
       fullsuccess();
    a=0;
    //console.log(username.value);

});


function fullsuccess(){
   
    var url = "../../business/bsnuser.php";
    if(a==0){
        $.ajax({
            url: url,
      
            type: "post",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
      
            success: function (addd) {
               username.value = '';
               email.value = '';
               password.value = '';
               password2.value = '';
               fullname.value = "";
                window.location.href = "../Products.php";
            },
          });
    }
    /*
    
      */
}