<?php

class Admin{

    public function __construct() {
        $this->createEditButton();
    }

    private function createEditButton(){
        if(isset($_SESSION['admin'])){

            echo 
            "<script>
            let adminButton = document.getElementsByClassName('admin');
            let father = document.getElementsByClassName('btn-exit');
            let length = father.length;

            
            for(i=0; i < length;i++){
                let clone = adminButton[0].cloneNode(true);

                clone.href = 'https://www.facebook.com/campaign/landing.php?&campaign_id=1661784632&extra_1=s%7Cc%7C320269324053%7Ce%7Cfacebook%7C&placement=&creative=320269324053&keyword=facebook&partner_id=googlesem&extra_2=campaignid%3D1661784632%26adgroupid%3D63686352403%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D%26target%3D%26targetid%3Dkwd-541132862%26loc_physical_ms%3D9074253%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=Cj0KCQjwoeemBhCfARIsADR2QCvB0iVu5ATZ67yR6QvKC7R2YdmsPx3CPNPVUCDTW2oeDajbz2lUif4aAjkPEALw_wcB';

                clone.children[0].textContent = 'Editar';

                father[i].appendChild(clone);

                console.log(father[i].innerHTML);
            }
    
            
            </script>
            ";
        }

    }
}

?>