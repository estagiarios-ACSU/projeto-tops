<?php

session_start();

session_destroy(); 
echo "
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
*{
font-family: 'Outfit', sans-serif;
}
</style>
</head>

<body id='body'> 
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

<script>   
swal.fire({
    position: 'center',
    icon: 'success',
    title: 'CONTA DESLOGADA',
    showConfirmButton: true,
    confirmButtonText: 'Voltar',
    allowOutsideClick: false,
}) 
window.onload=function(){
    const del_buts = document.getElementsByClassName('swal2-confirm swal2-styled')
    for(let button of del_buts){
        but_css = 'width: 5.3rem; font-size: 1rem; font-weight: 600; color: #fff; cursor: pointer; height: 3rem; text-align:center; background-size: 300% 100%; border-radius: 3.1rem;  moz-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; transition: all .4s ease-in-out; font-weight: 300; background-image: linear-gradient( to right, #2874fc, #5496ec, #1b61e2, #502bb6);' 
        button.style = but_css

        button.addEventListener('mouseover', () => {
        // Change the button's background color
            button.style = 'width: 5.3rem; font-size: 1rem; font-weight: 600; color: #fff; cursor: pointer; height: 3rem; text-align:center; border: none; background-size: 300% 100%; border-radius: 3.1rem; background-position: 100% 0; moz-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; transition: all .4s ease-in-out;'
        });
        button.addEventListener('mouseout', () => {
        // Change the button's background color back to its original color
            but_css = 'width: 5.3rem; font-size: 1rem; font-weight: 600; color: #fff; cursor: pointer; height: 3rem; text-align:center; border: none; background-size: 300% 100%; border-radius: 3.1rem;  moz-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; transition: all .4s ease-in-out; font-weight: 300; background-image: linear-gradient( to right, #2874fc, #5496ec, #1b61e2, #502bb6);'
            button.style = but_css
        });
    
        button.onclick = function(){
            location.href='../index.php';
        }
    }
}



</script></body>";

?>
    
