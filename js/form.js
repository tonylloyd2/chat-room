//form loading animation
const form=[...document.querySelector('.form').children]; 
form.forEach((item, i) =>{
    setTimeout(()=>{
        item.style.opacity=1;
    },i*100);
    })
