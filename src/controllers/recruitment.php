
.main-container{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh
}


.main-container .form{
    width: 60%;
    padding: 50px 30px;
    background-color: #ffffff;
    margin-bottom: 40px;
}

.main-container .content{
    width: 70%;
}

.container{
    display: grid;
    grid-template-columns: 28% 2% 70%;
}

.container2{
    display: grid;
    grid-template-columns: 32% 2% 32% 2% 32%;
}

.container3{
    display: grid;
    grid-template-columns: 49% 2% 49%;
    border-radius: 3px;
}

.container4{
    display: grid;
    grid-template-columns: 16% 63% 21%;
    align-items: center;
    background-color: #ffffff;
    padding: 20px 35px ;
    border-radius: 5px;
    box-shadow: 0 0 3px 0 #d1d1d1;
    margin-bottom: 15px;
}

.container5{
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 0 3px 0 #d1d1d1;
    padding: 20px 35px ;
}

.container5 .title{
    border-left: 7px solid #ff4646;
    color: #333;
    font-size: 22px;
    font-weight: 700;
    margin: 0 0 16px;
    padding-left: 12px;
}

.container5 .main-box{
    display: grid;
    grid-template-columns: 60% 1% 39%;
}

.container5 .main-box .box{
    background: #cbcbcb5c;
    border-radius: 3px;
    margin-bottom: 8px;
    padding: 16px 16px ;
}

.container5 .main-box .box .box-title{
    color: #333;
    font-weight: 700;
    text-decoration-line: underline;
}


.container5 .main-box .box .box-infor{
    display: grid;
    grid-template-columns: 50% 50%;
    padding-top: 16px;
}

.container5 .main-box .box .box-infor .box-item{
    display: grid;
    grid-template-columns: 17% 83%;
    margin-bottom: 16px;
    align-items: center;
}



.recruitment-box{
    box-shadow: 0 0 2px 0 #bebebe;
    border-radius: 5px;
    background-color: #f6f6f6;
    margin-bottom: 15px;
    border: 1px solid #dbdada;
}

.myRecruitment{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    padding: 10px 30px ;
    border-radius: 5px;
    border: 2px solid #ff9898;
    
    line-height: 25px;
}

.application-box{
    display: grid;
    grid-template-columns: 50% 50%; 
    padding: 10px;
}

.application{
    border: 1px solid #c0c0c0;
    border-radius: 4px;
    padding: 10px;
    margin: 4px;
    background-color: #ffffff;
}

.application-info{
    display: flex;
    justify-content: space-between;
}

.fa-2xl{
    font-size: 1.7em;
    line-height: normal;
    vertical-align: -18.1875em;
}

h3{
    margin: 15px 0px 0px;
}

.textarea-info{
    background: #cbcbcb00;
    height: 100%;
    width: 100%;
    resize: none;
    padding-top: 10px;
    line-height: 30px;
    font-size: 16px;
    font-weight: 400;
    color: #000000;
    min-height: 150px;
}

.address-info{
    background: #cbcbcb00;
    height: 230px;
    width: 100%;
    resize: none;
    padding-top: 10px;
    line-height: 30px;
    font-size: 16px;
    font-weight: 400;
    color: #000000;
}

.avatar{ 
    position: relative;
    width: 120px;
    height: 120px;
}

.avatar img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    border-radius: 5px;
}

.job-title{
    color: #ff2929;
    font-size: 26px;
    font-weight: 700;
    line-height: 20px;
    padding-top: 10px;
    line-height: 29px;
}

.company-name{
    color: #414141;
    line-height: 22px;
    padding: 12px 0px 8px;
    font: italic  bold  20px "Fira Sans", system-ui;
}

.btn-apply{
    font-size: 14px;
    padding: 9px 20px;
    background-color: #ff2929;
    color: #fff;
    display: inline-block;
    line-height: 1.42857143;
    text-align: center;
    border: 1px solid transparent;
    border-radius: 4px;
    margin-left: 20px;
    min-width: 141px;
}

.input-value{
    padding-top: 10px;
    margin-bottom: 10px;
}
.input-value .name-title{
    font-size: 16px;
    color: #000000;
    font-weight: bold;
    padding: 5px 0px;
}
.input-value input{
    width: 100%;
    border-bottom: 1px solid #dedede;
    font-size: 17px;
    padding: 8px 10px;
}

.select-input{
    display: block;
    width: 100%;
    border: 1px solid #dbdbdb;
    font-size: 17px;
    padding: 8px 10px;
}

.input-value textarea{
    width: 100%;
    font-size: 17px;
    border: 1px solid #dedede;
    padding: 10px;
    resize: vertical;
    height: 120px;
}

.input-value button {
    width: 100%;
    padding: 10px 10px;
    font-size: 17px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
    background-color: #DD3332;
    color: white;
}
.input-value button:hover{
    background-color: #ff4646;
}

.hidden {
    display: none;
}
