function check(){
    let checkBox = document.getElementsByClassName('checkbox');
    let Button = document.getElementById('button');
    let flag;

    for (let i = 0; i < checkBox.length; i++) {
        if(checkBox[i].checked === true){
          flag = 1;
        }
    }
    if (flag === 1){
        Button.style.display = "block";
    } 
    else {
        Button.style.display ="none";
    }
}

function dlt(){
    let archiveDelete = document.getElementsByClassName('archiveList');
    let deleteButton = document.getElementById('delete');
    let flag;

    for (let i = 0; i < archiveDelete.length; i++) {
        if(archiveDelete[i].checked === true){
          flag = 1;
        }
    }
    if (flag === 1){
        deleteButton.style.display = "block";
    } 
    else {
        deleteButton.style.display ="none";
    }
}

// Ne marche que avec la premiere Checkbox

// function check(){
//     let checkBox = document.getElementsByClassName('checkbox');
//     let Button = document.getElementById('button');
//     console.log(checkbox);
//     console.log(button);
    
//     if(checkBox.checked === true ){
//         Button.style.display = "block";
//     }else{
//         Button.style.display = "none";
//     }
//  }


